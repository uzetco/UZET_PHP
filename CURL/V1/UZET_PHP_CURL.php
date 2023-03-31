<?php
// UZET PHP APi WithOut Client Deatils
// https://github.com/uzetco/UZET_PHP


// use this function in your project 

function UZETCreateLink($Product,$Total,$callback_url){

// this info's will get from your email README.pdf
$UZET_Url   = "";
$UZET_Key   = "";
$UZET_Email = "";

$curl = curl_init();
curl_setopt_array($curl, array(
 CURLOPT_URL => $UZET_Url,
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => '',
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 0,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS => 'email='.$UZET_Email.'&Publishable_Key='.$UZET_Key.'&Product='.$Product.'&Total='.$Total.'&callback_url='.$callback_url.'',
 CURLOPT_HTTPHEADER => array(
  'Content-Type: application/x-www-form-urlencoded'
 ),
));

$response = curl_exec($curl);
$json = json_decode($response);
curl_close($curl);
return $json->url;;
}

// Customer Info's sent with APi 

$UZET_Product = "Order 10#"; // Name Product
$UZET_Total  = "10"; // Amount USD 
$UZET_callback_url = "https://yourdomen.com/uzet/callback"; // After Payment Completed will back the your url


// cell with UZET APi for get Payment url for Pay..
$Payment_Url = UZETCreateLink($UZET_Product,$UZET_Total,$UZET_callback_url);


echo "Payment Url is : $Payment_Url";