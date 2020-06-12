<!DOCTYPE html>
<?php
    session_start();
?>
<html>

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        if($row[1] == "一"){
            $("#w1" && "#$course").append($cname);
        }else if($row[1] == "二"){
            $("#w2" && "#$course").append($cname);
        }else if($row[1] == "三"){
            $("#w3" && "#$course").append($cname);
        }else if($row[1] == "四"){
            $("#w4" && "#$course").append($cname);
        }else if($row[1] == "五"){
            $("#w5" && "#$course").append($cname);
        }
    </script>
</head>

<body>
</body>

</html>
<?php
    include("connect.php");
    $s_id = $_SESSION['s_id'];
    $sql = "SELECT (c_name,week,time) FROM (course INNER JOIN registration ON (course.c_id = registration.c_id) AND (s_id='$s_id')) INNER JOIN `time` ON(course.c_id = `time.c_id`)";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $cname = $row[0];
    $course = intval($row[2]);
    echo "<div class='container'> <table class=\"table\"> <thead style=\"background-color: #FF8EFF\">";
    echo "<tr><th>&emsp;</th> <th id = 'w1'>星期一</th> <th id = 'w2'>星期二</th> <th id = 'w3'>星期三</th> <th id = 'w4'>星期四</th> <th id = 'w5'>星期五</th> </tr></thead>";
    echo "<tbody align = \"center\"><tr id = '1'> <td>一<br>8:10~9:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '2'><td>二<br>9:10~10:00</td> <td id = 'c21'>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '3'><td>三<br>10:10~11:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '4'><td>四<br>11:10~12:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '5'><td>五<br>12:10~13:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '6'><td>六<br>13:10~14:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '7'> <td>七<br>14:10~15:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '8'><td>八<br>15:10~16:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '9'><td>九<br>16:10~17:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = '10'><td>十<br>17:10~18:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr></tbody></table></div>";

?>