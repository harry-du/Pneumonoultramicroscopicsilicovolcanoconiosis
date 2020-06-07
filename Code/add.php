<?php
// header("Content-Type: text/html; charset=utf8");
    // if(!isset($_POST["submit"])){
    //     exit("錯誤執行");
    // }//檢測是否有submit操作 
    include('connect.php');
    include('login.php');
    
    $id ="D0606"; //$_POST['id'];
    $c_id = "1274";//$_POST['c_id'];
    $credit =(int) "3";//$_POST['credit'];
    //$passowrd = $_POST['password'];

    $sql1 = " Select  SUM(credit) FROM registration JOIN course WHERE s_id = '$id' AND course.c_id = registration.c_id";//"select s_id,sum(credit) as t_credit from registration group by s_id";
    $sql3 = " Select (c_id, week, time) FROM time JOIN registration WHERE $c_id<> AND week = week AND time = time";
    $sql4 = " Select now_member max_member FROM course WHERE c_id = '$c_id'";
    //$sql5 = " Select max_member FROM course WHERE c_id = '$c_id'";
    //$sql6 = " Select ";
    
    $result1 = mysqli_query($con,$sql1);
    $result3 = mysqli_query($con,$sql3);
    $result4 = mysqli_query($con,$sql4);
    if(!$result4)
	{
		echo ("Error: ".mysqli_error($con));
		exit();
	}
	//
    //$result5 = mysqli_query($con,$sql5);
    //$result5 = mysqli_query($sq6,$con);
    $row1 = mysqli_fetch_assoc($result4);
    $now_member =intval($row1['now_member']);
    $max_member =intval($row1['max_member']);
    $row2 = mysqli_fetch_assoc($result1);
    $SUM_credit = intval($row2['SUM(credit)']);

    echo "<script>alert('$max_member $now_member')</script>";
    
    if ($id!=null){
        if($now_member+1>$max_member){
            echo "<script>alert('人數已滿')</script>";
        }
        else if((int)$credit+(int)mysqli_fetch_row($result1)>=30){
            echo "<script>alert('加選失敗')</script>";
        }
        else {
            echo"<script>alert('加選成功')</script>";
            $sql2 = "INSERT INTO registration(c_id,s_id) VALUES('c_id','s_id')";
            mysqli_query($con,$sql2);
            
            

        }  
    }
    else {
        echo"<script>alert('執行錯誤')</script>";
    }
    
    
    //    $sql =  "SELECT * FROM login WHERE sid ='$id' AND pwd='$passowrd'";
    //    $result = mysqli_query($con,$sql);//執行sql
    // $rows=mysqli_num_rows($result);//返回一個數值
    //if($result->num_rows > 0){//0 false 1 true
    //    header("refresh:0;url=Main.html");
    //    exit;}

    //else{//如果使用者名稱或密碼有空
        echo "表單填寫不完整";
    //}
    
    //確認s_id
    //確認c_id
    //比對課程人數
    //學分加總,比對學分
    //是否衝堂
    //添加課程到registration資料表
?>
