<?php
	include "connection.php";      // Not compalsory....
	session_start();
	
	unset($_SESSION['useremail']);
	
	session_destroy();
	
	$page=$_SERVER['HTTP_REFERER']; 
    header("location:$page"); 

?>