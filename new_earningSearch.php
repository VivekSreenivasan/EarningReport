<?php
  $html = file_get_html('http://www.nasdaq.com/earnings/report/gme');
  foreach($html->find('two_column_main_content_reportdata') as $element)
       echo $element->src . '<br>';
?>
