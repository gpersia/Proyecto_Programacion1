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
	$vehiculo = $_POST['FK_vehiculo'];
	$transporte = $_POST['FK_transporte'];
 
  $sql = "INSERT INTO chofer (nombre, apellido, email, dni, FK_vehiculo, FK_transporte) VALUES (:nombre, :apellido, :email, :dni, :FK_vehiculo, :FK_transporte)";
  $ejec_sql = $conn -> prepare($sql);
  $registro = array('nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'dni' => $dni, 'FK_vehiculo' => $vehiculo, 'FK_transporte' => $transporte);
  $ejec_sql -> execute($registro);
	header('location: administracion_choferes.php');
  die();
?>
