<?php

// UZET PHP APi WithOut Client Deatils
// https://github.com/uzetco/UZET_PHP


$client = new Client();
$headers = [
  'Content-Type' => 'application/x-www-form-urlencoded'
];

// this info's will get from your email README.pdf
$UZET_Url   = "";
$UZET_Key   = "";
$UZET_Email = "";



// Customer Info's sent with APi 

$UZET_Product = "Order 10#"; // Name Product
$UZET_Total  = "10"; // Amount USD 
$UZET_callback_url = "https://yourdomen.com/uzet/callback"; // After Payment Completed will back the your url



$options = [
'form_params' => [
  'email' => $UZET_Email,
  'Publishable_Key' => $UZET_Key,
  'Product' => $UZET_Product,
  'Total' => $UZET_Total,
  'callback_url' => $UZET_callback_url,
]];
$request = new Request('POST', $UZET_Url, $headers);
$res = $client->sendAsync($request, $options)->wait();
$body =  $res->getBody();
$json = json_decode($body);
$Payment_Url = $json->url;


echo "Payment Url is : $Payment_Url";

