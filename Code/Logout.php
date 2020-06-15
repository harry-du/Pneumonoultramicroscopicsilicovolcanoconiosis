<?php
	session_start();
	// $_SESSION = array();
	// setcookie(session_name(),'',time() - 2592000,'/');
    // session_destroy();
    unset($_SESSION['s_id']);
	header("refresh:0;url=NewLoginWithHTML.php");
?>