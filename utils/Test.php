<?php
require("mac/MacCalculator.php");
require("mac/AlgorithmEnum.php");
require("HTMLGenerator.php");
require("encryption/AESEncoder.php");
require("Utils.php");
require("xml/XMLParser.php");
require("apos/RestClient.php");


$macCalculator = new MacCalculator(AlgorithmEnum::SHA_256);
$htmlGenerator = new HTMLGenerator();

//echo($macCalculator->calculate("URLMS=https://te.t-frutta.eu/TImooneyWS/app_api/v10/payment/cardData?consumerId=3b350c34-d923-4552-91bf-67bc4f99da92&URLDONE=http://localhost:8080/payment-gateway/vpos/tokenize&ORDERID=s564c564c6as54as654c65as4&SHOPID=129281292800104&AMOUNT=10&CURRENCY=978&ACCOUNTINGMODE=D&AUTHORMODE=I&OPTIONS=GM", "CNCuDT5Vyws2v9t--RhDdtCwstaV2tqVeqfE-D8G-S-Ds--C-fFkSBxw-3wWBqBC--U9hwN-H-Mj4ZZHMr--YSHLdU5WKLx-cT-T"));
//echo($htmlGenerator->generateParamsHtml(array("ORDERID" => "45646", "OPERATORID" => "mkdsm")));
//echo ($htmlGenerator->base64ToHtml("PGh0bWw+PGJvZHk+PC9ib2R5PjwvaHRtbD4K", 500));
//echo $htmlGenerator->htmlToBase64("null", array("ORDERID"=>"12345678"));
//echo AESEncoder::encrypt("aaaaaaaaaaaaaaaa", "ciao");
//echo Utils::generateRandomDigits();
$restClient = new RestClient();
echo $restClient->callAPI("https://atpostest.ssb.it/atpos/apibo/apiBOXML.app", "data=<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<BPWXmlRequest><Release>02</Release><Request><Operation>AUTHORIZATION3DSSTEP1</Operation><Timestamp>2020-01-24T17:30:30.998</Timestamp><MAC>857af18a0f3e4083c23af4a868bd31139d9710f9a0230d2bff70bb0de41c18c4</MAC></Request><Data><AuthorizationRequest><Header><ShopID>129281292800109</ShopID><OperatorID>Giammaicol</OperatorID><ReqRefNum>20200124787168143161419357525102</ReqRefNum></Header><OrderID>296167456591</OrderID><PAN>0000409500729966732</PAN><CVV2>111</CVV2><ExpDate>2112</ExpDate><Amount>2000</Amount><Currency>978</Currency><AccountingMode>D</AccountingMode><Network>98</Network></AuthorizationRequest></Data></BPWXmlRequest>");