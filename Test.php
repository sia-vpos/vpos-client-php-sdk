<?php
require_once("client/ClientConfig.php");
require_once("client/VPOSClient.php");
require_once("models/request/Auth3DS2Step0.php");

const SHOP_ID = "129281292800040";
const REDIRECT_KEY = "";
const API_KEY = "N-qVfy-EvuNShpareCH-CR-RrG7gdnM5XbbLeXA395uVkx-jgS--7AHSvC9aVVvjt8XbNL6-9BxjA-FdSpuMCp-XbLNNqYmuZ-Xc";

const URL_API = "https://atpostest.ssb.it/atpos/apibo/apiBOXML.app";
const URL_REDIRECT = "https://atpostest.ssb.it/atpos/pagamenti/main";

date_default_timezone_set('Europe/Rome');
$config = new ClientConfig(SHOP_ID, REDIRECT_KEY, API_KEY, URL_API, URL_REDIRECT);
$vPOSClient = new VPOSClient($config);
$response = $vPOSClient->start3DS2Step0(buildAuth3DSStep0());
var_dump($response);

function buildAuth3DSStep0()
{
    $auth3DS = new Auth3DS2Step0();
// with pan   
//    $auth3DS -> setPan("4118830900940017");
//    $auth3DS -> setNetwork("01");
// with token
    $auth3DS -> setPan("0000423178147851547");
    $auth3DS -> setNetwork("98");
// end with    
    $auth3DS -> setOperatorId("testopid");
    $auth3DS -> setAmount("2000");
    $auth3DS -> setAccountingMode("D");
    $auth3DS -> setExpDate("2512");
    $auth3DS -> setCvv2("111");
    $auth3DS -> setCurrency("978");
    $auth3DS -> setEmailCh("tester@gmail.com");
    $auth3DS -> setExponent("2");
    $auth3DS -> setNameCH("mario testa");
    $auth3DS -> setOrderId(substr(Utils::generateRandomDigits(), 0, 12));
    $auth3DS -> setTRecurr("C");
    $auth3DS -> setCRecurr("COF0123456789");
    $auth3DS -> setUserId("testusrid");
    $auth3DS -> setProductRef("testref");
    $auth3DS -> setNotifURL("https://atpostest.ssb.it/atpos/apibo/en/3ds-notification.html");
    $auth3DS -> setThreeDSMtdNotifURL("https://atpostest.ssb.it/atpos/apibo/en/3ds-notification.html");
    $auth3DS -> setThreeDSData('{"addrMatch":"N","chAccAgeInd":"04","chAccChange":"20190211","chAccChangeInd":"03","chAccDate":"20190210","chAccPwChange":"20190214","chAccPwChangeInd":"04","nbPurchaseAccount":"1000","txnActivityDay":"100","txnActivityYear":"100","shipAddressUsage":"20181220","shipAddressUsageInd":"03","shipNameIndicator":"01","billAddrCity":"billAddrCity","billAddrCountry":"004","billAddrLine1":"billAddrLine1","billAddrLine2":"billAddrLine2","billAddrLine3":"billAddrLine3","billAddrPostCode":"billAddrPostCode","billAddrState":"11","homePhone":"039-321818198111","mobilePhone":"33-312","shipAddrCity":"zio","shipAddrCountry":"008","shipAddrLine1":"shipAddrLine1","shipAddrLine2":"shipAddrLine2","shipAddrLine3":"shipAddrLine3","shipAddrPostCode":"shipAddrPostCode","shipAddrState":"222","workPhone":"39-0321818198","deliveryEmailAddress":"a-b@example.com","deliveryTimeframe":"02","preOrderDate":"20181220","preOrderPurchaseInd":"01","reorderItemsInd":"02","shipIndicator":"01","browserAcceptHeader":"text/html,application/xhtml+xml,application/xml;","browserIP":"10.42.195.152","browserJavaEnabled":"true","browserLanguage":"it-IT","browserColorDepth":"16","browserScreenHeight":"1024","browserScreenWidth":"1920","browserTZ":"-120","browserUserAgent":"Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0"}');

    return $auth3DS;
}
