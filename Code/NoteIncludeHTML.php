<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="jquery.js"></script>
    <style type="text/css">
        @import "Layout.css";
    </style>
    <title>詳情</title>
</head>

<body>
    <br><br>
    <header>
        <h1 align=center>留言板</h1>
    </header>
    <div class="container">
        <form action="Notes.php" method="POST" name="Note">
            <input type = "text" name = "notes">
            <input name="submit" type="submit" value="提交" class="btn btn-outline-secondary">
        </form>
    </div>
</body>

</html>
<?php
    include('connect.php');
    $sql2 =  "SELECT `comments` FROM `message`;"; 
    $result = mysqli_query($con,$sql2) or die("Query Error");
    $total_fields=mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    for ($i = 0; $i < $total_fields; $i++) {
        echo"<p>".$row['comments']. "</p>";
    }
?>
