<?php

/**
 * Class Verify
 */
class Verify
{
    private string $operation;
    private string $result;
    private string $transactionID;
    private string $mac;

    /**
     * Verify constructor.
     * @param SimpleXMLElement $verify xml model of the object
     */
    public function __construct(SimpleXMLElement $verify)
    {
        if (isset($verify)) {
            $this->operation = $verify->Operation;
            $this->result = $verify->Result;
            $this->transactionID = $verify->TransactionID;
            $this->mac = $verify->MAC;
        }
    }

    /**
     * @return array
     */
    public function getMacArray()
    {
        return array(
            $this->operation,
            $this->result,
            $this->transactionID
        );
    }

    /**
     * @return SimpleXMLElement|string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @return SimpleXMLElement|string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return SimpleXMLElement|string
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return SimpleXMLElement|string
     */
    public function getMac()
    {
        return $this->mac;
    }
}