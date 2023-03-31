<?php

// UZET PHP APi With Client Deatils
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
$UZET_amount  = "10"; // Amount USD 
$UZET_callback_url = "https://yourdomen.com/uzet/callback"; // After Payment Completed will back the your url
$UZET_customer_email = "email@email.com"; // Email Customer
$UZET_billing_street1 = "Dubae"; // Billing Street 1
$UZET_billing_city = "Dubae"; // Customer City
$UZET_billing_state = "Dubae Street "; // Billing State
$UZET_billing_country = "AE";// Customer Country  like AE - IQ - FR etc...
$UZET_billing_postcode = "10013"; // Customer ZIP Code
$UZET_customer_givenName = "Azozz"; // Customer First Name
$UZET_customer_surname   = "ALFiras"; // Customer Last Name
$UZET_customer_phonenumber = "9647719675127"; // Customer Phone Number



$options = [
'form_params' => [
  'email' => $UZET_Email,
  'Publishable_Key' => $UZET_Key,
  'Product' => $UZET_Product,
  'amount' => $UZET_amount,
  'callback_url' => $UZET_callback_url,
  'customer_email' => $UZET_customer_email,
  'billing_street1' => $UZET_billing_street1,
  'billing_city' => $UZET_billing_city,
  'billing_state' => $UZET_billing_state,
  'billing_country' => $UZET_billing_country,
  'billing_postcode' => $UZET_billing_postcode,
  'customer_givenName' => $UZET_customer_givenName,
  'customer_surname' => $UZET_customer_surname,
  'customer_phonenumber' => $UZET_customer_phonenumber
]];
$request = new Request('POST', $UZET_Url, $headers);
$res = $client->sendAsync($request, $options)->wait();
$body =  $res->getBody();
$json = json_decode($body);
$Payment_Url = $json->url;


echo "Payment Url is : $Payment_Url";

