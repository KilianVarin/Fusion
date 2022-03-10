<?php
	session_start();
	include 'header.php';
	setcookie('email','',time()-3600);
	setcookie('password','',time()-3600);
	$_SESSION = array();
	session_destroy();
	header("Location: login.php");
?>