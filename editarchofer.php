<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$dni = $_POST['dni'];
	$FK_vehiculo = $_POST['FK_vehiculo'];
	$FK_transporte = $_POST['FK_transporte'];
  
  $sql = "UPDATE chofer SET nombre = :nombre, apellido = :apellido, email = :email, dni = :dni, FK_vehiculo = :vehiculo, FK_transporte = :transporte WHERE id = :id";
  $ejec_sql = $conn-> prepare($sql);

  $registro = array('nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'dni' => $dni, 'FK_vehiculo' => $FK_vehiculo, 'FK_transporte' => $FK_transporte);
  $ejec_sql -> execute($registro);
  
  header('location: administracion_choferes.php');
?>