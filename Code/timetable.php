<?php 
    include('connect.php');
    $sql_query = "DELETE FROM registration WHERE CID = '001'";
    mysqli_query($con,$sql_query);
?>