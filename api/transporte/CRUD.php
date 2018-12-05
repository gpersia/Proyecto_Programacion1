<?php

//include_once '../validate_token.php';

if( ($_SERVER['REQUEST_METHOD']==='POST')) {
	include 'create.php';
    	exit;
	}

	if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
    	include 'read.php';
    	exit;
	}
	if($_SERVER['REQUEST_METHOD']==='PUT'){
    	include 'update.php';
    	exit;
	}
	if($_SERVER['REQUEST_METHOD']==='DELETE'){
    	include 'delete.php';
    	exit;
	}
?>