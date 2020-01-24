<?php
require("mac/MacCalculator.php");
require("mac/AlgorithmEnum.php");
require("HTMLGenerator.php");
require("encryption/AESEncoder.php");
require("Utils.php");

$macCalculator = new MacCalculator(AlgorithmEnum::SHA_256);
$htmlGenerator = new HTMLGenerator();

//echo($macCalculator->calculate("URLMS=https://te.t-frutta.eu/TImooneyWS/app_api/v10/payment/cardData?consumerId=3b350c34-d923-4552-91bf-67bc4f99da92&URLDONE=http://localhost:8080/payment-gateway/vpos/tokenize&ORDERID=s564c564c6as54as654c65as4&SHOPID=129281292800104&AMOUNT=10&CURRENCY=978&ACCOUNTINGMODE=D&AUTHORMODE=I&OPTIONS=GM", "CNCuDT5Vyws2v9t--RhDdtCwstaV2tqVeqfE-D8G-S-Ds--C-fFkSBxw-3wWBqBC--U9hwN-H-Mj4ZZHMr--YSHLdU5WKLx-cT-T"));
//echo($htmlGenerator->generateParamsHtml(array("ORDERID" => "45646", "OPERATORID" => "mkdsm")));
//echo ($htmlGenerator->base64ToHtml("PGh0bWw+PGJvZHk+PC9ib2R5PjwvaHRtbD4K", 500));
//echo $htmlGenerator->htmlToBase64("null", array("ORDERID"=>"12345678"));
//echo AESEncoder::encrypt("aaaaaaaaaaaaaaaa", "ciao");
echo Utils::generateRandomDigits();
new SimpleXMLElement();



