<?php
    session_start();
    include('connect.php');
    $sqls = "SET FOREIGN_KEY_CHECKS = 0";
    mysqli_query($con, $sqls);
    if(isset($_POST['notes'])){
        $s_id = $_SESSION['s_id'];
        $cid = $_SESSION['c_id'];
        $note = $_POST['notes'];
        $star = (int)$_POST['star'];
        if ($note != "" && isset($_POST['star'])){
            $sql =  "INSERT INTO `message`(`s_id`, `c_id`, `star`, `comments`, `ntime`) VALUES ('$s_id','$cid','$star','$note',now())";
            $result = mysqli_query($con,$sql);
            if($result != NULL){
                echo '<script>alert("留言成功")</script>';
                header("refresh:0; url = NoteIncludeHTML.php");
            }else{
                echo "沒增加成功";
            }
        }else{
            echo '<script>alert("表單填寫不完整")</script>';
            header("refresh:0; url = NoteIncludeHTML.php");
        }
    }
?>