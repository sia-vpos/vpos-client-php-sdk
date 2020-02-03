<?php
require_once(__DIR__ . "/RequestDto.php");


/**
 * Class Auth3DSStep2RequestDto
 *
 * Data transfer object used to perform the second step of a "3DS authorization"
 *
 * @author Gabriel Raul Marini
 */
class Auth3DSStep2RequestDto extends RequestDto
{
    private const OPERATION = "AUTHORIZATION3DSSTEP2";
    private const AUTHORIZATION_3DS_TAG = "Authorization3DS";

    //compulsory fields
    private string $originalRefReqNum;
    private string $paRes;

    //not compulsory fields
    private ?string $acquirer = null;

    /**
     * Auth3DSStep2RequestDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();

        //start from </Header>
        XMLUtils::appendTag($xml, self::ORIGINAL_REQ_REF__NUM_TAG, $this->originalRefReqNum);
        XMLUtils::appendTag($xml, self::PARES_TAG, $this->paRes);
        XMLUtils::appendTag($xml, self::ACQUIRER_TAG, $this->acquirer);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_3DS_TAG, $xml);
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
            "ORIGINALREQREFNUM" => $this->originalRefReqNum,
            "PARES" => $this->paRes,
            "ACQUIRER " => $this->acquirer
        );
    }

    /**
     * @param string $originalRefReqNum
     */
    public function setOriginalRefReqNum(string $originalRefReqNum): void
    {
        $this->originalRefReqNum = $originalRefReqNum;
    }

    /**
     * @param string $paRes
     */
    public function setPaRes(string $paRes): void
    {
        $this->paRes = $paRes;
    }

    /**
     * @param string|null $acquirer
     */
    public function setAcquirer(?string $acquirer): void
    {
        $this->acquirer = $acquirer;
    }

}