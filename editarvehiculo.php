<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

  $id = $_POST['id'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$anho_fabricacion = $_POST['anho_fabricacion'];
	$patente = $_POST['patente'];
  
  $sql = "UPDATE vehiculo SET marca = :marca, modelo = :modelo, anho_fabricacion = :anho_fabricacion, patente = :patente WHERE id = :id";
  $ejec_sql = $conn-> prepare($sql);

  $registro = array('id' => $id, 'marca' => $marca, 'modelo' => $modelo, 'anho_fabricacion' => $anho_fabricacion, 'patente' => $patente);
  $ejec_sql -> execute($registro);
  
  header('location: administracion_vehiculos.php');
?>