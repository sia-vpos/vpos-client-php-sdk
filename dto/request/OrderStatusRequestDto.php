<?php
require_once(__DIR__ . "/RequestDto.php");


/**
 * Class OrderStatusRequestDto
 *
 * Data transfer object of an "order status" request
 *
 * @author Gabriel Raul Marini
 */
class OrderStatusRequestDto extends RequestDto
{
    private const OPERATION = "ORDERSTATUS";
    private const ORDERSTATUS_TAG = "OrderStatus";

    //compulsory fields
    private string $orderId;

    //not compulsory fields
    private ?string $productRef = null;

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
        XMLUtils::appendTag($xml, self::ORDER_ID_TAG, $this->orderId);
        XMLUtils::appendTag($xml, self::PRODUCTREF_TAG, $this->productRef);

        $xml .= $this->getXMLClosing();
        $xml = str_replace(static::OPERATION_TAG_VALUE, static::OPERATION, $xml);
        $xml = $xml = str_replace(static::VARIABLE_REQUEST_TAG, static::ORDERSTATUS_TAG, $xml);
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
            "ORDERID" => $this->orderId,
            "OPTIONS" => $this->options,
            "PRODUCTREF" => $this->productRef
        );
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string|null $productRef
     */
    public function setProductRef(?string $productRef): void
    {
        $this->productRef = $productRef;
    }

}