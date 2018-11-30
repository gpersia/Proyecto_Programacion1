<?php
	if($_SERVER['REQUEST_METHOD']==='POST'){
    	include 'signup.php';
    	exit;
	}
	if($_SERVER['REQUEST_METHOD']==='GET'){
    	include 'login.php';
    	exit;
	}
?>