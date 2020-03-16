<?php
require_once(__DIR__ . "/RequestDto.php");

class TransactionListRequestDto extends RequestDto
{
    private const OPERATION = "LISTAUTHORIZATION";
    private const LIST_AUTHORIZATION_TAG = "ListAuthorization";

    //compulsory fields
    private string $filter;

    //not compulsory fields
    private ?string $startDate = null;
    private ?string $endDate = null;
    private ?string $transactionId = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $opDescr = null;

    /**
     * OrderStatusRequestDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();

        //start from </Header>
        XMLUtils::appendTag($xml, self::START_DATE_TAG, $this->startDate);
        XMLUtils::appendTag($xml, self::END_DATE_TAG, $this->endDate);
        XMLUtils::appendTag($xml, self::FILTER_TAG, $this->filter);
        XMLUtils::appendTag($xml, self::TRANSACTION_ID_TAG, $this->transactionId);
        XMLUtils::appendTag($xml, self::START_TIME_TAG, $this->startTime);
        XMLUtils::appendTag($xml, self::END_TIME_TAG, $this->endTime);
        XMLUtils::appendTag($xml, self::OPDESCR_TAG, $this->opDescr);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::LIST_AUTHORIZATION_TAG, $xml);
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
            "STARTDATE" => $this->startDate,
            "ENDDATE" => $this->endDate,
            "OPDESCR" => $this->opDescr,
            "FILTER" => $this->filter,
            "TRANSACTIONID" => $this->transactionId,
            "STARTTIME" => $this->startTime,
            "ENDTIME" => $this->endTime,
            "OPTIONS" => $this->options
        );
    }

    /**
     * @param string $filter
     */
    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @param string|null $startDate
     */
    public function setStartDate(?string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @param string|null $endDate
     */
    public function setEndDate(?string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @param string|null $transactionId
     */
    public function setTransactionId(?string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @param string|null $startTime
     */
    public function setStartTime(?string $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @param string|null $endTime
     */
    public function setEndTime(?string $endTime): void
    {
        $this->endTime = $endTime;
    }
}