<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="jquery.js"></script>
    <style type="text/css">
        @import "Layout.css";
    </style>
    <title>詳情</title>
    <script>
        $(document).ready(function(){
            $("#notes").append(loadDoc)
        })
    </script>
</head>

<body>
    <br><br>
    <header>
        <h1 align=center>留言板</h1>
    </header>
    <div class="container">
        <form action="Notes.php" method="POST" name="Note">
            <textarea id="rnote" style="height: 500px; width: 900px; resize: none;"></textarea>
            <input type = "text" name = "notes">
            <input name="submit" type="submit" value="提交" class="btn btn-outline-secondary">
        </form>
    </div>
</body>

</html>
<?php
    // if(isset($_POST["submit"])){
    //     include('connect.php');
    //     $note = $_POST['notes'];
    //     if ($note){
    //         $sql =  "INSERT INTO `message` (`comments`) VALUES(\"$note\")";
    //         $result = mysqli_query($con,$sql);
    //         if(mysqli_query($con,$sql)){
    //             echo"<script>alert('留言成功')</script>";
    //         }
    //     }
    // }
?>