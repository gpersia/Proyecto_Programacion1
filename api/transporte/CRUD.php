<?php
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$start = $time;

	include_once '../validate_token.php';

	if( ($_SERVER['REQUEST_METHOD']==='POST')) {
		include 'create.php';
		$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$nuevo=parse_url($url);
		$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    	exit;
	}

	if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
		include 'read.php';
		$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$nuevo=parse_url($url);
		$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    	exit;
	}
	if($_SERVER['REQUEST_METHOD']==='PUT'){
		include 'update.php';
		$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$nuevo=parse_url($url);
		$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    	exit;
	}
	if($_SERVER['REQUEST_METHOD']==='DELETE'){
		include 'delete.php';
		$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$nuevo=parse_url($url);
		$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    	exit;
	}
	
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$finish = $time;
	$total_time = round(($finish - $start), 4);

	include '../auditoria/create.php';
?>