<?php
    echo $_POST["notes"];
    if(isset($_POST['notes'])){
        include('connect.php');
        $note = $_POST['notes'];
        if (isset($note)){
            
            $sql =  "INSERT INTO `message` (`comments`) VALUES(\"$note\")";
            $result = mysqli_query($con,$sql) or die("Query Error");
            if(mysqli_query($con,$sql)){
                echo"<script>alert('留言成功')</script>";
            }
        }
    }
?>