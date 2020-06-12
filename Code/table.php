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
</head>

<body>
</body>

</html>
<?php
    include("connect.php");
    $s_id = $_SESSION['s_id'];
    $sql7 = "SELECT (c_name,week,time) FROM (course INNER JOIN registration ON (course.c_id = registration.c_id) AND (s_id='$s_id')) INNER JOIN `time` ON(course.c_id = `time.c_id`)";
    $result7 = mysqli_query($con,$sql7);
    $num = mysqli_num_rows($result7);

    echo "<div class='container'> <table class=\"table\"> <thead style=\"background-color: #FF8EFF\">";
    echo "<tr><th>&emsp;</th> <th id = 'w1'>星期一</th> <th id = 'w2'>星期二</th> <th id = 'w3'>星期三</th> <th id = 'w4'>星期四</th> <th id = 'w5'>星期五</th> </tr></thead>";
    echo "<tbody align = \"center\"><tr id = 'c1'> <td>一<br>8:10~9:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c2'><td>二<br>9:10~10:00</td> <td id = 'c21'>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c3'><td>三<br>10:10~11:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c4'><td>四<br>11:10~12:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c5'><td>五<br>12:10~13:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c6'><td>六<br>13:10~14:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c7'> <td>七<br>14:10~15:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c8'><td>八<br>15:10~16:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c9'><td>九<br>16:10~17:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr>";
    echo "<tr id = 'c10'><td>十<br>17:10~18:00</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td> <td>&emsp;</td></tr></tbody></table></div>";

?>