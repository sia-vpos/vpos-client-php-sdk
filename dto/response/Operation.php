<?php

/**
 * Class Operation
 */
class Operation
{
    private string $transactionID;
    private string $timestampReq;
    private string $timestampElab;
    private string $srcType;
    private string $amount;
    private string $result;
    private string $status;
    private string $opDescr;
    private string $mac;
    private Authorization $authorization;

    public function __construct(SimpleXMLElement $operation)
    {
        $this->transactionID = $operation->TransactionID;
        $this->timestampReq = $operation->TimestampReq;
        $this->timestampElab = $operation->TimestampElab;
        $this->srcType = $operation->SrcType;
        $this->amount = $operation->Amount;
        $this->result = $operation->Result;
        $this->status = $operation->Status;
        $this->opDescr = $operation->OpDescr;
        $this->mac = $operation->MAC;
        if (isset($operation->Authorization))
            $this->authorization = new Authorization($operation->Authorization);
    }

    public function getMacArray()
    {
        return array(
            $this->transactionID,
            $this->timestampReq,
            $this->timestampElab,
            $this->srcType,
            $this->amount,
            $this->result,
            $this->status,
            $this->opDescr
        );
    }

    /**
     * @return string
     */
    public function getTransactionID(): string
    {
        return $this->transactionID;
    }

    /**
     * @param string $transactionID
     */
    public function setTransactionID(string $transactionID): void
    {
        $this->transactionID = $transactionID;
    }

    /**
     * @return string
     */
    public function getTimestampReq(): string
    {
        return $this->timestampReq;
    }

    /**
     * @param string $timestampReq
     */
    public function setTimestampReq(string $timestampReq): void
    {
        $this->timestampReq = $timestampReq;
    }

    /**
     * @return string
     */
    public function getTimestampElab(): string
    {
        return $this->timestampElab;
    }

    /**
     * @param string $timestampElab
     */
    public function setTimestampElab(string $timestampElab): void
    {
        $this->timestampElab = $timestampElab;
    }

    /**
     * @return string
     */
    public function getSrcType(): string
    {
        return $this->srcType;
    }

    /**
     * @param string $srcType
     */
    public function setSrcType(string $srcType): void
    {
        $this->srcType = $srcType;
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
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult(string $result): void
    {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
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
    public function getMac(): string
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac(string $mac): void
    {
        $this->mac = $mac;
    }

    /**
     * @return Authorization
     */
    public function getAuthorization(): Authorization
    {
        return $this->authorization;
    }

    /**
     * @param Authorization $authorization
     */
    public function setAuthorization(Authorization $authorization): void
    {
        $this->authorization = $authorization;
    }
}