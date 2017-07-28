<?php
    $xml = new DOMDocument("1.0","UTF-8");
    $xml->formatOutput=true;
    /*create element using createElement()
    append child to parent using appendChild()*/

    $tickers=$xml->createElement("tickers");
    $xml->appendChild($tickers);

    $ticker = $xml->createElement("ticker");
    $ticker->setAttribute("id",1);
    $tickers->appendChild($ticker);

    $name=$xml->createElement("symbol","GME");
    $ticker->appendChild($name);

    $link=$xml->createElement("link","www.google.com");
    $ticker->appendChild($link);

    echo "<xmp>".$xml->saveXML()."</xmp>";

    $xml->save("tickers.xml") or die("Error,Unable to create XML file");
?>
