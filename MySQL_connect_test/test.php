<?php
        //盡量別改這個帳號密碼，通用會比較好測試
        //測試連線
        $db_link = mysqli_connect("127.0.0.1", "root-1", "test1234");
        $jugebool = true;
        if(!$db_link) {
                echo "MySQL 伺服器連結失敗<br>";}
        else {
                echo "MySQL 伺服器連結成功<br>"; }
        //測試資料庫抓取
        $dbname = "test";//非資料表名稱
        if( !mysqli_select_db($db_link,$dbname)){
                die("No db");
                //die會輸出一條訊息後關閉腳本
        }else{
                echo("the db is OK<br>");
                mysqli_query($db_link,"SET NAMES 'utf8'");
        }
        //測試資料庫取值成功於否
        $sql = "Select * from Student";
        $result = mysqli_query($db_link,$sql);
        // 取出資料
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        var_dump($row);
        //待續

        //最後處理
        mysqli_free_result ($result);//釋放存放存取資料的記憶體
        mysqli_close($db_link);//關閉連線
?>