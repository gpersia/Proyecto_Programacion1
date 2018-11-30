<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){
	include 'create.php';
	exit;
}
if($_SERVER["REQUEST_METHOD"]=='GET'){
	include 'read.php';
	exit;
}
if($_SERVER["REQUEST_METHOD"]=='PUT'){
	include 'update.php';
	exit;
}
if($_SERVER["REQUEST_METHOD"]=='DELETE'){
	include 'delete.php';
	exit;
}
?>