﻿<?php

$handle = curl_init();
$url = "https://canthotv.vn/";
$domain = preg_replace("(^https?://)", "", $url );
$header = array('Accept-Language: fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3');
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLINFO_HEADER_OUT, 1);
curl_setopt($handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0.1');
curl_setopt($handle, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($handle, CURLOPT_NOSIGNAL, true);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, false); 
curl_setopt($handle, CURLOPT_HTTPHEADER, $header); 
curl_setopt($handle, CURLOPT_HEADER, false);
header('Content-Type: text/html');
header("Access-Control-Allow-Origin: *");
$result = curl_exec($handle);
var_dump($result);   

?>