<?php
$server="localhost";//主機
$db_username="Super";//你的資料庫使用者名稱
$db_password="D0753008";//你的資料庫密碼
$con = mysqli_connect($server,$db_username,$db_password);//連結資料庫
if(!$con){
die("can't connect".mysql_error());//如果連結失敗輸出錯誤
}
mysqli_select_db($con, 'test');
?>