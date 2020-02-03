<?php
require("client/VPOSClient.php");
require("dto/request/PaymentInfo.php");
require_once("utils/Utils.php");

const SHOP_ID = "129281292800109";
const PAN_ALIAS = "0000409500729966732";
const API_RESULT_KEY = "E-vmE-GHXmx73-Lfg24LztZ-7-yCyVsKn4QXphL5qzf-Kr-Cf-JWpZwZgaZRA5dR9V677xL4uCbc-Ce--8h2-tdrSu--QKjF-nZh";
const MAC_KEY_REDIRECT = "fU-9et-s-Sj8W---E8uhUDu9fEzqr8hH3L95s48r9nq-cq3cBXbp-tZsvGQU--t-nqmtaW-7x-7-C2PdcuFdbHuShQ-pYVWnr-4-";
const URL_REDIRECT = "https://atpostest.ssb.it/atpos/pagamenti/main";
const URL_DONE = "http://localhost:8080/payment-gateway/vpos/tokenize";
const URL_BACK = "http://localhost:8080/payment-gateway/vpos/tokenize";
const URLMS = "https://te.t-frutta.eu/TImooneyWS/app_api/v10/payment/cardData?consumerId=3b350c34-d923-4552-91bf-67bc4f99da92";
const URL_WEB_API = "https://atpostest.ssb.it/atpos/apibo/apiBOXML.app";
const OPERATOR_ID = "John Doe";

$vPOSClient = new VPOSClient(MAC_KEY_REDIRECT, API_RESULT_KEY, URL_WEB_API);

$vPOSClient->injectHtmlTemplate("PGh0bWw+PGJvZHk+PC9ib2R5PjwvaHRtbD4=", 500);
echo $vPOSClient->getHtmlPaymentDocument(buildPaymentInfo(), URL_REDIRECT);

function buildPaymentInfo(){
    $paymentInfo = new PaymentInfo();
    $paymentInfo->setAmount("10000");
    $paymentInfo->setCurrency("978");
    $paymentInfo->setExponent("2");
    $paymentInfo->setOrderId(Utils::generateRandomDigits());
    $paymentInfo->setShopId(SHOP_ID);
    $paymentInfo->setUrlBack(URL_BACK);
    $paymentInfo->setUrlDone(URL_DONE);
    $paymentInfo->setUrlMs(URLMS);
    $paymentInfo->setAccountingMode("D");
    $paymentInfo->setAuthorMode("I");
    $paymentInfo->setOptions("M");
    return $paymentInfo;
}