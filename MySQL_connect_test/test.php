<?php
        $db_link = mysql_connect("127.0.0.1", "root", "123456");
        if(!$db_link) {
                echo "MySQL 伺服器連結失敗";}
        else {
                echo "MySQL 伺服器連結成"; }
        mysql_close($db_link);
?>