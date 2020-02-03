<?php


/**
 * Class HTMLGenerator
 *
 * Utility class implementing methods to generate customs HTML pages
 *
 * @author Gabriel Raul Marini
 */
class HTMLGenerator
{

    private const FORM_PATTERN = "PGZvcm0gYWN0aW9uPSJbQVBPU19VUkxdIiBtZXRob2Q9IlBPU1QiPjxpbnB1dCBuYW1lPSJQQUdFIiB0eXBlPSJoaWRkZW4iIHZhbHVlPSJMQU5EIj5bUEFSQU1FVEVSU108aW5wdXQgaWQ9InN1Ym1pdCIgc3R5bGU9ImRpc3BsYXk6IG5vbmU7IiB0eXBlPXN1Ym1pdCAgdmFsdWU9Ii4iPjwvZm9ybT4=";
    private const INPUT_PATTERN = "PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iS0VZIiB2YWx1ZT0iVkFMVUUiPg==";
    private const SCRIPT = "PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPndpbmRvdy5vbmxvYWQgPSBmdW5jdGlvbigpe3NldFRpbWVvdXQoZnVuY3Rpb24oKXtkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc3VibWl0JykuY2xpY2soKTt9LCBbREVMQVldKTt9PC9zY3JpcHQ+";

    /**
     * Generates the hidden form content for a redirect payment
     *
     * @param array $params to be filled in the hidden form
     * @return string the concatenated input HTML tags with the input values
     */
    public function generateParamsHtml(array $params)
    {
        $paramString = "";
        $decodedInputPattern = base64_decode(static::INPUT_PATTERN);

        foreach ($params as $key => $value)
            if (isset($params[$key]) && strlen($value) > 0) {
                $paramString .= str_replace("KEY", $key, $decodedInputPattern);
                $paramString = str_replace("VALUE", $value, $paramString);
            }

        return $paramString;
    }

    /**
     * @param string $base64
     * @param int $delay
     * @return false|string|string[]
     */
    public function base64ToHtml(string $base64, int $delay)
    {
        $html = base64_decode($base64);
        $form = base64_decode(static::FORM_PATTERN);
        $script = base64_decode(static::SCRIPT);

        $html = str_replace("</body>", $form . "</body>", $html);
        $html = str_replace("</html>", $script . "</html>", $html);
        $html = str_replace("[DELAY]", $delay, $html);

        return $html;
    }

    /**
     * @param string $filepath std filepath of the html template
     * @param string $urlApos redirect url used to carry out the payment
     * @param array $params payment info
     * @return string the base
     */
    public function htmlToBase64(string $filepath, string $urlApos, array $params)
    {
        $html = file_get_contents($filepath);
        $html = str_replace("[APOS_URL]", $urlApos, $html);
        $html = str_replace("[PARAMETERS]", $this->generateParamsHtml($params), $html);
        return base64_encode($html);
    }

}