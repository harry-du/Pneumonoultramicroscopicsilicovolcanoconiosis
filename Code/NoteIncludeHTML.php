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
    <br><br>
    <?php
        include('connect.php');
        $sql4 = "SELECT AVG(star) AS avgs FROM `message`";
        $re = mysqli_query($con,$sql4);
        $results = mysqli_fetch_array($re);
        //print "<p style='font-size:25px; font-family:Microsoft JhengHei' class='container'>評價:";
        //printf ("%.2f", $results['avgs']);
        //print("<span style='font-size:30px;color:rgb(204, 51, 255);font-style:normal;'>★</span></p>");
        printf("<div class='star-ratings-sprite'><span style='width:$results[avgs]' class='star-ratings-sprite-rating'></span></div>")
    ?>
    <div class="container">
        <form action="Notes.php" method="POST" name="Note">
            <input type="text" name="notes">
            <input type="radio" id="1" name="star" value="1">
            <label for="1">1</label>
            <span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>★</span>
            <input type="radio" id="2" name="star" value="2">
            <label for="2">2</label>
            <span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>★</span>
            <input type="radio" id="3" name="star" value="3">
            <label for="3">3</label>
            <span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>★</span>
            <input type="radio" id="4" name="star" value="4">
            <label for="4">4</label>
            <span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>★</span>
            <input type="radio" id="5" name="star" value="5">
            <label for="5">5</label>
            <span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>★</span>
            <input name="submit" type="submit" value="提交" class="btn btn-outline-success">
            <input type ="button" class="btn btn-outline-info dropdown-toggle" onclick="javascript:location.href='details.html'" value="返回"></input>
        </form>
    </div>
</body>

</html>
<?php
    include('connect.php');
    $sql2 =  "SELECT `comments` FROM `message` ORDER BY `datetime` DESC"; 
    $result = mysqli_query($con,$sql2) or die("Query Error");
    $total_fields=mysqli_num_rows($result);
    for ($i = 0; $i < $total_fields; $i++) {
        $row = mysqli_fetch_assoc($result);
        echo"<div><p class='container'>".$row['comments']. "</p></div>";
    }
?>