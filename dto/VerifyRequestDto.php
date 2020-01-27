<?php


class VerifyRequestDto extends RequestDto
{
    private const OPERATION = "VERIFY";
    private const VERIFY_TAG = "VerifyRequest";

    private string $originalReqRefNum;

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::VERIFY_TAG, $xml);
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);

        //start from </Header>
        XMLUtils::appendTag($xml, self::ORIGINAL_REQ_REF__NUM_TAG, $this->originalReqRefNum);

        $xml .= $this->getXMLClosing();
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::VERIFY_TAG, $xml);
        return $xml;
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