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
</body>

</html>


<?php
        include('connect.php');
        session_start();
        $sql7 = "SELECT * FROM course INNER JOIN registration WHERE (course.c_id = registration.c_id)";
                $result7 = mysqli_query($con,$sql7);
                $num = mysqli_num_rows($result7);
                //$row = mysqli_fetch_assoc($result7); 
                
                echo "<table class = 'table-danger table-bordered' width = '1000'>";
                    echo "<thead>";
                        //開頭
                        echo "<tr align = center>";
                        echo "    <th>選課代號</th>";
                        echo "    <th>課程名稱</th>";
                        echo "    <th>開課班級</th>";
                        echo "    <th>授課教師</th>";
                        echo "    <th>學分數</th>";
                        echo "    <th>必選修</th>";
                        echo "    <th>上課時間</th>";
                        echo "</tr>";

                        for( $i=0; $i<$num ; $i++) {   
                            $row = mysqli_fetch_row($result7); 
                            $c_id = $row[0];
                            $c_name = $row[1];
                            $credit = $row[2];
                            $RorE = $row[3];
                            $t_name = $row[4];
                            $class = $row[5];
                            $time = $row[6];

                            echo "<tr align=center>";
                            echo "<th>$c_id</th>";
                            echo "<th>$c_name</th>";
                            echo "<th>$credit</th>";
                            echo "<th>$RorE</th>";
                            echo "<th>$t_name</th>";
                            echo "<th>$class</th>";

                            echo "    <th>";
                            $sql = "Select * from time WHERE c_id='$c_id'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                echo ($row[1].($row[2]));
                            }
                            echo "</th>";
                            
                            echo "    <th>";
                            echo " <form method='post' action='timetable.php'>";
                            echo "     <input name='submit' type='submit' value='退選'>";
                            echo "     <input type='hidden' value='$c_id'  name='c_id'>";
                            echo " </form>";
                            echo "</th>";

                            echo "</tr>";
                        }
                    echo "<thead>";
                echo "</table>";


                if(isset($_POST['submit'])) {     
                    $id = $_POST['c_id'];              
                    $sql9 = " SELECT  SUM(credit) FROM registration INNER JOIN course WHERE (s_id = 'D0316') AND (course.c_id = registration.c_id)";
                    $result9 = mysqli_query($con,$sql9);
                    $row2 = mysqli_fetch_assoc($result9);
                    $SUM_credit = intval($row2['SUM(credit)']);

                    if($credit+$SUM_credit<=9) {
                        echo '<script>alert("無法退選")</script>';
                        header("refresh:0; url = timetable.php");
                    }
                    else {
                        echo "<script>alert('$id')</script>";
                        $sql8 = "DELETE FROM registration WHERE c_id = '$id'";
                        $result8 = mysqli_query($con,$sql8) or die("<script>alert('執行錯誤')</script>");
                        echo '<script>alert("退選成功")</script>';
                        header("refresh:0; url = timetable.php");
                    }
                }

                
?>