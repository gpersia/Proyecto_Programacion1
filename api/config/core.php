<?php
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Mendoza');

$key = "key_proyecto";//key unica
$iss = "";//quien lo creo
$aud = "";//para quien se creo
$iat = 1356999524;//hora en que el token se creo
$nbf = 1357000000;//no se acepta el token antes de esta hora
$time=time();//toma la hora
$exp=$time+100;//tiempo en que expira
?>