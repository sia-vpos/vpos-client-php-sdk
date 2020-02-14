<?php
require_once(__DIR__ . "/../dto/request/Auth3DSDto.php");
require_once(__DIR__ . "/../dto/request/Auth3DSStep2RequestDto.php");
require_once(__DIR__ . "/../dto/request/RefundRequestDto.php");
require_once(__DIR__ . "/../dto/request/ConfirmRequestDto.php");
require_once(__DIR__ . "/../dto/request/OrderStatusRequestDto.php");
require_once(__DIR__ . "/../dto/request/VerifyRequestDto.php");
require_once(__DIR__ . "/../dto/response/Auth3DSResponse.php");
require_once(__DIR__ . "/../dto/response/Verify.php");

require_once(__DIR__ . "/../utils/apos/RestClient.php");
require_once(__DIR__ . "/../utils/mac/Encoder.php");
require_once(__DIR__ . "/../utils/HTMLGenerator.php");

/**
 * Class VPOSClient
 *
 * Client used to perform common requests to SIA VPOS.
 *
 * @author Gabriel Raul Marini
 */
class VPOSClient
{
    private const CUSTOM_HTML_FILE_PATH = __DIR__ . "/../resources/custom.html";
    private const STD_HTML_FILE_PATH = __DIR__ . "/../resources/default.html";

    private const MAC_NEUTRAL_VALUE = "NULL";
    private const MAC_EXCEPTION_MESSAGE = "Response MAC is not valid! Possible data corruption!";

    private string $startKey;
    private string $apiKey;
    private string $urlWebApi;
    private bool $injected;

    private RestClient $restClient;
    private Encoder $encoder;
    private HTMLGenerator $htmlUtils;

    /**
     * VPOSClient constructor.
     * @param string $startKey
     * @param string $apiKey
     * @param string $urlWebApi
     */
    public function __construct(string $startKey, string $apiKey, string $urlWebApi)
    {
        $this->injected = false;
        $this->restClient = new RestClient();
        $this->encoder = new Encoder();
        $this->htmlUtils = new HTMLGenerator();
        $this->apiKey = $apiKey;
        $this->urlWebApi = $urlWebApi;
        $this->startKey = $startKey;
    }

    /**
     * Perform the injection of a custom HTML redirect template
     *
     * @param string $base64 encoded string of the HTML custom template
     * @param int $delay milliseconds to wait before redirecting to SIA VPOS page
     */
    public function injectHtmlTemplate(string $base64, int $delay): void
    {
        $html = $this->htmlUtils->base64ToHtml($base64, $delay);
        file_put_contents(self::CUSTOM_HTML_FILE_PATH, $html);
        $this->injected = true;
    }

    /**
     * Create an HTML document ready to use for payment initiation. The method returns
     * the custom template with an hidden form containing all the payment parameters in case of
     * precedent HTML injection. Default template is returned otherwise.
     *
     * @param PaymentInfo $info data transfer object containing all the payment parameters
     * @param string $urlApos VPOS redirect base path
     * @return string the base64 format of the HTML document
     */
    public function getHtmlPaymentDocument(PaymentInfo $info, string $urlApos): string
    {
        $path = $this->injected ? self::CUSTOM_HTML_FILE_PATH : self::STD_HTML_FILE_PATH;
        $infoMap = $info->getMacArray();
        if (isset($infoMap["3DSDATA"]))
            $infoMap["3DSDATA"] = AESEncoder::encrypt($this->apiKey, $infoMap["3DSDATA"]->__toString());
        $infoMap["MAC"] = $this->encoder->getRequestMac($infoMap, $this->startKey);
        $infoMap["URLBACK"] = $info->getUrlBack();
        return $this->htmlUtils->htmlToBase64($path, $urlApos, $infoMap);
    }

    /**
     * Validate the result of a payment initiation verifying the integrity of the data contained in URMLS/URLDONE
     *
     * @param array $values parameters received from SIA VPOS
     * @param string $receivedMac to compare with the calculated one
     * @return bool true if data is intact, false otherwise
     */
    public function verifyUrl(array $values, string $receivedMac): bool
    {
        $macArray = array(
            "ORDERID" => $values["ORDERID"],
            "SHOPID" => $values["SHOPID"],
            "AUTHNUMBER" => $values["AUTHNUMBER"],
            "AMOUNT" => $values["AMOUNT"],
            "CURRENCY" => $values["CURRENCY"],
            "EXPONENT" => $values["EXPONENT"],
            "TRANSACTIONID" => $values["TRANSACTIONID"],
            "ACCOUNTINGMODE" => $values["ACCOUNTINGMODE"],
            "AUTHORMODE" => $values["AUTHORMODE"],
            "RESULT" => $values["RESULT"],
            "TRANSACTIONTYPE" => $values["TRANSACTIONTYPE"],
            "ISSUERCOUNTRY" => $values["ISSUERCOUNTRY"],
            "AUTHCODE" => $values["AUTHCODE"],
            "PAYERID" => $values["PAYERID"],
            "PAYER" => $values["PAYER"],
            "PAYERSTATUS" => $values["PAYERSTATUS"],
            "HASHPAN" => $values["HASHPAN"],
            "PANALIASREV" => $values["PANALIASREV"],
            "PANALIAS" => $values["PANALIAS"],
            "PANALIASEXPDATE" => $values["PANALIASEXPDATE"],
            "PANALIASTAIL" => $values["PANALIASTAIL"],
            "MASKEDPAN" => $values["MASKEDPAN"],
            "PANTAIL" => $values["PANTAIL"],
            "PANEXPIRYDATE" => $values["PANEXPIRYDATE"],
            "ACCOUNTHOLDER" => $values["ACCOUNTHOLDER"],
            "IBAN" => $values["IBAN"],
            "ALIASSTR" => $values["ALIASSTR"],
            "ACQUIRERBIN" => $values["ACQUIRERBIN"],
            "MERCHANTID" => $values["MERCHANTID"],
            "CARDTYPE" => $values["CARDTYPE"]
        );

        return $this->encoder->getRequestMac($macArray, $this->apiKey) === $receivedMac;
    }

    /**
     * @param Auth3DSDto $dto data transfer object containing all the required parameters to perform the first step of a 3DS authorization
     * @return Auth3DSResponse the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function startAuth3DS(Auth3DSDto $dto): Auth3DSResponse
    {
        $xmlResponse = $this->performCall($dto);
        $response = new Auth3DSResponse($xmlResponse);
        if (!$this->isValidResponseMac($response) || !$this->isValidAuthMac($response->getAuthorization())
            //|| !$this->isValidVBVRedirectMac($response->getVbvRedirect())
            || !$this->isValidPanAliasData($response->getPanAliasData()))
            throw new Exception(self::MAC_EXCEPTION_MESSAGE);
        return $response;
    }

    /**
     * @param Auth3DSStep2RequestDto $dto data transfer object containing all the required parameters to perform the second step of 3DS authorization
     * @return Auth3DSResponseStep2 the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function start3DSAuthStep2(Auth3DSStep2RequestDto $dto): Auth3DSResponseStep2
    {
        $xmlResponse = $this->performCall($dto);
        $response = new Auth3DSResponseStep2($xmlResponse);
        if (!$this->isValidResponseMac($response) || !$this->isValidAuthMac($response->getAuthorization())
            || !$this->isValidPanAliasData($response->getPanAliasData()))
            throw new Exception(self::MAC_EXCEPTION_MESSAGE);
        return $response;
    }

    /**
     * @param ConfirmRequestDto $dto data transfer object containing all the required parameters to perform a payment confirmation
     * @return ConfirmResponse the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function confirmPayment(ConfirmRequestDto $dto): ConfirmResponse
    {
        $xmlResponse = $this->performCall($dto);
        $response = new ConfirmResponse($xmlResponse);
        if (!$this->isValidResponseMac($response) || !$this->isValidOperationMac($response->getOperation()))
            throw new Exception(self::MAC_EXCEPTION_MESSAGE);
        return $response;
    }

    /**
     * @param VerifyRequestDto $dto data transfer object containing all the required parameters to perform a verify request
     * @return VerifyResponse the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function verifyRequest(VerifyRequestDto $dto): VerifyResponse
    {
        $xmlResponse = $this->performCall($dto);
        $response = new VerifyResponse($xmlResponse);
        if (!$this->isValidResponseMac($response)) //|| !$this->isValidVerify($response->getVerify()))
            throw new Exception(self::MAC_EXCEPTION_MESSAGE);
        return $response;
    }

    /**
     * @param RefundRequestDto $dto data transfer object containing all the required parameters to perform a payment refund
     * @return RefundResponse the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function refundPayment(RefundRequestDto $dto): RefundResponse
    {
        $xmlResponse = $this->performCall($dto);
        $response = new RefundResponse($xmlResponse);
        if (!$this->isValidResponseMac($response) || !$this->isValidOperationMac($response->getOperation()))
            throw new Exception(self::MAC_EXCEPTION_MESSAGE);
        return $response;
    }

    /**
     * @param OrderStatusRequestDto $dto data transfer object containing all the required parameters to perform an order status request
     * @return OrderStatusResponse the outcome of the operation with the relative additional infos
     * @throws Exception in case of data corruption
     */
    public function getOrderStatus(OrderStatusRequestDto $dto): OrderStatusResponse
    {
        $xmlResponse = $this->performCall($dto);
        $response = new OrderStatusResponse($xmlResponse);
        if ($this->isValidResponseMac($response) && $this->isValidPanAliasData($response->getPanAliasData())) {
            for ($i = 0; $i < (int)$response->getNumberOfItems(); $i++) {
                if (!$this->isValidAuthMac($response->getAuthorizations()[$i]))
                    throw new Exception("Authorization with index " . $i . " has not a valid MAC");
            }
            return $response;
        }
        throw new Exception(self::MAC_EXCEPTION_MESSAGE);
    }

    public function setProxy(string $proxyName, int $port)
    {
        $this->restClient->setProxy($proxyName, $port);
    }

    public function setProxyWithAuth(string $proxyName, int $port, string $user, string $password)
    {
        $this->restClient->setProxyWithAuth($proxyName, $port, $user, $password);
    }

    public function setBasicAuth(string $user, string $password)
    {
        $this->restClient->setBasicAuth($user, $password);
    }

    public function disableProxy()
    {
        $this->restClient->disableProxy();
    }

    public function disableBasicAuth()
    {
        $this->restClient->disableBasicAuth();
    }

    private function performCall(RequestDto $dto): string
    {
        $xml = $dto->getXML();
        $xml = str_replace(RequestDto::MAC_TAG_VALUE, $this->encoder->getRequestMac($dto->getMacArray(), $this->apiKey), $xml);
        return $this->restClient->callAPI($this->urlWebApi, $xml);
    }

    private function isValidResponseMac(?Response $response)
    {
        $calculatedMac = $this->encoder->getResponseMac($response->getMacArray(), $this->apiKey);
        return strcmp($response->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $response->getMac();
    }

    private function isValidAuthMac(?Authorization $authorization)
    {
        if (isset($authorization)) {
            $calculatedMac = $this->encoder->getResponseMac($authorization->getMacArray(), $this->apiKey);
            return strcmp($authorization->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $authorization->getMac();
        }
        return true;
    }


    private function isValidOperationMac(?Operation $operation)
    {
        if (isset($operation)) {
            $calculatedMac = $this->encoder->getResponseMac($operation->getMacArray(), $this->apiKey);
            return strcmp($operation->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $operation->getMac();
        }
        return true;
    }

    private function isValidVBVRedirectMac(?VBVRedirect $vbvRedirect)
    {
        if (isset($vbvRedirect)) {
            $calculatedMac = $this->encoder->getResponseMac($vbvRedirect->getMacArray(), $this->apiKey);
            return strcmp($vbvRedirect->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $vbvRedirect->getMac();
        }
        return true;
    }

    private function isValidPanAliasData(?PanAliasData $panAliasData)
    {
        if (isset($panAliasData)) {
            $calculatedMac = $this->encoder->getResponseMac($panAliasData->getMacArray(), $this->apiKey);
            return strcmp($panAliasData->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $panAliasData->getMac();
        }
        return true;
    }

    private function isValidVerify(?Verify $verify)
    {
        if (isset($verify)) {
            $calculatedMac = $this->encoder->getResponseMac($verify->getMacArray(), $this->apiKey);
            return strcmp($verify->getMac(), self::MAC_NEUTRAL_VALUE) == 0 || $calculatedMac === $verify->getMac();
        }
        return true;
    }

}