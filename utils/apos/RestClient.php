<?php


/**
 * Class RestClient
 *
 * @author Gabriel Raul Marini
 */
class RestClient
{
    private const CONTENT_TYPE = "application/x-www-form-urlencoded";
    private const POST = "POST";

    /**
     * Perform a REST call to the selected endpoint
     *
     * @param $url of the endpoint
     * @param $data body of the request
     * @return bool|string
     */
    public function callAPI($url, $data)
    {
        $method = self::POST;
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
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
            'Content-Type: '.static::CONTENT_TYPE
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            echo curl_error($curl);
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }


}