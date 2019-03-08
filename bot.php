<?php
 
$strAccessToken = "7ZJ9fzk7sF5LqPmrVtqWDtJ5blQu/ssTaAHfFShVgl8K3lQYHdwJBGdhRK5JCZ151b4F9bdc4ScC6wLDFGfMudU8pyC8Thjt9vTWoEwirwoPondW7lB7Bxq21DR4AzPoUV0gTC9kjuIsX5hs95epagdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$arrPostData = array();
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
switch ($arrJson['events'][0]['message']['text']) {
    case "รับแจ้งเตือน":
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = "สวัสดีครับ ID ".$arrJson['events'][0]['source']['userId'];
		$arrPostData['messages'][1]['type'] = "text";
		$arrPostData['messages'][1]['text'] = "รับแจ้งเตือนแล้วครับ";
        break;
	case "ดูรูปต้นไม้":
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = "นี่คือรูปต้นไม้ปัจจุบันครับ";
		$arrPostData['messages'][1]['type'] = "image";
		$arrPostData['messages'][1]['originalContentUrl'] = "https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.southernliving.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_inbody_900x506%2Fpublic%2Fimage%2F2018%2F06%2Fmain%2Fgettyimages-666747504.jpg%3Fitok%3Dus2ysxoU%261529439640&q=85";
		$arrPostData['messages'][1]['previewImageUrl'] = "https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimg1.southernliving.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2F4_3_horizontal_inbody_900x506%2Fpublic%2Fimage%2F2018%2F06%2Fmain%2Fgettyimages-666747504.jpg%3Fitok%3Dus2ysxoU%261529439640&q=85";
		break;
    default:
		$arrPostData['messages'][0]['type'] = "text";
	  	$arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}

// if($arrJson['events'][0]['message']['text'] == "รับแจ้งเตือน"){
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "สวัสดี ID ".$arrJson['events'][0]['source']['userId'];
//   $arrPostData['messages'][1]['type'] = "text";
//   $arrPostData['messages'][1]['text'] = "รับแจ้งเตือนแล้วครับ";
// }else if($arrJson['events'][0]['message']['text'] == "ดูรูปต้นไม้"){
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
// }else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
// }else{
//   $arrPostData = array();
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//   $arrPostData['messages'][0]['type'] = "text";
//   $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
// }
 
 
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