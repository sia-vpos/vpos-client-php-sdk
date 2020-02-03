<?php
require_once(__DIR__ . "/RequestDto.php");

/**
 * Class RefundRequestDto
 *
 * Data transfer object used to perform a "payment reversal"
 *
 * @author Gabriel Raul Marini
 */
class RefundRequestDto extends RequestDto
{
    private const OPERATION = "REFUND";
    private const REFUND_TAG = "Refund";

    //compulsory fields
    private string $transactionId;
    private string $orderId;
    private string $amount;
    private string $currency;

    //not compulsory
    private ?string $exponent = null;
    private ?string $opDescr = null;

    /**
     * RefundRequestDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();

        //start from </Header>
        XMLUtils::appendTag($xml, self::TRANSACTION_ID_TAG, $this->transactionId);
        XMLUtils::appendTag($xml, self::ORDER_ID_TAG, $this->orderId);
        XMLUtils::appendTag($xml, self::AMOUNT_TAG, $this->amount);
        XMLUtils::appendTag($xml, self::CURRENCY_TAG, $this->currency);
        XMLUtils::appendTag($xml, self::EXPONENT_TAG, $this->exponent);
        XMLUtils::appendTag($xml, self::OPDESCR_TAG, $this->opDescr);
        XMLUtils::appendTag($xml, self::OPTIONS_TAG, $this->options);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::REFUND_TAG, $xml);
        return $xml;
    }

    public function getMacArray(): array
    {
        return array(
            "OPERATION" => self::OPERATION,
            "TIMESTAMP" => $this->timestamp,
            "SHOPID" => $this->shopId,
            "OPERATORID" => $this->operatorId,
            "REQREFNUM" => $this->reqRefNum,
            "TRANSACTIONID" => $this->transactionId,
            "ORDERID" => $this->orderId,
            "AMOUNT" => $this->amount,
            "CURRENCY" => $this->currency,
            "EXPONENT " => $this->exponent,
            "OPDESCR "=>$this->opDescr,
            "OPTIONS "=>$this->options
        );
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
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