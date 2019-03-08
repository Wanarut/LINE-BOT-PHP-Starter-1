<?php
 
$strAccessToken = "7ZJ9fzk7sF5LqPmrVtqWDtJ5blQu/ssTaAHfFShVgl8K3lQYHdwJBGdhRK5JCZ151b4F9bdc4ScC6wLDFGfMudU8pyC8Thjt9vTWoEwirwoPondW7lB7Bxq21DR4AzPoUV0gTC9kjuIsX5hs95epagdB04t89/1O/w1cDnyilFU=";

$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "Ub08e567470fdd7c3bdfcce20a7c2a847";
// $arrPostData['messages'][0]['type'] = "text";
// $arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
$arrPostData['messages'][0] = {
    "type": "bubble",
    "hero": {
      "type": "image",
      "url": "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/9a16747d-9812-4726-b146-9fbb7349fcfa/d9h6vp5-a8747874-acbe-4946-a1f8-fa83e851cea3.jpg/v1/fill/w_894,h_894,q_70,strp/thirsty_plant_by_rflaae_d9h6vp5-pre.jpg",
      "size": "full",
      "aspectRatio": "20:11",
      "aspectMode": "cover",
      "action": {
        "type": "uri",
        "uri": "https://linecorp.com"
      }
    },
    "body": {
      "type": "box",
      "layout": "vertical",
      "spacing": "md",
      "action": {
        "type": "uri",
        "uri": "https://linecorp.com"
      },
      "contents": [
        {
          "type": "text",
          "text": "หิวน้ำแล้วครับ",
          "size": "xl",
          "weight": "bold"
        },
        {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "box",
              "layout": "baseline",
              "contents": [
                {
                  "type": "icon",
                  "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/restaurant_regular_32.png"
                },
                {
                  "type": "text",
                  "text": "Soil Moisture ",
                  "weight": "bold",
                  "margin": "sm",
                  "flex": 0
                },
                {
                  "type": "text",
                  "text": "50",
                  "weight": "bold",
                  "margin": "sm",
                  "flex": 0
                },
                {
                  "type": "text",
                  "text": " %",
                  "weight": "bold",
                  "margin": "sm",
                  "flex": 0
                }
              ]
            }
          ]
        }
      ]
    },
    "footer": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "button",
          "style": "primary",
          "color": "#905c44",
          "action": {
            "type": "uri",
            "label": "รดน้ำ",
            "uri": "https://www.facebook.com/AceQueasy"
          }
        }
      ]
    }
  };
 
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