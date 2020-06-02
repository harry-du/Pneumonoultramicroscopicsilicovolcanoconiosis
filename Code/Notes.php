<?php
    if(!isset($_POST["submit"])){
        include('connect.php');
        $note = $_POST['note'];
        if ($note){
            $sql =  "INSERT INTO message (comments) VALUES('$note')";
            $res = $ma1->insertl($link,$sql);
        }else{
            echo 'error';
        }
    }
?>