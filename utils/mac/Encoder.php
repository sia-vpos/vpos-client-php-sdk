<?php

require("MacCalculator.php");

class Encoder
{
    private MacCalculator $macCalculator;

    public function __construct()
    {
        $this->macCalculator = new MacCalculator();
    }

    /**
     * @param array $map of key -> values from which MAC string is built
     * @param string $key
     * @return the MAC calculated on the associative array
     */
    public function getMac(array $map, string $key)
    {
        $macString = "";
        foreach ($map as $key => $value) {
            $macString .= $key;
            $macString .= "=";
            $macString .= $value;
            $macString .= "&";
        }

        $macString = substr($macString, 0, strlen($macString) - 1);
        return $this->macCalculator->calculate($macString, $key);
    }

}