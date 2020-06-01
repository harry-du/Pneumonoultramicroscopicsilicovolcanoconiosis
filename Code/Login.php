<?php
    include('connect.php');
    $id = $_POST['id'];
    $password = $_POST['password'];
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    if ($id && $passhash){
        $sql =  "SELECT * FROM login WHERE sid = '$id' AND pwd = '$passhash'";
        $result = mysqli_query($con,$sql);
        if($result->num_rows > 0){
            header("refresh:0;url=Main.html");
            exit;
        }else{
            echo "使用者名稱或密碼錯誤";
        }
    }else{
        echo "表單填寫不完整";
    }
?>