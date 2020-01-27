<?php
require("utils/xml/XMLUtils.php");


abstract class RequestDto
{
    //fixed XML requests' values
    private const RELEASE = "02";

    //XML std tags' placeholders
    protected const OPERATION_TAG_VALUE = "[OPERATION]";
    protected const TIMESTAMP_TAG_VALUE = "[TIMESTAMP]";
    protected const MAC_TAG_VALUE = "[MAC]";
    protected const VARIABLE_REQUEST_TAG = "[REQUEST_TAG]";
    protected const REQ_REF_NUM_TAG_VALUE = "[REQREFNUM]";

    //XML tags names
    protected const OPEN_TAG = "BPWXmlRequest";
    protected const RELEASE_TAG = "Release";
    protected const REQUEST_TAG = "Request";
    protected const OPERATION_TAG = "Operation";
    protected const TIMESTAMP_TAG = "Timestamp";
    protected const MAC_TAG = "MAC";
    protected const DATA_TAG = "Data";
    protected const HEADER_TAG = "Header";
    protected const SHOP_ID_TAG = "ShopID";
    protected const OPERATOR_ID_TAG = "OperatorID";
    protected const REQ_REF_NUM_TAG = "ReqRefNum";
    protected const DATA_3DS_TAG = "Data3DS";
    protected const SERVICE_TAG = "Service";
    protected const ECI_TAG = "Eci";
    protected const XID_TAG = "Xid";
    protected const CAVV_TAG = "CAVV";
    protected const PARES_STATUS_TAG = "ParesStatus";
    protected const SC_ENROLL_STATUS_TAG = "ScEnrollStatus";
    protected const SIGNATURE_VERIFYTION_TAG = "SignatureVerifytion";
    protected const MASTERPASS_DATA_TAG = "MasterpassData";
    protected const PP_AUTHENTICATE_METHOD_TAG = "PP_AuthenticateMethod";
    protected const PP_CARD_ENROLL_METHOD_TAG = "PP_CardEnrollMethod";
    protected const ORDER_ID_TAG = "OrderID";
    protected const PAN_TAG = "Pan";
    protected const CVV2_TAG = "CVV2";
    protected const EXPDATE_TAG = "ExpDate";
    protected const AMOUNT_TAG = "Amount";
    protected const CURRENCY_TAG = "Currency";
    protected const EXPONENT_TAG = "Exponent";
    protected const ACCOUNTING_MODE_TAG = "AccountingMode";
    protected const NETWORK_TAG = "Network";
    protected const EMAIL_CH_TAG = "EmailCH";
    protected const USER_ID_TAG = "Userid";
    protected const PRODUCT_REF_TAG = "ProductRef";
    protected const NAME_TAG = "Name";
    protected const SURNAME_TAG = "Surname";
    protected const ORIGINAL_REQ_REF__NUM_TAG = "OriginalReqRefNum";
    protected const PARES_TAG = "PaRes";
    protected const ACQUIRER_TAG = "Acquirer";
    protected const PRODUCTREF_TAG = "ProductRef";
    protected const TRANSACTION_ID_TAG = "TransactionID";
    protected const OPDESCR_TAG = "OpDescr";
    protected const OPTIONS_TAG = "Options";

    //request's std attributes
    protected string $shopId;
    protected string $operatorId;
    protected ?string $options = null;

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

    protected function getXMLOpening(): string
    {
        $xml = "";
        XMLUtils::appendOpenTag($xml, self::OPEN_TAG);
        XMLUtils::appendTag($xml, self::RELEASE_TAG, self::RELEASE);

        XMLUtils::appendOpenTag($xml, self::REQUEST_TAG);
        XMLUtils::appendTag($xml, self::OPERATION_TAG, self::OPERATION_TAG_VALUE);
        XMLUtils::appendTag($xml, self::TIMESTAMP_TAG, self::TIMESTAMP_TAG_VALUE);
        XMLUtils::appendTag($xml, self::MAC_TAG, self::MAC_TAG_VALUE);
        XMLUtils::appendCloseTag($xml, self::REQUEST_TAG);

        XMLUtils::appendOpenTag($xml, self::DATA_TAG);
        XMLUtils::appendOpenTag($xml, self::VARIABLE_REQUEST_TAG);
        XMLUtils::appendOpenTag($xml, self::HEADER_TAG);
        XMLUtils::appendTag($xml, self::SHOP_ID_TAG, $this->shopId);
        XMLUtils::appendTag($xml, self::OPERATOR_ID_TAG, $this->operatorId);
        XMLUtils::appendTag($xml, self::REQ_REF_NUM_TAG, self::REQ_REF_NUM_TAG_VALUE);
        XMLUtils::appendCloseTag($xml, self::HEADER_TAG);

        return $xml;
    }

    protected function getXMLClosing(): string
    {
        $xml = "";
        XMLUtils::appendCloseTag($xml, self::VARIABLE_REQUEST_TAG);
        XMLUtils::appendCloseTag($xml, self::DATA_TAG);
        XMLUtils::appendCloseTag($xml, self::OPEN_TAG);
        return $xml;
    }

    public abstract function getXML(): string;
}