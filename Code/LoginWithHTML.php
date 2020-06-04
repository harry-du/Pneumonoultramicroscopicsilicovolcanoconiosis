<!DOCTYPE html>
<html>
    <?php
        session_start();
    ?>

<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type = "text/css">
    @import "Layout.css";
    </style>
</head>

<body>
    <br><br>
    <header>
        <h1 align = center>選課系統</h1>
    </header>
    <br><br>
    <div class = "container">
        <h4>登入</h4>
        <form action = "Login.php" method = "POST" name = "Login">
            <p>帳號: <input type = "text" name = "id"></p>
            <p>密碼: <input type = "password" name = "password"></p>
            <input name = "submit" type = "submit" value = "Login" class = "btn btn-outline-success">
        </form>
    </div>

</body>

</html>