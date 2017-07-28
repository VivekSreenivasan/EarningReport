<?php
    $xml = new DOMDocument("1.0","UTF-8");
    /*create element using createElement()
    append child to parent using appendChild()*/

    $ticker=$xml->createElement("ticker");
    $xml->appendChild($ticker);

?>
