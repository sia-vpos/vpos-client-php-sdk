<?php
require_once(__DIR__ . "/Authorization.php");
require_once(__DIR__ . "/VBVRedirect.php");
require_once(__DIR__ . "/PanAliasData.php");

/**
 * Class Auth3DSResponseStep2
 */
class Auth3DSResponseStep2 extends Response
{
    private ?Authorization $authorization = null;
    private ?PanAliasData $panAliasData = null;

    /**
     * Auth3DSResponseStep2 constructor.
     * @param string $xml representation of the object
     */
    public function __construct(string $xml)
    {
        parent::__construct($xml);
        $response = new SimpleXMLElement($xml);
        if (isset($response->Data->Authorization))
            $this->authorization = new Authorization($response->Data->Authorization);
        if (isset($response->Data->PanAliasData))
            $this->panAliasData = new PanAliasData($response->Data->PanAliasData);
    }

    /**
     * @return Authorization
     */
    public function getAuthorization(): ?Authorization
    {
        return $this->authorization;
    }

    /**
     * @return PanAliasData
     */
    public function getPanAliasData(): ?PanAliasData
    {
        return $this->panAliasData;
    }

}