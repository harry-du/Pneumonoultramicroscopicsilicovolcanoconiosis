<?php
    include('connect.php');
    $sqls = "SET FOREIGN_KEY_CHECKS = 0";
    mysqli_query($con, $sqls);
    if(isset($_POST['notes'])){
        $note = $_POST['notes'];
        $star = $_POST['star'];
        if ($note != "" && isset($_POST['star'])){
            $sql =  "INSERT INTO message (`comments`, `datetime`) VALUES('$note', now())";
            //$sql2 = "SELECT AVG(star) FROM messages";
            $result = mysqli_query($con,$sql) or die("<script>alert('一樣的東西只能留一次~~')</script>");
            $sql2 =  "INSERT INTO message (`star`) VALUES('star')";
            $result2 = mysqli_query($con,$sql2);
            echo '<script>alert("留言成功")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }else{
            echo '<script>alert("表單填寫不完整")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }
    }
?>