<?php
    session_start();
    //要用s_id請打$_SESSION['s_id']
?>
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
<?php
    include("connect.php");
    $sid = $_SESSION['s_id'];
    $sql = "SELECT `c_name`,`week`,`time` FROM (`course` INNER JOIN `registration` ON (course.c_id = registration.c_id) AND (s_id='$sid')) INNER JOIN `time` ON(course.c_id = time.c_id)";
    $result = mysqli_query($con,$sql);
    //$array = mysqli_fetch_array($result);
    $total_fields=mysqli_num_rows($result);
    $tdlong = "\"10%\"";
        $course = "<td style=\"height:70px\"</td> ";
        //$S_TDL_E = "<td width=$tdlong>  </td>";
        $list = array(
            0=>array('零'=>"<td><div style=\"text-align:center;\"> </div>  </td>",'一'=>"<td width=\"10%\"><div style=\"text-align:center;\">星期一</td> ",'二'=>" <td width=\"10%\"><div style=\"text-align:center;\">星期二</td> ",'三'=>"<td width=\"10%\"><div style=\"text-align:center;\">星期三</td>",'四' =>"<td width=\"10%\"><div style=\"text-align:center;\">星期四</td>",'五' =>"<td width=\"10%\"><div style=\"text-align:center;\">星期五</td>",'六' =>"<td width=\"10%\"><div style=\"text-align:center;\">星期六</td>",'七' =>"<td width=\"10%\"><div style=\"text-align:center;\">星期天</td></thead>" ),
            1=>array('零' => "<td><div style=\"text-align:center;\">8:00 - 9:00</div></td>",'一'=>"<td width=$tdlong >  </td>",'二'=>"<td width=$tdlong >  </td>",'三'=>"<td width=$tdlong >  </td>",'四' =>"<td width=$tdlong >  </td>",'五' =>"<td width=$tdlong>  </td>",'六' =>"<td width=$tdlong >  </td>",'七' => "<td width=$tdlong >  </td>"),
            2=>array('零' => "<td><div style=\"text-align:center;\">9:00 - 10:00</div></td>",'一' => $course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            3=>array('零' => "<td><div style=\"text-align:center;\">10:00 - 11:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            4=>array('零' => "<td><div style=\"text-align:center;\">11:00 - 12:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            5=>array('零' => "<td><div style=\"text-align:center;\">12:00 - 13:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            6=>array('零' => "<td><div style=\"text-align:center;\">13:00 - 14:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            7=>array('零' => "<td><div style=\"text-align:center;\">14:00 - 15:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            8=>array('零' => "<td><div style=\"text-align:center;\">15:00 - 16:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            9=>array('零' => "<td><div style=\"text-align:center;\">16:00 - 17:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            10=>array('零' => "<td><div style=\"text-align:center;\">17:00 - 18:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            11=>array('零' => "<td><div style=\"text-align:center;\">18:00 - 19:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            12=>array('零' => "<td><div style=\"text-align:center;\">19:00 - 20:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            13=>array('零' => "<td><div style=\"text-align:center;\">20:00 - 21:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course),
            14=>array('零' => "<td><div style=\"text-align:center;\">21:00 - 22:00</div></td>",'一'=>$course,'二'=>$course,'三'=>$course,'四' =>$course,'五' =>$course,'六' =>$course,'七' => $course)
    );
    for ($i = 0; $i < $total_fields; $i++) {
        $array = mysqli_fetch_array($result);
        $cname = $array['c_name'];
        $cweek = $array['week'];
        $course1 = intval($array['time']);
        $list[$course1][$cweek] = "<td width=\"100px\"><div style=\"text-align:center;\">" . $cname ."</div></td> ";
    }
    print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
    print " <table style=\"background-color: #F5C6CB; \"width:100px;\" border=\"1\" align=\"center\">";
    
        
    foreach ($list as $row) {
        print "<tr style=\"height:70px\">";
        foreach ($row as $key => $value){
            print $value ;
        }
        print "</tr>";
    }
    print "</table><br>";
?>
</body>

</html>


<?php
        include('connect.php');
        $s_id = $_SESSION['s_id'];
        $sql7 = "SELECT course.c_id, course.c_name, course.class, course.t_id, course.credit, course.RorE FROM registration INNER JOIN course ON (course.c_id = registration.c_id) AND (course.class = registration.class) WHERE registration.s_id = '$s_id'";
                $result7 = mysqli_query($con,$sql7);
                $num = mysqli_num_rows($result7);
                echo "<table class = 'table-danger' align='center' width = '1000'>";
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
                            $class = $row[2];
                            $t_id = $row[3];
                            $credit = $row[4];
                            $RorE = $row[5];
                            //$time = $row[6];
                            

                            echo "<tr align=center>";
                            echo "<th>$c_id</th>";
                            echo "<th>$c_name</th>";
                            echo "<th>$class</th>";

                            $sql1 = "SELECT t_name FROM teacher WHERE t_id ='$t_id'";
                            $result1 = mysqli_query($con,$sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $t_name = $row1['t_name'];

                            echo "<th>$t_name</th>";
                            echo "<th>$credit</th>";


                            echo "<th>$RorE</th>";

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
                    $sql9 = " SELECT  SUM(credit) FROM registration INNER JOIN course WHERE (s_id = '$s_id') AND (course.c_id = registration.c_id)";
                    $result9 = mysqli_query($con,$sql9);
                    $row2 = mysqli_fetch_assoc($result9);
                    $SUM_credit = intval($row2['SUM(credit)']);
                    $sql5 = " SELECT credit FROM course WHERE c_id='$id'";
                    $result5 = mysqli_query($con,$sql5);
                    $row5 = mysqli_fetch_assoc($result5);
                    $c = $row5['credit'];
                    $sql3 = " SELECT RorE FROM course WHERE c_id ='$id'";
                    $result3 = mysqli_query($con,$sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    $R = $row3['RorE'];
                    
                    if($SUM_credit-$c<9) {
                        echo '<script>alert("無法退選")</script>';
                        //header("refresh:0; url = timetable.php");
                    }
                    else {
                        $sql8 = "DELETE FROM registration WHERE c_id = '$id'";
                        $result8 = mysqli_query($con,$sql8) or die("<script>alert('執行錯誤')</script>");
                        if($R == 'M') {
                            echo '<script>alert("這是必修")</script>';
                        }
                        echo '<script>alert("退選成功")</script>';
                        $sql4 = "UPDATE course SET now_member=now_member-1 WHERE c_id = '$id'";
                        mysqli_query($con,$sql4);
                        //header("refresh:0; url = timetable.php");
                    }
                    
                }   
?>