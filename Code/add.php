<?php
    include('connect.php');
    // include('login.php');
    session_start();
        $s_id = $_SESSION['s_id'];
        $c_id = $_POST['c_id'];
        $c_class = $_POST['c_class'];

    

    $sql1 = " SELECT SUM(credit) FROM registration JOIN course WHERE s_id = '$s_id' AND course.c_id = registration.c_id AND course.class = registration.class";
    $sql4 = " SELECT now_member, max_member FROM course WHERE c_id = '$c_id'";
    $sql5 = " SELECT course.c_name FROM registration JOIN course WHERE course.c_id = registration.c_id AND registration.s_id = '$s_id'";
    $sql6 = " SELECT c_name FROM `course`WHERE course.c_id = '$c_id'";
    $sql7 = " SELECT * FROM (SELECT week,time FROM time WHERE c_id = '$c_id') a INNER JOIN (SELECT time.week,time.time FROM time JOIN registration on time.c_id = registration.c_id WHERE registration.s_id = '$s_id') b WHERE a.week = b.week AND a.time = b.time";
    $sql9 = " SELECT c_name FROM course JOIN (SELECT * From registration WHERE registration.s_id='$s_id') a ON course.c_id = a.c_id WHERE c_name IN (SELECT c_name FROM course WHERE c_id = '$c_id');";
    $sql8 = " SELECT credit from course where course.c_id = '$c_id' AND class = '$c_class'";
    
    $result1 = mysqli_query($con,$sql1);
    $result4 = mysqli_query($con,$sql4);
    $result5 = mysqli_query($con,$sql5);
    $result6 = mysqli_query($con,$sql6);
    $result7 = mysqli_query($con,$sql7);
    $result8 = mysqli_query($con,$sql8);
    $result9 = mysqli_query($con,$sql9);
    
    if(!$result4)
	{
		echo ("Error: ".mysqli_error($con));
		exit();
	}
	
    $row4 = mysqli_fetch_array($result4);
    $now_member =intval($row4[0]);
    $max_member =intval($row4[1]);
    $row1 = mysqli_fetch_assoc($result1);
    $SUM_credit = $row2['SUM(credit)'];
    $num5 = mysqli_num_rows($result5);
    $row8 = mysqli_fetch_assoc($result8);
    $credit = $row3['credit'];
    $row6 = mysqli_fetch_assoc($result6);
    $row7 = mysqli_fetch_all($result7);
    $row9 = mysqli_fetch_all($result9);

    if ($s_id!=null){
        if($now_member+1>$max_member){
            // echo "<script>alert('人數已滿');window.location.href='details.php';</script>";
        }
        else if($credit+$SUM_credit>30){
            // echo "<script>alert('學分已滿');window.location.href='details.php';</script>";
        }
        else if($row9!=null){
            // echo "<script>alert('課程同名');window.location.href='details.php';</script>";
        }
        else if($row7!=null){
            // echo "<script>alert('衝堂');window.location.href='details.php';</script>";
        }
        else {
            $sql2 = "INSERT INTO registration(c_id,s_id,class) VALUES('$c_id','$s_id','$c_class')";
            mysqli_query($con,$sql2);
            $sql8 = "UPDATE course SET now_member=now_member+1 WHERE c_id = '$c_id'";
            mysqli_query($con,$sql8);
            echo"<script>alert('加選成功');window.location.href='Main.php';</script>";
        }  
    }
    else {
        echo"<script>alert('執行錯誤')</script>";
    }
    
    
   
        
    
    
    //確認s_id
    //確認c_id
    //比對課程人數
    //學分加總,比對學分
    //是否衝堂
    //添加課程到registration資料表
?>
