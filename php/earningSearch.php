<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>

<?php

$tickerlist = file('mydata.txt');
$tickers=explode("\n",$tickerlist[0]);


for ($x = 0; $x < count($tickers) ; $x++) {


$start = substr($tickers[$x],0,1);
$link = "https://finance.yahoo.com/calendar/earnings/?symbol=".chop($tickers[$x]);


$linkcontents = file_get_contents($link);
$start = strpos($linkcontents, '<span data-reactid = \"42\">');
$end = strpos($linkcontents, '</span>', $start);
$paragraph = substr($linkcontents, $start, $end-$start+10);
$paragraph = html_entity_decode(strip_tags($paragraph));
echo $tickers[$x]," ", $paragraph."<br/>";
}
?>

 </body>
</html>
