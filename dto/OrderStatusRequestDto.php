<?php
require("RequestDto.php");

class OrderStatusRequestDto extends RequestDto
{
    private const OPERATION = "ORDERSTATUS";
    private const ORDERSTATUS_TAG = "OrderStatus";

    //compulsory fields
    private string $orderId;

    //not compulsory fields
    private ?string $productRef = null;

    public function getXML(): string
    {
        $xml = $this->getXMLOpening();
        $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::ORDERSTATUS_TAG, $xml);
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);

        //start from </Header>
        XMLUtils::appendTag($xml, self::ORDER_ID_TAG, $this->orderId);
        XMLUtils::appendTag($xml, self::PRODUCTREF_TAG, $this->productRef);

        $xml .= $this->getXMLClosing();
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::ORDERSTATUS_TAG, $xml);
        return $xml;
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
}