<?php
if(isset($_POST['symbol'])) {
    $data = $_POST['symbol'] . "\n";
    $ret = file_put_contents('mydata.txt', $data, FILE_APPEND | LOCK_EX);
}
  header('Location:index.php');

?>
