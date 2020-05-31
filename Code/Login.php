<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    @import "Layout.css";
    </style>
</head>

<body>
    <br><br>
    <header>
        <h1 align=center>選課系統</h1>
    </header>
    <br><br>
    <div class="container">
        <h4>登入</h4>
        <form action="./Login.php" method="POST" name="Login">
            <p>帳號: <input type="text" name="id"></p>
            <p>密碼: <input type="password" name="password"></p>
            <input name="submit" type="submit" value="Login" class="btn btn-outline-success">
        </form>
    </div>

</body>

</html>
<?php
    // header("Content-Type: text/html; charset=utf8");
    // if(!isset($_POST["submit"])){
    //     exit("錯誤執行");
    // }//檢測是否有submit操作 
    include('connect.php');//連結資料庫
    $id = $_POST['id'];//post獲得使用者名稱錶單值
    $password = $_POST['password'];//post獲得使用者密碼單值
    if ($id && $password){//如果使用者名稱和密碼都不為空
        $sql =  "SELECT * FROM login WHERE sid ='$id' AND pwd='$password'";
        $result = mysqli_query($con,$sql);//執行sql
    // $rows=mysqli_num_rows($result);//返回一個數值
    if($result->num_rows > 0){//0 false 1 true
        header("refresh:0;url=Main.html");
        exit;
    }else{
        echo "使用者名稱或密碼錯誤";
    }

    }else{//如果使用者名稱或密碼有空
        echo "表單填寫不完整";
    }
?>