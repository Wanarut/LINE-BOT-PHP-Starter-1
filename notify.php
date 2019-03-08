<?php
 
$strAccessToken = "7ZJ9fzk7sF5LqPmrVtqWDtJ5blQu/ssTaAHfFShVgl8K3lQYHdwJBGdhRK5JCZ151b4F9bdc4ScC6wLDFGfMudU8pyC8Thjt9vTWoEwirwoPondW7lB7Bxq21DR4AzPoUV0gTC9kjuIsX5hs95epagdB04t89/1O/w1cDnyilFU=";

$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "Ub08e567470fdd7c3bdfcce20a7c2a847";
$arrPostData['messages'][0]['type'] = "text";

$dataUrl = "https://api.netpie.io/feed/73DataFeed?apikey=n9zeDLtDEpPJBQX1ekpTs0kmjwu3pD1H&granularity=10seconds&since=24hours&filter=Illuminance,Moisture";
$json = file_get_contents($dataUrl);
$datasource = json_decode($json, true);
$light_value = $datasource["lastest_data"][1]["values"][0][1];
$arrPostData['messages'][0]['text'] = "ค่าแสงตอนนี้ = ".$light_value;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
echo $result;
?>