<?php
        $db_link = mysqli_connect("127.0.0.1", "root-1", "test1234");
        if(!$db_link) {
                echo "MySQL 伺服器連結失敗";}
        else {
                echo "MySQL 伺服器連結成"; }
        mysqli_close($db_link);
?>