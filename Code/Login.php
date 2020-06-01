<?php
    if(!isset($_POST["submit"])){
        include('connect.php');
        $id = $_POST['id'];
        $password = $_POST['password'];
        if ($id && $password){
            $sql =  "SELECT s_password FROM student WHERE s_id = '$id' AND s_password = '$password'";
            $result = mysqli_query($con,$sql);
        if($result->num_rows > 0){
            header("refresh:0; url = Main.html");
            exit;
        }else{
            header("refresh:0; url = Login.html");
            echo '<script>alert("使用者名稱或密碼錯誤")</script>' ;
        }
        }else{
            header("refresh:0; url = Login.html");
            echo '<script>alert("表單填寫不完整")</script>';
        }
    }
   
?>