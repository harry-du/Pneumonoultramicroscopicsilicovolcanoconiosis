<?php
    $server = "localhost";
    $db_username = "Super"";
    $db_password = "D0753008";
    $con = mysqli_connect($server,$db_username,$db_password);
    if(!$con){
        die("can't connect".mysql_error());
    }
    mysqli_select_db($con, 'chooselesson');
?>