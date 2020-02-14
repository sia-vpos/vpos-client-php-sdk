<?php
require("utils/Utils.php");
require("dto/request/Auth3DSDto.php");
require("client/VPOSClient.php");

const SHOP_ID = "129281292800109";
const PAN_ALIAS = "0000298241731500671";
const API_RESULT_KEY = "E-vmE-GHXmx73-Lfg24LztZ-7-yCyVsKn4QXphL5qzf-Kr-Cf-JWpZwZgaZRA5dR9V677xL4uCbc-Ce--8h2-tdrSu--QKjF-nZh";
const MAC_KEY_REDIRECT = "fU-9et-s-Sj8W---E8uhUDu9fEzqr8hH3L95s48r9nq-cq3cBXbp-tZsvGQU--t-nqmtaW-7x-7-C2PdcuFdbHuShQ-pYVWnr-4-";
const URL_WEB_API = "https://atpostest.ssb.it/atpos/apibo/apiBOXML.app";


$vPOSClient = new VPOSClient(MAC_KEY_REDIRECT, API_RESULT_KEY, URL_WEB_API);
$vPOSClient->setProxy("proxy-dr.reply.it", 8080);
$response = $vPOSClient->startAuth3DS(buildAuth3DSTest1());
var_dump($response);


function buildAuth3DSTest1()
{
    $dto = new Auth3DSDto();
    $dto->setIsMasterpass(false);
    $dto->setOrderId(Utils::generateRandomDigits());
    $dto->setPan(PAN_ALIAS);
    $dto->setExpDate("2112");
    $dto->setAmount("2000");
    $dto->setCurrency("978");
    $dto->setCvv2("111");
    $dto->setAccountingMode("D");
    $dto->setNetwork("98");
    $dto->setShopId(SHOP_ID);
    $dto->setOperatorId("operator");
    $dto->setMerchantUrl("http://jnfjdshjfhjd.it");
    $dto->setInPerson("S");
    return $dto;
}

