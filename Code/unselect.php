<?php
    include('connect.php');
    $sql8 = "DELETE FROM registraion WHERE c_id = '1318'";
    $result8 =mysqli_query($con,$sql8) or die("<script>alert<'執行錯誤'></script>");
    header("refresh:0; url = timetable.php");
    $sql9 = " Select  SUM(credit) FROM registration JOIN course WHERE s_id = '$id' AND course.c_id = registration.c_id";
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