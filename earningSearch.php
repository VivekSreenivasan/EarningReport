<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 	
<?php

$tickerlist = file('mydata.txt');
$tickers=explode(",",$tickerlist[0]);


for ($x = 0; $x < count($tickers) ; $x++) {


$start = substr($tickers[$x],0,1);
$link = "https://biz.yahoo.com/research/earncal/".$start."/".chop($tickers[$x]).".html";


$linkcontents = file_get_contents($link);
$start = strpos($linkcontents, '<b>');
$end = strpos($linkcontents, '</b>', $start);
$paragraph = substr($linkcontents, $start, $end-$start+10);
$paragraph = html_entity_decode(strip_tags($paragraph));
echo $tickers[$x]," ", $paragraph."<br/>"; 
}
?>

 </body>
</html>