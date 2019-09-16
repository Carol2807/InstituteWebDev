<?php
//post
function send_otp($rec1,$msg1)
{
$url="https://www.way2sms.com/api/v1/sendCampaign";
$msg = urlencode($msg1);// urlencode your message
$rec = urlencode($rec1);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=3BI750RJ1JKO09D6MXCVCHXX2RDWL3ZG&secret=D6OQABDGV868C4HC&usetype=stage&phone=$rec&senderid=muskanrana2812@gmail.com&message=$msg");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;
}
?>