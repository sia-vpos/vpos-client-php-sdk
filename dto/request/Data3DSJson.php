<?php


/**
 * Class Data3DSJson
 *
 * Model of Data3DS field used in payment operation via redirect url.
 *
 * @author Gabriel Raul Marini
 */
class Data3DSJson
{
    private ?string  $threeDSRequestorChallengeInd = null;
    private ?string  $addrMatch = null;
    private ?string  $chAccAgeInd = null;
    private ?string  $chAccChange = null;
    private ?string  $chAccChangeInd = null;
    private ?string  $chAccDate = null;
    private ?string  $chAccPwChange = null;
    private ?string  $chAccPwChangeInd = null;
    private ?string  $nbPurchaseAccount = null;
    private ?string  $txnActivityDay = null;
    private ?string  $txnActivityYear = null;
    private ?string  $shipAddressUsage = null;
    private ?string  $shipAddressUsageInd = null;
    private ?string  $shipNameIndicator = null;
    private ?string  $acctID = null;
    private ?string  $billAddrCity = null;
    private ?string  $billAddrCountry = null;
    private ?string  $billAddrLine1 = null;
    private ?string  $billAddrLine2 = null;
    private ?string  $billAddrLine3 = null;
    private ?string  $billAddrPostCode = null;
    private ?string  $billAddrState = null;
    private ?string  $homePhone = null;
    private ?string  $mobilePhone = null;
    private ?string  $shipAddrCity = null;
    private ?string  $shipAddrCountry = null;
    private ?string  $shipAddrLine1 = null;
    private ?string  $shipAddrLine2 = null;
    private ?string  $shipAddrLine3 = null;
    private ?string  $shipAddrPostCode = null;
    private ?string  $shipAddrState = null;
    private ?string  $workPhone = null;
    private ?string  $deliveryEmailAddress = null;
    private ?string  $deliveryTimeframe = null;
    private ?string  $preOrderDate = null;
    private ?string  $preOrderPurchaseInd = null;

    public function __toString(): ?string
    {
        $json = "{";
        foreach (get_object_vars($this) as $name => $value) {
            if (!is_null($value)) {
                $json .= "\"" . $name . "\"";
                $json .= "=";
                $json .= "\"" . $value . "\"";
                $json .= ",";
            }
        }
        $json = substr($json, 0, strlen($json) - 1);
        $json .= "}";

        return $json;
    }

    /**
     * @return string|null
     */
    public function getThreeDSRequestorChallengeInd(): ?string
    {
        return $this->threeDSRequestorChallengeInd;
    }

    /**
     * @param string|null $threeDSRequestorChallengeInd
     */
    public function setThreeDSRequestorChallengeInd(?string $threeDSRequestorChallengeInd): void
    {
        $this->threeDSRequestorChallengeInd = $threeDSRequestorChallengeInd;
    }

    /**
     * @return string|null
     */
    public function getAddrMatch(): ?string
    {
        return $this->addrMatch;
    }

    /**
     * @param string|null $addrMatch
     */
    public function setAddrMatch(?string $addrMatch): void
    {
        $this->addrMatch = $addrMatch;
    }

    /**
     * @return string|null
     */
    public function getChAccAgeInd(): ?string
    {
        return $this->chAccAgeInd;
    }

    /**
     * @param string|null $chAccAgeInd
     */
    public function setChAccAgeInd(?string $chAccAgeInd): void
    {
        $this->chAccAgeInd = $chAccAgeInd;
    }

    /**
     * @return string|null
     */
    public function getChAccChange(): ?string
    {
        return $this->chAccChange;
    }

    /**
     * @param string|null $chAccChange
     */
    public function setChAccChange(?string $chAccChange): void
    {
        $this->chAccChange = $chAccChange;
    }

    /**
     * @return string|null
     */
    public function getChAccChangeInd(): ?string
    {
        return $this->chAccChangeInd;
    }

    /**
     * @param string|null $chAccChangeInd
     */
    public function setChAccChangeInd(?string $chAccChangeInd): void
    {
        $this->chAccChangeInd = $chAccChangeInd;
    }

    /**
     * @return string|null
     */
    public function getChAccDate(): ?string
    {
        return $this->chAccDate;
    }

    /**
     * @param string|null $chAccDate
     */
    public function setChAccDate(?string $chAccDate): void
    {
        $this->chAccDate = $chAccDate;
    }

    /**
     * @return string|null
     */
    public function getChAccPwChange(): ?string
    {
        return $this->chAccPwChange;
    }

    /**
     * @param string|null $chAccPwChange
     */
    public function setChAccPwChange(?string $chAccPwChange): void
    {
        $this->chAccPwChange = $chAccPwChange;
    }

    /**
     * @return string|null
     */
    public function getChAccPwChangeInd(): ?string
    {
        return $this->chAccPwChangeInd;
    }

    /**
     * @param string|null $chAccPwChangeInd
     */
    public function setChAccPwChangeInd(?string $chAccPwChangeInd): void
    {
        $this->chAccPwChangeInd = $chAccPwChangeInd;
    }

    /**
     * @return string|null
     */
    public function getNbPurchaseAccount(): ?string
    {
        return $this->nbPurchaseAccount;
    }

    /**
     * @param string|null $nbPurchaseAccount
     */
    public function setNbPurchaseAccount(?string $nbPurchaseAccount): void
    {
        $this->nbPurchaseAccount = $nbPurchaseAccount;
    }

    /**
     * @return string|null
     */
    public function getTxnActivityDay(): ?string
    {
        return $this->txnActivityDay;
    }

    /**
     * @param string|null $txnActivityDay
     */
    public function setTxnActivityDay(?string $txnActivityDay): void
    {
        $this->txnActivityDay = $txnActivityDay;
    }

    /**
     * @return string|null
     */
    public function getTxnActivityYear(): ?string
    {
        return $this->txnActivityYear;
    }

    /**
     * @param string|null $txnActivityYear
     */
    public function setTxnActivityYear(?string $txnActivityYear): void
    {
        $this->txnActivityYear = $txnActivityYear;
    }

    /**
     * @return string|null
     */
    public function getShipAddressUsage(): ?string
    {
        return $this->shipAddressUsage;
    }

    /**
     * @param string|null $shipAddressUsage
     */
    public function setShipAddressUsage(?string $shipAddressUsage): void
    {
        $this->shipAddressUsage = $shipAddressUsage;
    }

    /**
     * @return string|null
     */
    public function getShipAddressUsageInd(): ?string
    {
        return $this->shipAddressUsageInd;
    }

    /**
     * @param string|null $shipAddressUsageInd
     */
    public function setShipAddressUsageInd(?string $shipAddressUsageInd): void
    {
        $this->shipAddressUsageInd = $shipAddressUsageInd;
    }

    /**
     * @return string|null
     */
    public function getShipNameIndicator(): ?string
    {
        return $this->shipNameIndicator;
    }

    /**
     * @param string|null $shipNameIndicator
     */
    public function setShipNameIndicator(?string $shipNameIndicator): void
    {
        $this->shipNameIndicator = $shipNameIndicator;
    }

    /**
     * @return string|null
     */
    public function getAcctID(): ?string
    {
        return $this->acctID;
    }

    /**
     * @param string|null $acctID
     */
    public function setAcctID(?string $acctID): void
    {
        $this->acctID = $acctID;
    }

    /**
     * @return string|null
     */
    public function getBillAddrCity(): ?string
    {
        return $this->billAddrCity;
    }

    /**
     * @param string|null $billAddrCity
     */
    public function setBillAddrCity(?string $billAddrCity): void
    {
        $this->billAddrCity = $billAddrCity;
    }

    /**
     * @return string|null
     */
    public function getBillAddrCountry(): ?string
    {
        return $this->billAddrCountry;
    }

    /**
     * @param string|null $billAddrCountry
     */
    public function setBillAddrCountry(?string $billAddrCountry): void
    {
        $this->billAddrCountry = $billAddrCountry;
    }

    /**
     * @return string|null
     */
    public function getBillAddrLine1(): ?string
    {
        return $this->billAddrLine1;
    }

    /**
     * @param string|null $billAddrLine1
     */
    public function setBillAddrLine1(?string $billAddrLine1): void
    {
        $this->billAddrLine1 = $billAddrLine1;
    }

    /**
     * @return string|null
     */
    public function getBillAddrLine2(): ?string
    {
        return $this->billAddrLine2;
    }

    /**
     * @param string|null $billAddrLine2
     */
    public function setBillAddrLine2(?string $billAddrLine2): void
    {
        $this->billAddrLine2 = $billAddrLine2;
    }

    /**
     * @return string|null
     */
    public function getBillAddrLine3(): ?string
    {
        return $this->billAddrLine3;
    }

    /**
     * @param string|null $billAddrLine3
     */
    public function setBillAddrLine3(?string $billAddrLine3): void
    {
        $this->billAddrLine3 = $billAddrLine3;
    }

    /**
     * @return string|null
     */
    public function getBillAddrPostCode(): ?string
    {
        return $this->billAddrPostCode;
    }

    /**
     * @param string|null $billAddrPostCode
     */
    public function setBillAddrPostCode(?string $billAddrPostCode): void
    {
        $this->billAddrPostCode = $billAddrPostCode;
    }

    /**
     * @return string|null
     */
    public function getBillAddrState(): ?string
    {
        return $this->billAddrState;
    }

    /**
     * @param string|null $billAddrState
     */
    public function setBillAddrState(?string $billAddrState): void
    {
        $this->billAddrState = $billAddrState;
    }

    /**
     * @return string|null
     */
    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    /**
     * @param string|null $homePhone
     */
    public function setHomePhone(?string $homePhone): void
    {
        $this->homePhone = $homePhone;
    }

    /**
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    /**
     * @param string|null $mobilePhone
     */
    public function setMobilePhone(?string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return string|null
     */
    public function getShipAddrCity(): ?string
    {
        return $this->shipAddrCity;
    }

    /**
     * @param string|null $shipAddrCity
     */
    public function setShipAddrCity(?string $shipAddrCity): void
    {
        $this->shipAddrCity = $shipAddrCity;
    }

    /**
     * @return string|null
     */
    public function getShipAddrCountry(): ?string
    {
        return $this->shipAddrCountry;
    }

    /**
     * @param string|null $shipAddrCountry
     */
    public function setShipAddrCountry(?string $shipAddrCountry): void
    {
        $this->shipAddrCountry = $shipAddrCountry;
    }

    /**
     * @return string|null
     */
    public function getShipAddrLine1(): ?string
    {
        return $this->shipAddrLine1;
    }

    /**
     * @param string|null $shipAddrLine1
     */
    public function setShipAddrLine1(?string $shipAddrLine1): void
    {
        $this->shipAddrLine1 = $shipAddrLine1;
    }

    /**
     * @return string|null
     */
    public function getShipAddrLine2(): ?string
    {
        return $this->shipAddrLine2;
    }

    /**
     * @param string|null $shipAddrLine2
     */
    public function setShipAddrLine2(?string $shipAddrLine2): void
    {
        $this->shipAddrLine2 = $shipAddrLine2;
    }

    /**
     * @return string|null
     */
    public function getShipAddrLine3(): ?string
    {
        return $this->shipAddrLine3;
    }

    /**
     * @param string|null $shipAddrLine3
     */
    public function setShipAddrLine3(?string $shipAddrLine3): void
    {
        $this->shipAddrLine3 = $shipAddrLine3;
    }

    /**
     * @return string|null
     */
    public function getShipAddrPostCode(): ?string
    {
        return $this->shipAddrPostCode;
    }

    /**
     * @param string|null $shipAddrPostCode
     */
    public function setShipAddrPostCode(?string $shipAddrPostCode): void
    {
        $this->shipAddrPostCode = $shipAddrPostCode;
    }

    /**
     * @return string|null
     */
    public function getShipAddrState(): ?string
    {
        return $this->shipAddrState;
    }

    /**
     * @param string|null $shipAddrState
     */
    public function setShipAddrState(?string $shipAddrState): void
    {
        $this->shipAddrState = $shipAddrState;
    }

    /**
     * @return string|null
     */
    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    /**
     * @param string|null $workPhone
     */
    public function setWorkPhone(?string $workPhone): void
    {
        $this->workPhone = $workPhone;
    }

    /**
     * @return string|null
     */
    public function getDeliveryEmailAddress(): ?string
    {
        return $this->deliveryEmailAddress;
    }

    /**
     * @param string|null $deliveryEmailAddress
     */
    public function setDeliveryEmailAddress(?string $deliveryEmailAddress): void
    {
        $this->deliveryEmailAddress = $deliveryEmailAddress;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeframe(): ?string
    {
        return $this->deliveryTimeframe;
    }

    /**
     * @param string|null $deliveryTimeframe
     */
    public function setDeliveryTimeframe(?string $deliveryTimeframe): void
    {
        $this->deliveryTimeframe = $deliveryTimeframe;
    }

    /**
     * @return string|null
     */
    public function getPreOrderDate(): ?string
    {
        return $this->preOrderDate;
    }

    /**
     * @param string|null $preOrderDate
     */
    public function setPreOrderDate(?string $preOrderDate): void
    {
        $this->preOrderDate = $preOrderDate;
    }

    /**
     * @return string|null
     */
    public function getPreOrderPurchaseInd(): ?string
    {
        return $this->preOrderPurchaseInd;
    }

    /**
     * @param string|null $preOrderPurchaseInd
     */
    public function setPreOrderPurchaseInd(?string $preOrderPurchaseInd): void
    {
        $this->preOrderPurchaseInd = $preOrderPurchaseInd;
    }
}