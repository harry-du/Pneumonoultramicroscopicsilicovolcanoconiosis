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
        $sql7 = "SELECT * FROM course INNER JOIN registration WHERE (course.c_id = registration.c_id)";
                $result7 = mysqli_query($con,$sql7);
                $num = mysqli_num_rows($result7);
                $row = mysqli_fetch_assoc($result7); 
                $c_id = [];
                $c_name = [];
                $credit = [];
                $RorE = [];
                $class = [];
                for($j=0;$j<$num;$j++){
                    array_push($c_id,$row['c_id']);
                    array_push($c_name,$row['c_name']);
                    array_push($credit,$row['credit']);
                    array_push($RorE,$row['RorE']);
                    array_push($class,$row['class']);
                }

                //tid轉tname
                $t_name = [];                        
                $sql = "SELECT * FROM teacher INNER JOIN course WHERE (teacher.t_id = course.t_id) ";
                $result = mysqli_query($con,$sql);
                $num1 = mysqli_num_rows($result);
                $row4 = mysqli_fetch_assoc($result);
                for($k=0;$k<$num;$k++){
                   array_push($t_name,$row4['t_name']);
                }
                

                echo "<table class = 'table-danger table-bordered' width = '1000'>";
                    echo "<thead>";
                     //開頭
                    echo "<tr align = center>";
                    echo "    <th>選課代號</th>";
                    echo "    <th>課程名稱</th>";
                    echo "    <th>學分數</th>";
                    echo "    <th>必選修</th>";
                    echo "    <th>授課教師</th>";
                    echo "    <th>開課班級</th>";
                    echo "    <th>上課時間</th>";
                    echo "</tr>";

                for( $i=0; $i<$num ; $i++) {                                       
                    echo "<tr align = center>";
                        echo "    <th>$c_id[$i]</th>";
                        echo "    <th>$c_name[$i]</th>";
                        echo "    <th>$credit[$i]</th>";                                    
                        echo "    <th>$RorE[$i]</th>";
                        
                        echo "    <th>$t_name[$i]</th>";


                        echo "    <th>$class[$i]</th>";

                        //ctime
                        echo "    <th>";
                            $sql = "Select * from time WHERE c_id='$c_id[$i]'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                echo ($row[1].($row[2]));
                            }
                        echo "</th>";

                        //c詳情
                        echo "    <th>";
                        echo " <form method='post' action='unselect.php'>";
                        echo "     <input type='hidden' name='$c_id[$i]'>";
                        echo "     <input name='submit' type='submit' value='退選'>";
                        echo " </form>";
                        echo "</th>";
                        //表單結束
                        echo "</tr>";
                }
                echo "</thead>";

            echo "</table>";
?>