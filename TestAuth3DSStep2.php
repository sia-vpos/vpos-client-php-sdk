<?php
require("utils/Utils.php");
require("models/request/Auth3DSStep2RequestDto.php");
require("models/response/Auth3DSResponseStep2.php");
require("client/VPOSClient.php");

const SHOP_ID = "129281292800109";
const PAN_ALIAS = "0000298241731500671";
const PARES = "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";
const API_RESULT_KEY = "E-vmE-GHXmx73-Lfg24LztZ-7-yCyVsKn4QXphL5qzf-Kr-Cf-JWpZwZgaZRA5dR9V677xL4uCbc-Ce--8h2-tdrSu--QKjF-nZh";
const MAC_KEY_REDIRECT = "fU-9et-s-Sj8W---E8uhUDu9fEzqr8hH3L95s48r9nq-cq3cBXbp-tZsvGQU--t-nqmtaW-7x-7-C2PdcuFdbHuShQ-pYVWnr-4-";
const URL_WEB_API = "https://atpostest.ssb.it/atpos/apibo/apiBOXML.app";


$vPOSClient = new VPOSClient(MAC_KEY_REDIRECT, API_RESULT_KEY, URL_WEB_API);
$response = $vPOSClient->start3DSAuthStep2(buildAuth3DSTestStep2());
var_dump($response);


function buildAuth3DSTestStep2()
{
    $dto = new Auth3DSStep2RequestDto();
    $dto->setOperatorId("operator");
    $dto->setShopId(SHOP_ID);
    $dto->setPaRes(PARES);
    $dto->setOriginalRefReqNum("20200204284373494241198111611950");
    return $dto;
}

