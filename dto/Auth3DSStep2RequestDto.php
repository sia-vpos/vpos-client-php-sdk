<?php
require("RequestDto.php");


class Auth3DSStep2RequestDto extends RequestDto
{
    private const OPERATION = "AUTHORIZATION3DSSTEP2";
    private const AUTHORIZATION_3DS_TAG = "Authorization3DS";

    //compulsory fields
    private string $originalRefReqNum;
    private string $paRes;

    //not compulsory fields
    private ?string $acquirer = null;

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_3DS_TAG, $xml);
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);

        //start from </Header>
        XMLUtils::appendTag($xml, self::ORIGINAL_REQ_REF__NUM_TAG, $this->originalRefReqNum);
        XMLUtils::appendTag($xml, self::PARES_TAG, $this->paRes);
        XMLUtils::appendTag($xml, self::ACQUIRER_TAG, $this->acquirer);

        $xml .= $this->getXMLClosing();
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::AUTHORIZATION_3DS_TAG, $xml);
        return $xml;
    }

    /**
     * @return string
     */
    public function getOriginalRefReqNum(): string
    {
        return $this->originalRefReqNum;
    }

    /**
     * @param string $originalRefReqNum
     */
    public function setOriginalRefReqNum(string $originalRefReqNum): void
    {
        $this->originalRefReqNum = $originalRefReqNum;
    }

    /**
     * @return string
     */
    public function getPaRes(): string
    {
        return $this->paRes;
    }

    /**
     * @param string $paRes
     */
    public function setPaRes(string $paRes): void
    {
        $this->paRes = $paRes;
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

}