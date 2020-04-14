<?php
require_once("utils/Utils.php");
require_once("models/request/Auth3DS2Step1.php");
require_once("client/VPOSClient.php");
require_once("client/ClientConfig.php");


const SHOP_ID = "129281292800109";
const PAN_ALIAS = "0000298241731500671";
const API_RESULT_KEY = "E-vmE-GHXmx73-Lfg24LztZ-7-yCyVsKn4QXphL5qzf-Kr-Cf-JWpZwZgaZRA5dR9V677xL4uCbc-Ce--8h2-tdrSu--QKjF-nZh";
const MAC_KEY_REDIRECT = "fU-9et-s-Sj8W---E8uhUDu9fEzqr8hH3L95s48r9nq-cq3cBXbp-tZsvGQU--t-nqmtaW-7x-7-C2PdcuFdbHuShQ-pYVWnr-4-";
const URL_WEB_API = "https://atpostest.ssb.it/atpos/apibo/apiBOXML.app";
const URL_REDIRECT = "https://atpostest.ssb.it/atpos/pagamenti/main";


$config = new ClientConfig(SHOP_ID, MAC_KEY_REDIRECT, API_RESULT_KEY, URL_WEB_API, URL_REDIRECT);
$vPOSClient = new VPOSClient($config);
$vPOSClient->setProxy("proxy-dr.reply.it", 8080);
$response = $vPOSClient->start3DS2Step1(buildAuth3DSStep1());
var_dump($response);

function buildAuth3DSStep1()
{
    $dto = new Auth3DS2Step1();
    $dto->setOperatorId("jondoeee");
    $dto->setThreeDSTransID("70f5ce1a-ad93-43a0-930a-3931c04c100d");
    $dto->setThreeDsMtdComplInd("N");

    return $dto;
}

