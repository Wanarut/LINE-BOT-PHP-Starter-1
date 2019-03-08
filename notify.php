<?php
 
$strAccessToken = "7ZJ9fzk7sF5LqPmrVtqWDtJ5blQu/ssTaAHfFShVgl8K3lQYHdwJBGdhRK5JCZ151b4F9bdc4ScC6wLDFGfMudU8pyC8Thjt9vTWoEwirwoPondW7lB7Bxq21DR4AzPoUV0gTC9kjuIsX5hs95epagdB04t89/1O/w1cDnyilFU=";

$strUrl = "https://api.line.me/v2/bot/message/multicast";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
//$arrPostData['to'] = "Ub08e567470fdd7c3bdfcce20a7c2a847";
$arrPostData['to'] = ["Ub08e567470fdd7c3bdfcce20a7c2a847","xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"];
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 

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
 
?>