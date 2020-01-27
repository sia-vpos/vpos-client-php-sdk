<?php
require("RequestDto.php");

class Auth3DSDto extends RequestDto
{
    private const OPERATION = "AUTHORIZATION3DSSTEP1";
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

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_REQUEST_TAG, $xml);
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);

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
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_REQUEST_TAG, $xml);
        return $xml;
    }

    /**
     * @return bool
     */
    public function isMasterpass(): bool
    {
        return $this->isMasterpass;
    }

    /**
     * @param bool $isMasterpass
     */
    public function setIsMasterpass(bool $isMasterpass): void
    {
        $this->isMasterpass = $isMasterpass;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getPan(): string
    {
        return $this->pan;
    }

    /**
     * @param string $pan
     */
    public function setPan(string $pan): void
    {
        $this->pan = $pan;
    }

    /**
     * @return string
     */
    public function getCvv2(): string
    {
        return $this->cvv2;
    }

    /**
     * @param string $cvv2
     */
    public function setCvv2(string $cvv2): void
    {
        $this->cvv2 = $cvv2;
    }

    /**
     * @return string
     */
    public function getExpDate(): string
    {
        return $this->expDate;
    }

    /**
     * @param string $expDate
     */
    public function setExpDate(string $expDate): void
    {
        $this->expDate = $expDate;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getExponent(): string
    {
        return $this->exponent;
    }

    /**
     * @param string $exponent
     */
    public function setExponent(string $exponent): void
    {
        $this->exponent = $exponent;
    }

    /**
     * @return string
     */
    public function getAccountingMode(): string
    {
        return $this->accountingMode;
    }

    /**
     * @param string $accountingMode
     */
    public function setAccountingMode(string $accountingMode): void
    {
        $this->accountingMode = $accountingMode;
    }

    /**
     * @return string
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * @param string $network
     */
    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    /**
     * @return string
     */
    public function getEmailCh(): string
    {
        return $this->emailCh;
    }

    /**
     * @param string $emailCh
     */
    public function setEmailCh(string $emailCh): void
    {
        $this->emailCh = $emailCh;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getAcquirer(): string
    {
        return $this->acquirer;
    }

    /**
     * @param string $acquirer
     */
    public function setAcquirer(string $acquirer): void
    {
        $this->acquirer = $acquirer;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getUsrAuthFlag(): string
    {
        return $this->usrAuthFlag;
    }

    /**
     * @param string $usrAuthFlag
     */
    public function setUsrAuthFlag(string $usrAuthFlag): void
    {
        $this->usrAuthFlag = $usrAuthFlag;
    }

    /**
     * @return string
     */
    public function getOpDescr(): string
    {
        return $this->opDescr;
    }

    /**
     * @param string $opDescr
     */
    public function setOpDescr(string $opDescr): void
    {
        $this->opDescr = $opDescr;
    }

    /**
     * @return string
     */
    public function getAntifraud(): string
    {
        return $this->antifraud;
    }

    /**
     * @param string $antifraud
     */
    public function setAntifraud(string $antifraud): void
    {
        $this->antifraud = $antifraud;
    }

    /**
     * @return string
     */
    public function getProductRef(): string
    {
        return $this->productRef;
    }

    /**
     * @param string $productRef
     */
    public function setProductRef(string $productRef): void
    {
        $this->productRef = $productRef;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getTaxId(): string
    {
        return $this->taxId;
    }

    /**
     * @param string $taxId
     */
    public function setTaxId(string $taxId): void
    {
        $this->taxId = $taxId;
    }

    /**
     * @return string
     */
    public function getCreatePanAlias(): string
    {
        return $this->createPanAlias;
    }

    /**
     * @param string $createPanAlias
     */
    public function setCreatePanAlias(string $createPanAlias): void
    {
        $this->createPanAlias = $createPanAlias;
    }

    /**
     * @return string
     */
    public function getInPerson(): string
    {
        return $this->inPerson;
    }

    /**
     * @param string $inPerson
     */
    public function setInPerson(string $inPerson): void
    {
        $this->inPerson = $inPerson;
    }

    /**
     * @return string
     */
    public function getMerchantUrl(): string
    {
        return $this->merchantUrl;
    }

    /**
     * @param string $merchantUrl
     */
    public function setMerchantUrl(string $merchantUrl): void
    {
        $this->merchantUrl = $merchantUrl;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService(string $service): void
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getXId(): string
    {
        return $this->xId;
    }

    /**
     * @param string $xId
     */
    public function setXId(string $xId): void
    {
        $this->xId = $xId;
    }

    /**
     * @return string
     */
    public function getCavv(): string
    {
        return $this->cavv;
    }

    /**
     * @param string $cavv
     */
    public function setCavv(string $cavv): void
    {
        $this->cavv = $cavv;
    }

    /**
     * @return string
     */
    public function getEci(): string
    {
        return $this->eci;
    }

    /**
     * @param string $eci
     */
    public function setEci(string $eci): void
    {
        $this->eci = $eci;
    }

    /**
     * @return string
     */
    public function getPpAuthenticateMethod(): string
    {
        return $this->ppAuthenticateMethod;
    }

    /**
     * @param string $ppAuthenticateMethod
     */
    public function setPpAuthenticateMethod(string $ppAuthenticateMethod): void
    {
        $this->ppAuthenticateMethod = $ppAuthenticateMethod;
    }

    /**
     * @return string
     */
    public function getCardEnrollMethod(): string
    {
        return $this->cardEnrollMethod;
    }

    /**
     * @param string $cardEnrollMethod
     */
    public function setCardEnrollMethod(string $cardEnrollMethod): void
    {
        $this->cardEnrollMethod = $cardEnrollMethod;
    }

    /**
     * @return string
     */
    public function getParesStatus(): string
    {
        return $this->paresStatus;
    }

    /**
     * @param string $paresStatus
     */
    public function setParesStatus(string $paresStatus): void
    {
        $this->paresStatus = $paresStatus;
    }

    /**
     * @return string
     */
    public function getScenRollStatus(): string
    {
        return $this->scenRollStatus;
    }

    /**
     * @param string $scenRollStatus
     */
    public function setScenRollStatus(string $scenRollStatus): void
    {
        $this->scenRollStatus = $scenRollStatus;
    }

    /**
     * @return string
     */
    public function getSignatureVerification(): string
    {
        return $this->signatureVerification;
    }

    /**
     * @param string $signatureVerification
     */
    public function setSignatureVerification(string $signatureVerification): void
    {
        $this->signatureVerification = $signatureVerification;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getShopId(): string
    {
        return $this->shopId;
    }

    /**
     * @param string $shopId
     */
    public function setShopId(string $shopId): void
    {
        $this->shopId = $shopId;
    }

    /**
     * @return string
     */
    public function getOperatorId(): string
    {
        return $this->operatorId;
    }

    /**
     * @param string $operatorId
     */
    public function setOperatorId(string $operatorId): void
    {
        $this->operatorId = $operatorId;
    }

    /**
     * @return string
     */
    public function getOptions(): string
    {
        return $this->options;
    }

    /**
     * @param string $options
     */
    public function setOptions(string $options): void
    {
        $this->options = $options;
    }
}