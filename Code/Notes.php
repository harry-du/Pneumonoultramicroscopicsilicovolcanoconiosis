<?php
    include('connect.php');
    $sqls = "SET FOREIGN_KEY_CHECKS = 0";
    mysqli_query($con, $sqls);
    if(isset($_POST['notes'])){
        $note = $_POST['notes'];
        $star = $_POST['star'];
        if ($note != "" && isset($_POST['star'])){
            $sql =  "INSERT INTO message (`star`, `comments`, `ntime`) VALUES('$star', '$note', now())";
            $result = mysqli_query($con,$sql) or die("<script>alert('一樣的東西只能留一次~~')</script>");
            echo '<script>alert("留言成功")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }else{
            echo '<script>alert("表單填寫不完整")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }
    }
?>