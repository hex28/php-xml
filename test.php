<?php
include 'functions.php';

function test_curl(){
  $test = "http://www.andy-huynh.com:5000/postsxml/";
  curl($test);
  $response = $_SESSION['xml'];
  if ($response !== Null){
    echo "function curl: True <br/> Output : Valid";
  } else {
    echo "function curl: False <br/> Output : Invalid ";
  }
  echo "<br/><br/>";
}

echo test_curl();

function test_str_rep(){
  $test = "?!hello world!?";
  $test = str_rep($test);

  if ($test === 'hello-world'){
    echo "function str_rep: " . $test . "<br/>Output : Valid";
  } else {
    echo "function str_rep: " . $test . "<br/>Output : Invalid";
  }
  echo "<br/><br/>";
}

echo test_str_rep();

 ?>
