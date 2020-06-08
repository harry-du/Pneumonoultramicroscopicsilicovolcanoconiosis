<?php
// header("Content-Type: text/html; charset=utf8");
    // if(!isset($_POST["submit"])){
    //     exit("錯誤執行");
    // }//檢測是否有submit操作 
    session_start();
    include('connect.php');
    include('login.php');
    
    
    //$_SESSION['id'] = $_POST['id'];
    $s_id = "D0606";//$_POST['id'];
    $c_id = "1274";//$_POST['c_id'];
    $credit =(int) "3";//$_POST['credit'];
    //$passowrd = $_POST['password'];

    $sql1 = " SELECT  SUM(credit) FROM registration JOIN course WHERE s_id = '$s_id' AND course.c_id = registration.c_id";//"select s_id,sum(credit) as t_credit from registration group by s_id";
    $sql3 = " SELECT (c_id, week, time) FROM time JOIN registration WHERE week = week AND time = time";
    $sql4 = " SELECT now_member, max_member FROM course WHERE c_id = '$c_id'";
    $sql5 = " SELECT course.c_name FROM registration JOIN course WHERE course.c_id = registration.c_id AND registration.s_id = 'D0606'";
    $sql6 = " SELECT c_name FROM `course`WHERE course.c_id = '$c_id'";
    $sql7 = "SELECT * FROM (SELECT week,time FROM time WHERE c_id = '$c_id') a INNER JOIN (SELECT time.week,time.time FROM time JOIN course on time.c_id = course.c_id AND course.s_id = '$s_id') b WHERE a.week = b.week AND a.time = b.time; ";
    
    
    $result1 = mysqli_query($con,$sql1);
    $result3 = mysqli_query($con,$sql3);
    $result4 = mysqli_query($con,$sql4);
    $result5 = mysqli_query($con,$sql5);
    $result6 = mysqli_query($con,$sql6);
    $result7 = mysqli_query($con,$sql7);
    
    if(!$result4)
	{
		echo ("Error: ".mysqli_error($con));
		exit();
	}
	//
    //$result5 = mysqli_query($con,$sql5);
    //$result5 = mysqli_query($sq6,$con);
    $row1 = mysqli_fetch_array($result4);
    $now_member =intval($row1[0]);
    $max_member =intval($row1[1]);
    $row2 = mysqli_fetch_assoc($result1);
    $SUM_credit = intval($row2['SUM(credit)']);
    $num1 = mysqli_num_rows($result5);
    for($i=0;$i<$num1;$i++)
    {
        $array[$i] = mysqli_fetch_array($result5);
    }
    
    if ($s_id!=null){
        if($now_member+1>$max_member){
            echo "<script>alert('人數已滿');window.location.href='details.html';</script>";
        }
        else if($credit+$SUM_credit>30){
            echo "<script>alert('加選失敗');window.location.href='details.html';</script>";
        }
        else if(preg_match($array,$result6)){
            echo "<script>alert('課程失敗');window.location.href='details.html';</script>";
        }
        else if($result7 !=null ){
            echo "<script>alert('衝堂');window.location.href='details.html';</script>";
        }
        else {
            
            echo"<script>alert('加選成功');window.location.href='details.html';</script>";
            $sql2 = "INSERT INTO registration(c_id,s_id) VALUES('c_id','s_id')";
            mysqli_query($con,$sql2);
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
