<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <style type="text/css">
      @import "Layout.css";</style>
    <title>詳情</title>
</head>
<body>
    <header align=center>詳情</header><br><br>

    <div class="container-fluid">
        <div class = "p-4" style ="background-color: #ffc0cb;">
            <span>開課學期 : 108學年度第2學期<br>
              課程名稱(班級) : 資料庫系統(資訊二甲)<br>
              學分:3<br>
              授課語言 : 中文<br>
              上課時間/ 地點/ 老師 : (一)03-04 資電403 (二)06 忠206 許懷中
              </span>
        </div> 
        <br><br>   
        <div class="row justify-content-end" style="margin-right:15%">
          <table class="table-danger table-bordered" width="1000">
              <thead>
                <tr style="background-color:#ffc0cb;">
                  <th scope="col" ></th>
                  <th scope="row" >課程代碼:</th>
                  <th scope="row" >課程名稱:資料庫系統</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="col"></th>
                  <td>課程描述</td>
                  <td>瞭解資料庫的基本原理和結構。課程內容包括資料庫系統概念和架構，<br>實體關係模型，檔案與索引結構，關連式模型，SQL，從ER轉換成關連式綱目，以及正規化。</td>
                  
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td>前置課程</td>
                  <td>計算機概論實習(一)、計算機概論實習(二)、資料結構</td>
                  
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td>評量方式</td>
                  <td>平時成績:<br>期中成績:<br>期末成績:</td>
                  
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td>教科書</td>
                  <td></td>
                  
                </tr>
              </tbody>
            </table>
            <form action="details.php" method="post" name="add">
              <input type="submit" value="加選" class="btn btn-outline-success">
          </form>  
          </div>
          
    </div>
        
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<?php
    // header("Content-Type: text/html; charset=utf8");
    // if(!isset($_POST["submit"])){
    //     exit("錯誤執行");
    // }//檢測是否有submit操作 
    include('connect.php');//連結資料庫
    include('timetable.html');
    $id = $_POST['id'];//post獲得使用者名稱錶單值
    $passowrd = $_POST['password'];//post獲得使用者密碼單值
    $course;
    password_hash($passowrd, PASSWORD_DEFAULT);
    
    if ($id>=30){//如果使用者名稱和密碼都不為空
        echo "<script>alert('加選失敗')</script>";
        
    }
    else {
        echo"<script>alert('加選成功')</script>";
        $('.qwe').append
    }
    //    $sql =  "SELECT * FROM login WHERE sid ='$id' AND pwd='$passowrd'";
    //    $result = mysqli_query($con,$sql);//執行sql
    // $rows=mysqli_num_rows($result);//返回一個數值
    if($result->num_rows > 0){//0 false 1 true
        header("refresh:0;url=Main.html");
        exit;
    }else{
        echo "使用者名稱或密碼錯誤";
    }

    }else{//如果使用者名稱或密碼有空
        echo "表單填寫不完整";
    }
?>