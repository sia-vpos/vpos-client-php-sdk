<?php


/**
 * Class RestClient
 *
 * Simple REST client used in the context of MERCHANT --> VPOS communication
 *
 * @author Gabriel Raul Marini
 */
class RestClient
{
    private const CONTENT_TYPE = "application/x-www-form-urlencoded";
    private const POST_METHOD = "POST";
    private const PUT_METHOD = "PUT";

    /**
     * Performs a generic call in POST|PUT
     *
     * @param string $url of the endpoint
     * @param string body of the request
     * @return bool|string outcome of the performed call | response's body
     */
    public function callAPI(string $url, string $xmlData)
    {
        $method = self::POST_METHOD;
        echo $xmlData;
        $data = "data=" . $xmlData;
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::PUT_METHOD);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            //  'APIKEY: 111111111111111111111',
            'Content-Type: ' . static::CONTENT_TYPE
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        echo "Response from VPOS is: \n" . $result;
        if (!$result) {
            echo curl_error($curl);
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

}