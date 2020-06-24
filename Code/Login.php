<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('connect.php');
        $id = $_POST['id'];
        $password = $_POST['password'];
        if ($id && $password){
            //原句
            // $sql =  "SELECT s_id FROM student WHERE s_id = '$id' AND s_password = '$password'";
            // $result = mysqli_query($con,$sql);
            
            //防治SQL 參數化查詢Prepare statement
            $stmt = $con->prepare("SELECT s_id FROM student WHERE s_id = ? AND s_password = ?");
            $stmt->bind_param('ss',$id,$password);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows > 0){
                header("refresh:0; url = Main.php");
                $row = $result->fetch_assoc();
                $_SESSION['s_id'] = $row['s_id'];
                exit;
            }else{
                echo '<script>alert("使用者名稱或密碼錯誤")</script>' ;
                header("refresh:0; url = NewLoginWithHTML.php");
            }
        }else{
            echo '<script>alert("表單填寫不完整")</script>';
            header("refresh:0; url = NewLoginWithHTML.php");
        }
    }
   
?>