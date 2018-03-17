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
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $xmlstr = curl_exec($curl);
  $GLOBALS['xml'] = simplexml_load_string($xmlstr);
  curl_close($curl);
};
