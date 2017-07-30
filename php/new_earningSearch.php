<?php
include('simple_html_dom.php');


$aapl = file_get_html('https://finance.yahoo.com/calendar/earnings/?symbol=GM')->plaintext;

$currentMonth = date("n");
$array = ["Jan","Feb","Mar","Apr", "May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];


for($i = $currentMonth; $i < 13; $i++)
{
  if(strpos($aapl, $array[$i]) !== false){
    $pos= strpos($aapl, $array[$i]);
    echo substr($aapl,$pos,22);
  }
}
?>
