<?php
require_once(__DIR__ . "/Response.php");
require_once(__DIR__ . "/Authorization.php");
require_once(__DIR__ . "/VBVRedirect.php");
require_once(__DIR__ . "/PanAliasData.php");

/**
 * Class Auth3DSResponse
 */
class Auth3DSResponse extends Response
{
    private ?Authorization $authorization = null;
    private ?VBVRedirect $vbvRedirect = null;
    private ?PanAliasData $panAliasData = null;

    /**
     * Auth3DSResponse constructor.
     * @param string $xml representation of the object
     */
    public function __construct(string $xml)
    {
        parent::__construct($xml);
        $response = new SimpleXMLElement($xml);
        if (isset($response->Data->Authorization))
            $this->authorization = new Authorization($response->Data->Authorization);
        if (isset($response->Data->VBVRedirect))
            $this->vbvRedirect = new VBVRedirect($response->Data->VBVRedirect);
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
     * @return VBVRedirect
     */
    public function getVbvRedirect(): ?VBVRedirect
    {
        return $this->vbvRedirect;
    }

    /**
     * @return PanAliasData
     */
    public function getPanAliasData(): ?PanAliasData
    {
        return $this->panAliasData;
    }

}