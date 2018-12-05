<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

	$nombre = $_POST['nombre'];
	$pais_procedencia = $_POST['pais_procedencia'];
 
  $sql = "INSERT INTO transporte (nombre, pais_procedencia) VALUES (:nombre, :pais_procedencia)";
  $ejec_sql = $conn -> prepare($sql);
  $registro = array('nombre' => $nombre, 'pais_procedencia' => $pais_procedencia);
  $ejec_sql -> execute($registro);
	header('location: administracion_transporte.php');
  die();
?>
