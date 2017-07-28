<?php
  if(isset($_REQUEST['ok'])){
    $xml = new DOMCDocument("1.0","UTF-8");
    $xml->load("Tickers.xml");

    $rootTag = $xml->getElementsByTagName("tickers")->item(0);

    $dataTag = $xml->createElement("ticker");

    $symbol = $xml->createElement("symbol",$_REQUEST['symbol']);

    $dataTag->appendChild($symbol);

    $rootTag->appendChild($dataTag);

    $xml->save("Tickers.xml");
  }
?>
