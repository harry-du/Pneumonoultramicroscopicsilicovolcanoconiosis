<?php
    echo $_POST["notes"];
    if(isset($_POST['notes'])){
        include('connect.php');
        $sqls = "SET FOREIGN_KEY_CHECKS = 0";
        mysqli_query($con, $sqls); 
        $note = $_POST['notes'];
        if (isset($note)){
            $sql =  "INSERT INTO `message` (`c_id`, `t_id`, `comments`) VALUES(\"1251\", \"T1428\", \"$note\")";
            $result = mysqli_query($con,$sql) or die("Query Error");
            if(mysqli_query($con,$sql)){
                echo"<script>alert('留言成功')</script>";
            }
        }
    }
?>