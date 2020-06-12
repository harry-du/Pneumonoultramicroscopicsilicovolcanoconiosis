<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
   
</head>

<body>

<?php
    include("connect.php");
    //$s_id = 'D0606'$_SESSION['s_id'];
    $sql = "SELECT `c_name`,`week`,`time` FROM (`course` INNER JOIN `registration` ON (course.c_id = registration.c_id) AND (s_id='D0606')) INNER JOIN `time` ON(course.c_id = time.c_id)";
    $result = mysqli_query($con,$sql);
    //$array = mysqli_fetch_array($result);
    $total_fields=mysqli_num_rows($result);
    $tdlong = "\"10%\"";
        $course = "<td style=\"height:70px\"</td> ";
        //$S_TDL_E = "<td width=$tdlong>  </td>";
        $list = array(
            0=>array('零'=>"<thead style=\"background-color: #FF8EFF; text-align:center\" width= $tdlong><td >  </td>",'一'=>"<td>星期一</td> ",'二'=>" <td>星期二</td> ",'三'=>"<td>星期三</td>",'四' =>"<td>星期四</td>",'五' =>"<td>星期五</td>",'六' =>"<td>星期六</td>",'七' =>"<td>星期天</td></thead>" ),
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
        $course = intval($array['time']);
        $list[$course][$cweek] = "<td width=\"10%\"><div style=\"text-align:center;\">" . $cname ."</div></td> ";
    }
    print "<div style=\"text-align:center;\"><H3> 已選課表 </H3></div><br> ";
    print " <table style=\"width:80%;\" border=\"1\" align=\"center\">";
        
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