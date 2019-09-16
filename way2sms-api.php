<?php

function sendSms($bill,$amt,$code,$receiver){
$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Your order of rs ".$amt." is submitted successfully. Bill no is ".$bill." Order code is ".$code);// urlencode your message
$rec = urlencode($receiver);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=ZHMAIT9CJ4ZU7DX3EH8W49B21JFCJJLU&secret=L2BG66ROVKEYJPKV&usetype=stage&phone=$rec&senderid=pratibhashukla80@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;
}
function sendSms_forgot($otp,$receiver){
$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($otp);// urlencode your message
$rec = urlencode($receiver);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=3BI750RJ1JKO09D6MXCVCHXX2RDWL3ZG&secret=D6OQABDGV868C4HC&usetype=stage&phone=$rec&senderid=muskanrana2812@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
//echo $result;
}



function sendmsg($mobile,$msg,$name){
$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Hello ".$name."- : ".$msg);// urlencode your message
$rec = urlencode($mobile);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=ZHMAIT9CJ4ZU7DX3EH8W49B21JFCJJLU&secret=L2BG66ROVKEYJPKV&usetype=stage&phone=$rec&senderid=pratibhashukla80@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

}
?>
