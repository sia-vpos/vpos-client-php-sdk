<?php
require_once(__DIR__ . "/Data3DSJson.php");

class PaymentInfo
{
    private string $amount;
    private string $currency;
    private string $exponent;
    private string $orderId;
    private string $shopId;
    private string $urlBack;
    private string $urlDone;
    private string $urlMs;
    private string $accountingMode;
    private string $authorMode;
    private string $mac;

    //not compulsory fields
    private ?string $lang = null;
    private ?string $shopEmail = null;
    private ?string $options = null;
    private ?string $lockcard = null;
    private ?string $commis = null;
    private ?string $email = null;
    private ?string $ordDescr = null;
    private ?string $vsid = null;
    private ?string $opDescr = null;
    private ?string $remainingDuration = null;
    private ?string $userId = null;
    private ?string $bpPostepay = null;
    private ?string $bpCards = null;
    private ?string $phoneNumber = null;
    private ?string $causation = null;
    private ?string $user = null;
    private ?string $name = null;
    private ?string $surname = null;
    private ?string $taxId = null;
    private ?string $productRef = null;
    private ?string $antiFraud = null;
    private ?Data3DSJson $data3DS = null;

    /**
     * @return array
     */
    public function getMacArray(): array
    {
        //TODO
        return array(
            "URLMS" => $this->urlMs,
            "URLDONE" => $this->urlDone,
            "ORDERID" => $this->orderId,
            "SHOPID" => $this->shopId,
            "AMOUNT" => $this->amount,
            "CURRENCY" => $this->currency,
            "EXPONENT" => $this->exponent,
            "ACCOUNTINGMODE" => $this->accountingMode,
            "AUTHORMODE" => $this->authorMode,
            "OPTIONS" => $this->options,
            "NAME" => $this->name,
            "SURNAME" => $this->surname,
            "TAXID" => $this->taxId,
            "LOCKCARD" => $this->lockcard,
            "COMMIS" => $this->commis,
            "ORDDESCR" => $this->ordDescr,
            "VSID" => $this->vsid,
            "OPDESCR" => $this->opDescr,
            "REMAININGDURATION" => $this->remainingDuration,
            "USERID" => $this->userId,
            "BP_POSTEPAY" => $this->bpPostepay,
            "BP_CARDS" => $this->bpCards,
            "PHONENUMBER" => $this->phoneNumber,
            "CAUSATION" => $this->causation,
            "USER" => $this->userId,
            "PRODUCTREF" => $this->productRef,
            "ANTIFRAUD" => $this->antiFraud,
            "3DSDATA" => $this->data3DS
        );
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
    public function getUrlBack(): string
    {
        return $this->urlBack;
    }

    /**
     * @param string $urlBack
     */
    public function setUrlBack(string $urlBack): void
    {
        $this->urlBack = $urlBack;
    }

    /**
     * @return string
     */
    public function getUrlDone(): string
    {
        return $this->urlDone;
    }

    /**
     * @param string $urlDone
     */
    public function setUrlDone(string $urlDone): void
    {
        $this->urlDone = $urlDone;
    }

    /**
     * @return string
     */
    public function getUrlMs(): string
    {
        return $this->urlMs;
    }

    /**
     * @param string $urlMs
     */
    public function setUrlMs(string $urlMs): void
    {
        $this->urlMs = $urlMs;
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
    public function getAuthorMode(): string
    {
        return $this->authorMode;
    }

    /**
     * @param string $authorMode
     */
    public function setAuthorMode(string $authorMode): void
    {
        $this->authorMode = $authorMode;
    }

    /**
     * @return string
     */
    public function getMac(): string
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac(string $mac): void
    {
        $this->mac = $mac;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getShopEmail(): string
    {
        return $this->shopEmail;
    }

    /**
     * @param string $shopEmail
     */
    public function setShopEmail(string $shopEmail): void
    {
        $this->shopEmail = $shopEmail;
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

    /**
     * @return string
     */
    public function getLockcard(): string
    {
        return $this->lockcard;
    }

    /**
     * @param string $lockcard
     */
    public function setLockcard(string $lockcard): void
    {
        $this->lockcard = $lockcard;
    }

    /**
     * @return string
     */
    public function getCommis(): string
    {
        return $this->commis;
    }

    /**
     * @param string $commis
     */
    public function setCommis(string $commis): void
    {
        $this->commis = $commis;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getOrdDescr(): string
    {
        return $this->ordDescr;
    }

    /**
     * @param string $ordDescr
     */
    public function setOrdDescr(string $ordDescr): void
    {
        $this->ordDescr = $ordDescr;
    }

    /**
     * @return string
     */
    public function getVsid(): string
    {
        return $this->vsid;
    }

    /**
     * @param string $vsid
     */
    public function setVsid(string $vsid): void
    {
        $this->vsid = $vsid;
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
    public function getRemainingDuration(): string
    {
        return $this->remainingDuration;
    }

    /**
     * @param string $remainingDuration
     */
    public function setRemainingDuration(string $remainingDuration): void
    {
        $this->remainingDuration = $remainingDuration;
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
    public function getBpPostepay(): string
    {
        return $this->bpPostepay;
    }

    /**
     * @param string $bpPostepay
     */
    public function setBpPostepay(string $bpPostepay): void
    {
        $this->bpPostepay = $bpPostepay;
    }

    /**
     * @return string
     */
    public function getBpCards(): string
    {
        return $this->bpCards;
    }

    /**
     * @param string $bpCards
     */
    public function setBpCards(string $bpCards): void
    {
        $this->bpCards = $bpCards;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getCausation(): string
    {
        return $this->causation;
    }

    /**
     * @param string $causation
     */
    public function setCausation(string $causation): void
    {
        $this->causation = $causation;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
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
    public function getAnitFraud(): string
    {
        return $this->anitFraud;
    }

    /**
     * @param string $anitFraud
     */
    public function setAnitFraud(string $anitFraud): void
    {
        $this->anitFraud = $anitFraud;
    }

    /**
     * @return Data3DSJson
     */
    public function getData3DS(): Data3DSJson
    {
        return $this->data3DS;
    }

    /**
     * @param Data3DSJson $data3DS
     */
    public function setData3DS(Data3DSJson $data3DS): void
    {
        $this->data3DS = $data3DS;
    }

}