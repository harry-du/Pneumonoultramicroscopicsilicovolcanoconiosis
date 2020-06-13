<?php
  session_start();
  include('connect.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION['c_id']=$_POST['c_id'];
    $_SESSION['c_class']=$_POST['c_class'];
    $c_id = $_SESSION['c_id'];
    $c_class = $_POST['c_class'];
  }else{
    $c_id = ' ';
    $c_class = ' ';
  }
?>
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
    @import "Layout.css";
  </style>
  <title>詳情</title>
</head>

<body>
  <header align=center>詳情</header><br><br>
  <?php
      $sql6 = " SELECT c_name FROM `course`WHERE course.c_id = '$c_id'";
      $sql8 = " SELECT credit from course where course.c_id = '$c_id' AND class = '$c_class'";
      $result6 = mysqli_query($con,$sql6);
      $result8 = mysqli_query($con,$sql8);
      $row6 = mysqli_fetch_assoc($result6);
      $row8 = mysqli_fetch_assoc($result8);
  ?>

  <div class="container-fluid">
    <div class="p-4" style="background-color: #ffc0cb;">
      <span>開課學期 : 108學年度第2學期<br>
        課程名稱 : <?php echo($row6['c_name'])?><br>
        學分:<?php echo($row8['credit'])?><br>
        授課語言 : 中文<br>
        上課時間/ 地點/ 老師 : (一)03-04 資電403 (二)06 忠206 許懷中
      </span>
    </div>
    <br><br>
    <div class="row justify-content-end" style="margin-right:15%">
      <table class="table-danger table-bordered" width="1000">
        <thead>
          <tr style="background-color:#ffc0cb;">
            <th scope="col"></th>
            <th scope="row">課程代碼</th>
            <th scope="row"><?php echo("$c_id") ?></th>

          </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"></th>
            <td>課程名稱</td>
            <td><?php echo($row6['c_name']) ?></td>

          </tr>
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
            <td>平時成績:40%<br>期中成績:30%<br>期末成績:30%</td>

          </tr>
          
        </tbody>
      </table>
         
      
    </div>
    <br><br>
      <div class = "row justify-content-end" style = "margin-right:15%">
          <form action='add.php' method='post'>
            <input type='hidden' value='$_SESSION[c_id]' name='c_id'> 
            <input type='hidden' value='$_SESSION[c_class]' name='c_class'> 
            <input type='submit' value='加選' class='btn btn-outline-success'> 
           </form>
           &ensp; 
          <form action='NoteIncludeHTML.php' method='post'> 
            <input type='hidden' value='$_SESSION[c_id]' name='c_id'> 
            <input type='submit' value='留言板' class='btn btn-outline-success'> 
          </form>
          &ensp;
          <form action='NoteIncludeHTML.php' method='post'> 
            <input type='submit' value='返回' class='btn btn-outline-success'> 
          </form>
      </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>
