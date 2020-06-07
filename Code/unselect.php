<?php
    include('connect.php');
    $sql8 = "DELETE FROM registraion WHERE c_id = '$c'";
    $result8 =mysqli_query($con,$sql8) ;//or die("<script>alert<'執行錯誤'></script>");
    $sql9 = " SELECT  SUM(credit) FROM registration INNER JOIN course WHERE (s_id = 'D0606') AND (course.c_id = registration.c_id)";
    $result9 = mysqli_query($con,$sql9);
    $SUM = $_REQUEST['SUM(credit)']; 
    if($SUM<9) {
        echo '<script>alert<"無法退選"></script>';
        header("refresh:0; url = timetable.php");
    }
    else {
        echo '<script>alert<"退選成功"></script>';
        header("refresh:0; url = timetable.php");
    }
    
?>