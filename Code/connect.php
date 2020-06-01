<?php
$server = "localhost";
$db_username = "root-1";
$db_password = "test1234";
$con = mysqli_connect($server,$db_username,$db_password);
if(!$con){
    die("can't connect".mysql_error());
}
mysqli_select_db($con, 'test');
?>