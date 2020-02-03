<?php
require_once(__DIR__ . "/RequestDto.php");

/**
 * Class Auth3DSDto
 *
 * Data transfer object used to carry out a "3DS transaction"
 *
 * @author Gabriel Raul Marini
 */
class Auth3DSDto extends RequestDto
{
    public const OPERATION = "AUTHORIZATION3DSSTEP1";
    private const AUTHORIZATION_REQUEST_TAG = "AuthorizationRequest";

    //compulsory fields
    private bool $isMasterpass;
    private string $orderId;
    private string $pan;
    private string $cvv2;
    private string $expDate;
    private string $amount;
    private string $currency;
    private string $accountingMode;
    private string $network;

    //not compulsory fields
    private ?string $exponent = null;
    private ?string $emailCh = null;
    private ?string $userId = null;
    private ?string $acquirer = null;
    private ?string $ipAddress = null;
    private ?string $usrAuthFlag = null;
    private ?string $opDescr = null;
    private ?string $antifraud = null;
    private ?string $productRef = null;
    private ?string $name = null;
    private ?string $surname = null;
    private ?string $taxId = null;
    private ?string $createPanAlias = null;
    private ?string $inPerson = null;
    private ?string $merchantUrl = null;
    private ?string $service = null;
    private ?string $xId = null;
    private ?string $cavv = null;
    private ?string $eci = null;
    private ?string $ppAuthenticateMethod = null;
    private ?string $cardEnrollMethod = null;
    private ?string $paresStatus = null;
    private ?string $scenRollStatus = null;
    private ?string $signatureVerification = null;

    /**
     * Auth3DSDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();

        //start from </Header>
        if (isset($this->isMasterpass) && $this->isMasterpass) {
            XMLUtils::appendOpenTag($xml, self::DATA_3DS_TAG);
            XMLUtils::appendTag($xml, self::SERVICE_TAG, $this->service);
            XMLUtils::appendTag($xml, self::ECI_TAG, $this->eci);
            XMLUtils::appendTag($xml, self::XID_TAG, $this->xId);
            XMLUtils::appendTag($xml, self::CAVV_TAG, $this->cavv);
            XMLUtils::appendTag($xml, self::PARES_STATUS_TAG, $this->paresStatus);
            XMLUtils::appendTag($xml, self::SC_ENROLL_STATUS_TAG, $this->scenRollStatus);
            XMLUtils::appendTag($xml, self::SIGNATURE_VERIFYTION_TAG, $this->signatureVerification);
            XMLUtils::appendCloseTag($xml, self::DATA_3DS_TAG);

            XMLUtils::appendOpenTag($xml, self::MASTERPASS_DATA_TAG);
            XMLUtils::appendTag($xml, self::PP_AUTHENTICATE_METHOD_TAG, $this->ppAuthenticateMethod);
            XMLUtils::appendTag($xml, self::PP_CARD_ENROLL_METHOD_TAG, $this->cardEnrollMethod);
            XMLUtils::appendCloseTag($xml, self::MASTERPASS_DATA_TAG);
        }

        XMLUtils::appendTag($xml, self::ORDER_ID_TAG, $this->orderId);
        XMLUtils::appendTag($xml, self::PAN_TAG, $this->pan);
        XMLUtils::appendTag($xml, self::CVV2_TAG, $this->cvv2);
        XMLUtils::appendTag($xml, self::EXPDATE_TAG, $this->expDate);
        XMLUtils::appendTag($xml, self::AMOUNT_TAG, $this->amount);
        XMLUtils::appendTag($xml, self::CURRENCY_TAG, $this->currency);
        XMLUtils::appendTag($xml, self::EXPONENT_TAG, $this->exponent);
        XMLUtils::appendTag($xml, self::ACCOUNTING_MODE_TAG, $this->accountingMode);
        XMLUtils::appendTag($xml, self::NETWORK_TAG, $this->network);
        XMLUtils::appendTag($xml, self::EMAIL_CH_TAG, $this->emailCh);
        XMLUtils::appendTag($xml, self::USER_ID_TAG, $this->userId);
        XMLUtils::appendTag($xml, self::PRODUCT_REF_TAG, $this->productRef);
        XMLUtils::appendTag($xml, self::NAME_TAG, $this->name);
        XMLUtils::appendTag($xml, self::SURNAME_TAG, $this->surname);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_REQUEST_TAG, $xml);
        return $xml;
    }

    public function getMacArray(): array
    {
        return array(
            "OPERATION" => self::OPERATION,
            "TIMESTAMP" => $this->timestamp,
            "SHOPID" => $this->shopId,
            "ORDERID" => $this->orderId,
            "OPERATORID" => $this->operatorId,
            "REQREFNUM" => $this->reqRefNum,
            "PAN" => $this->pan,
            "CVV2" => $this->cvv2,
            "EXPDATE" => $this->expDate,
            "AMOUNT" => $this->amount,
            "CURRENCY" => $this->currency,
            "EXPONENT" => $this->exponent,
            "ACCOUNTINGMODE" => $this->accountingMode,
            "NETWORK" => $this->network,
            "EMAILCH" => $this->emailCh,
            "USERID" => $this->userId,
            "ACQUIRER" => $this->acquirer,
            "IPADDRESS" => $this->ipAddress,
            "OPDESCR" => $this->opDescr,
            "USRAUTHFLAG" => $this->usrAuthFlag,
            "OPTIONS" => $this->options,
            "ANTIFRAUD" => $this->antifraud,
            "PRODUCTREF" => $this->productRef,
            "NAME" => $this->name,
            "SURNAME" => $this->surname,
            "TAXID" => $this->taxId,
            "INPERSON" => $this->inPerson,
            "MERCHANTURL" => $this->merchantUrl,
            "SERVICE" => $this->service,
            "XID" => $this->xId,
            "CAVV" => $this->cavv,
            "ECI" => $this->eci,
            "PP_AUTHENTICATEMETHOD" => $this->ppAuthenticateMethod,
            "PP_CARDENROLLMETHOD" => $this->cardEnrollMethod,
            "PARESSTATUS" => $this->paresStatus,
            "SCENROLLSTATUS" => $this->scenRollStatus,
            "SIGNATUREVERIFICATION" => $this->signatureVerification
        );
    }

    /**
     * @param bool $isMasterpass
     */
    public function setIsMasterpass(bool $isMasterpass): void
    {
        $this->isMasterpass = $isMasterpass;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string $pan
     */
    public function setPan(string $pan): void
    {
        $this->pan = $pan;
    }

    /**
     * @param string $cvv2
     */
    public function setCvv2(string $cvv2): void
    {
        $this->cvv2 = $cvv2;
    }

    /**
     * @param string $expDate
     */
    public function setExpDate(string $expDate): void
    {
        $this->expDate = $expDate;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param string $accountingMode
     */
    public function setAccountingMode(string $accountingMode): void
    {
        $this->accountingMode = $accountingMode;
    }

    /**
     * @param string $network
     */
    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    /**
     * @param string|null $exponent
     */
    public function setExponent(?string $exponent): void
    {
        $this->exponent = $exponent;
    }

    /**
     * @param string|null $emailCh
     */
    public function setEmailCh(?string $emailCh): void
    {
        $this->emailCh = $emailCh;
    }

    /**
     * @param string|null $userId
     */
    public function setUserId(?string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param string|null $acquirer
     */
    public function setAcquirer(?string $acquirer): void
    {
        $this->acquirer = $acquirer;
    }

    /**
     * @param string|null $ipAddress
     */
    public function setIpAddress(?string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @param string|null $usrAuthFlag
     */
    public function setUsrAuthFlag(?string $usrAuthFlag): void
    {
        $this->usrAuthFlag = $usrAuthFlag;
    }

    /**
     * @param string|null $opDescr
     */
    public function setOpDescr(?string $opDescr): void
    {
        $this->opDescr = $opDescr;
    }

    /**
     * @param string|null $antifraud
     */
    public function setAntifraud(?string $antifraud): void
    {
        $this->antifraud = $antifraud;
    }

    /**
     * @param string|null $productRef
     */
    public function setProductRef(?string $productRef): void
    {
        $this->productRef = $productRef;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @param string|null $taxId
     */
    public function setTaxId(?string $taxId): void
    {
        $this->taxId = $taxId;
    }

    /**
     * @param string|null $createPanAlias
     */
    public function setCreatePanAlias(?string $createPanAlias): void
    {
        $this->createPanAlias = $createPanAlias;
    }

    /**
     * @param string|null $inPerson
     */
    public function setInPerson(?string $inPerson): void
    {
        $this->inPerson = $inPerson;
    }

    /**
     * @param string|null $merchantUrl
     */
    public function setMerchantUrl(?string $merchantUrl): void
    {
        $this->merchantUrl = $merchantUrl;
    }

    /**
     * @param string|null $service
     */
    public function setService(?string $service): void
    {
        $this->service = $service;
    }

    /**
     * @param string|null $xId
     */
    public function setXId(?string $xId): void
    {
        $this->xId = $xId;
    }

    /**
     * @param string|null $cavv
     */
    public function setCavv(?string $cavv): void
    {
        $this->cavv = $cavv;
    }

    /**
     * @param string|null $eci
     */
    public function setEci(?string $eci): void
    {
        $this->eci = $eci;
    }

    /**
     * @param string|null $ppAuthenticateMethod
     */
    public function setPpAuthenticateMethod(?string $ppAuthenticateMethod): void
    {
        $this->ppAuthenticateMethod = $ppAuthenticateMethod;
    }

    /**
     * @param string|null $cardEnrollMethod
     */
    public function setCardEnrollMethod(?string $cardEnrollMethod): void
    {
        $this->cardEnrollMethod = $cardEnrollMethod;
    }

    /**
     * @param string|null $paresStatus
     */
    public function setParesStatus(?string $paresStatus): void
    {
        $this->paresStatus = $paresStatus;
    }

    /**
     * @param string|null $scenRollStatus
     */
    public function setScenRollStatus(?string $scenRollStatus): void
    {
        $this->scenRollStatus = $scenRollStatus;
    }

    /**
     * @param string|null $signatureVerification
     */
    public function setSignatureVerification(?string $signatureVerification): void
    {
        $this->signatureVerification = $signatureVerification;
    }

    /**
     * @param string $shopId
     */
    public function setShopId(string $shopId): void
    {
        $this->shopId = $shopId;
    }

    /**
     * @param string $operatorId
     */
    public function setOperatorId(string $operatorId): void
    {
        $this->operatorId = $operatorId;
    }

    /**
     * @param string $reqRefNum
     */
    public function setReqRefNum(string $reqRefNum): void
    {
        $this->reqRefNum = $reqRefNum;
    }

    /**
     * @param false|string $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @param string|null $options
     */
    public function setOptions(?string $options): void
    {
        $this->options = $options;
    }

}