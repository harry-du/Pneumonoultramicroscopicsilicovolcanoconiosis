<?php
  session_start();
  include('connect.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION['c_id']=$_POST['c_id'];
    $_SESSION['c_class']=$_POST['c_class'];
    $c_id = $_SESSION['c_id'];
    $c_class = $_SESSION['c_class'];
  }else{
    $c_id = $_SESSION['c_id'];
    $c_class = $_SESSION['c_class'];
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
  <link rel="stylesheet" href="Navabar.css" type="text/css" />
  <!-- <style type="text/css">
    @import "Layout.css";
  </style> -->
  <title>詳情</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="">Navabar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="Main.php">首頁 <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action = "timetable.php" method = "post">
                <button type = "submit" class="btn btn-info mr-sm-2" >我的課表</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action = "NewLoginWithHTML.php" method = "post">
                <button type= "submit" class="btn btn-info mr-sm-2">Logout</button>
            </form>
        </div>
    </nav>
    <header>
        <h1>詳情</h1>
    </header>
  <!-- <header align=center>詳情</header><br><br>   -->
  <?php
      $sql6 = " SELECT DISTINCT c_name FROM `course`WHERE course.c_id = '$c_id'";
      $sql8 = " SELECT credit from course where course.c_id = '$c_id' AND class = '$c_class'";
      $sql1 = " SELECT class_time,grade,propesition,description FROM `details`WHERE details.c_id = '$c_id'";
      $sql2 = " SELECT class_time,grade,propesition,description FROM `details`WHERE details.c_id = '2136'";
      $result6 = mysqli_query($con,$sql6);
      $result8 = mysqli_query($con,$sql8);
      $result1 = mysqli_query($con,$sql1);
      $result2 = mysqli_query($con,$sql2);
      $row6 = mysqli_fetch_assoc($result6);
      $row8 = mysqli_fetch_assoc($result8);
      $row1 = mysqli_fetch_assoc($result1);
      $row2 = mysqli_fetch_assoc($result2);
  ?>

  <div class="container-fluid">
    <div class="alert alert-dismissible alert-primary" style="background-color: #ffc0cb;">
      <span>開課學期 : 108學年度第2學期<br>
        課程名稱 : <?php echo($row6['c_name'])?><br>
        學分:<?php echo($row8['credit'])?><br>
        授課語言 : 中文<br>
        上課時間/ 地點/ 老師 : <?php if($row1!=NULL){echo($row1['class_time']);}else{echo($row2['class_time']);}?>
      </span>
    </div>
    <br><br>
    <div class="row justify-content-end" style="margin-right:15%">
      <table class="table-danger table-bordered" width="1000" >
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
            <td><?php if($row1!=NULL){echo($row1['description']);}else{echo($row2['description']);}?>

          </tr>
          <tr>
            <th scope="row"></th>
            <td>前置課程</td>
            <td><?php if($row1!=NULL){echo($row1['propesition']);}else{echo($row2['propesition']);}?></td>

          </tr>
          <tr>
            <th scope="row"></th>
            <td>評量方式</td>
            <td><?php if($row1!=NULL){echo($row1['grade']);}else{echo($row2['grade']);}?></td>

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
          
            <input type ="button" class="btn btn-outline-info dropdown-toggle" onclick="javascript:location.href='Main.php'" value="返回"></input>

      </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>
