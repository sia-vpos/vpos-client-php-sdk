<?php
require_once(__DIR__ . "/RequestDto.php");

/**
 * Class VerifyRequestDto
 *
 * Data transfer object used to perform a "verify transaction" operation
 *
 * @author Gabriel Raul Marini
 */
class VerifyRequestDto extends RequestDto
{
    private const OPERATION = "VERIFY";
    private const VERIFY_TAG = "VerifyRequest";

    private string $originalReqRefNum;

    /**
     * VerifyRequestDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();

        //start from </Header>
        XMLUtils::appendTag($xml, self::ORIGINAL_REQ_REF__NUM_TAG, $this->originalReqRefNum);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::VERIFY_TAG, $xml);
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
            "ORIGINALREQREFNUM" => $this->originalReqRefNum,
            "OPTIONS " => $this->options
        );
    }

    /**
     * @return string
     */
    public function getOriginalReqRefNum(): string
    {
        return $this->originalReqRefNum;
    }

    /**
     * @param string $originalReqRefNum
     */
    public function setOriginalReqRefNum(string $originalReqRefNum): void
    {
        $this->originalReqRefNum = $originalReqRefNum;
    }

}