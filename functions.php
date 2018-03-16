<?php
function str_rep($str) {
  $str =str_replace(" ", "-", $str);
  $str =str_replace("!", "", $str);
  $str =str_replace(".", "", $str);
  $str =str_replace("?", "", $str);
  return $str;
};

// curl function, used to new xml
function curl($url){
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $xmlstr = curl_exec($curl);
  $_SESSION['xml'] = simplexml_load_string($xmlstr);
  $xml = $_SESSION['xml'];
  curl_close($curl);
};
