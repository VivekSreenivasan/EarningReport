<?php
if(isset($_POST['field1'])) {
    $data = $_POST['field1'] . ",";
    $ret = file_put_contents('mydata.txt', $data, FILE_APPEND | LOCK_EX);
}

 //<a href="http://epicrhino.net/testing/earningSearch.php">Click Here for Earnings</a> 
?>



