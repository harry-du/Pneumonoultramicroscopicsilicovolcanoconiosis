<?php
    if(isset($_POST['notes'])){
        include('connect.php');
        $sqls = "SET FOREIGN_KEY_CHECKS = 0";
        mysqli_query($con, $sqls); 
        $note = $_POST['notes'];
        if ($note != ""){
            $sql1 =  "INSERT INTO message (`comments`) VALUES('$note')";
            $result2 = mysqli_query($con,$sql1) or die("Query Error");
            echo '<script>alert("留言成功")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }else{
            echo '<script>alert("表單填寫不完整")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }
    }
?>