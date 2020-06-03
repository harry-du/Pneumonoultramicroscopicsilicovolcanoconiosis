<?php
    if(isset($_POST["submit"])){
        include('connect.php');
        $note = $_POST['notes'];
        if ($note){
            $sql =  "INSERT INTO message (comments) VALUES('$note')";
            $result = mysqli_query($con,$sql);
            if(mysqli_query($con,$sql)){
                echo"<script>alert("留言成功")</script>";
            }
        }else{
            echo 'error';
        }
    }
?>