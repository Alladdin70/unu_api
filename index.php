<?php
define('GET_TARIFFS','get_tariffs');
define('API_KEY','r1h5l9kdofbmgn1gikqw90x811dc9v07oz13m3slnre5en87bdosdxtq50wvqift');
define('URL','https://unu.ru/api');


$param = array(
    'action' => GET_TARIFFS,
    'api_key' => API_KEY
    );

$tarriffs = json_decode(api_request($param),true)["tariffs"];
foreach ($tarriffs as $tariff){
    var_dump($tariff);
    echo("<br/>");
}

function api_request($param){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;    
}




