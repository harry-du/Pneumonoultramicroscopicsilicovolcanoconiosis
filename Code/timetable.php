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
        <h1 align=center>我的課表</h1>
    </header>
    <br>
    <br>
    <section class="container">
        <table class="table-danger table-bordered" width="1000">
            <thead>
                <tr align=center>
                    <form action="./timetable.php" method="POST" name="Login">
                        <th>選課代號</th>
                        <th>課程名稱</th>
                        <th>學分數</th>
                        <th>必選修</th>
                        <th>授課教師</th>
                        <th>開課班級</th>
                        <th>星期</th>
                        <th class="123">時間</th>
                        <input type="submit" value="退選">
                    </from>
                </tr>
            </thead>
        </table>
    </section>
</body>
</html>

<?php 
    include('connect.php');
    $sql_query = "DELETE FROM registration WHERE CID = '001';
    mysqli_query($con,$sql_query);
?>