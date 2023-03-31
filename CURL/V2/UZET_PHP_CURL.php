<?php
// UZET PHP APi With Client Deatils
// https://github.com/uzetco/UZET_PHP


// use this function in your project 

function UZETCreateLink($Product,$amount,$callback_url,$customer_email,$billing_street1,$billing_city,$billing_state,$billing_country,$billing_postcode,$customer_givenName,$customer_surname,$customer_phonenumber){

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
 CURLOPT_POSTFIELDS => 'email='.$UZET_Email.'&Publishable_Key='.$UZET_Key.'&Product='.$Product.'&amount='.$amount.'&callback_url='.$callback_url.'&customer_email='.$customer_email.'&billing_street1='.$billing_street1.'&billing_city='.$billing_city.'&billing_state='.$billing_state.'&billing_country='.$billing_country.'&billing_postcode='.$billing_postcode.'&customer_givenName='.$customer_givenName.'&customer_surname='.$customer_surname.'&customer_phonenumber='.$customer_phonenumber.'',
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



// cell with UZET APi for get Payment url for Pay..
$Payment_Url = UZETCreateLink($UZET_Product,$UZET_amount,$UZET_callback_url,$UZET_customer_email,$UZET_billing_street1,$UZET_billing_city,$UZET_billing_state,$UZET_billing_country,$UZET_billing_postcode,$UZET_customer_givenName,$UZET_customer_surname,$UZET_customer_phonenumber);


echo "Payment Url is : $Payment_Url";