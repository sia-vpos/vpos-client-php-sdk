<?php
require_once(__DIR__ . "/Response.php");
require_once(__DIR__ . "/Verify.php");

/**
 * Class VerifyResponse
 */
class VerifyResponse extends Response
{
    private ?Verify $verify = null;

    /**
     * VerifyResponse constructor.
     * @param string $xml representation of the object
     */
    public function __construct(string $xml)
    {
        parent::__construct($xml);
        $response = new SimpleXMLElement($xml);
        if (isset($response->Data->Verify))
            $this->verify = new Verify($response->Data->Verify);
    }

    /**
     * @return Verify|null
     */
    public function getVerify()
    {
        return $this->verify;
    }

}