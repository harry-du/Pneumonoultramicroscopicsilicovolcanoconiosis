<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" href="Navabar.css" type="text/css" />
    <!-- <style type="text/css">
        @import "Layout.css";
    </style> -->
    <title>詳情</title>
</head>

<body>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="Main.php">Navabar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <!-- <a class="nav-link" href="Main.php">首頁 <span class="sr-only">(current)</span></a> -->
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action = "Main.php" method = "get">
                <button type = "submit" class="btn btn-info mr-sm-2" >首頁</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action = "timetable.php" method = "post">
                <button type = "submit" class="btn btn-info mr-sm-2" >我的課表</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action = "Logout.php" method = "post">
                <button type= "submit" class="btn btn-info mr-sm-2">Logout</button>
            </form>
        </div>
    </nav>
    <header>
        <h1>留言版</h1>
    </header>
    <br><br>
    <!-- <header>
        <h1 align=center>留言板</h1>
    </header> -->
    <?php
        session_start();
        include('connect.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $s_id = $_SESSION['s_id'];
        } 
        $c_id = $_SESSION['c_id'];
        $sql4 = "SELECT AVG(star) AS avgs FROM `message` WHERE message.c_id = '$c_id'";
        $re = mysqli_query($con,$sql4);
        $results = mysqli_fetch_array($re);
        print "<p style='font-size:25px; font-family:Microsoft JhengHei' class='container'>評價:";
        printf ("%.2f", $results['avgs']);
        print("<span style='font-size:30px;color:rgb(204, 51, 255);font-style:normal;'>★</span></p>");
    ?>
    <div class="container">
        <form action="Notes.php" method="POST" name="Note">
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
            <br><br>
            <textarea placeholder="請輸入留言..." name="notes" style="height: 30vh; width: 100%; padding: 0;"></textarea>
            <br><br>
            <div style="float:right">
            <input name="submit" type="submit" value="提交" class="btn btn-outline-success">
            <input type ="button" class="btn btn-outline-info dropdown-toggle" onclick="javascript:location.href='details.php'" value="返回"></input>
            </div>
            <br><br>
            <?php
                $sql2 =  "SELECT message.c_id, message.comments, message.star, message.ntime FROM `message` WHERE message.c_id = '$c_id' ORDER BY `ntime` DESC"; 
                $result = mysqli_query($con,$sql2) or die("No Data");
                $total_fields=mysqli_num_rows($result);
                for ($i = 0; $i < $total_fields; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    echo"<div style=\'border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;\'><p class='container'>".$row['comments']."<br>"."<span style='font-size:20px;color:rgb(204, 51, 255);font-style:normal;'>".$row['star']."★     </span>".$row['ntime']. "</p></div><br>";

                }
            ?>
            <br><br>
        </form>
    </div>
</body>

</html>