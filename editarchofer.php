<?php session_start(); ?>

<?php 
if($_SESSION['id'] = null){
  header('Location: index.html');
}
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

  $id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$dni = $_POST['dni'];
	$FK_vehiculo = $_POST['FK_vehiculo'];
	$FK_transporte = $_POST['FK_transporte'];
  
  $sql = "UPDATE chofer SET nombre = :nombre, apellido = :apellido, email = :email, dni = :dni, FK_vehiculo = :FK_vehiculo, FK_transporte = :FK_transporte WHERE id = :id";
  $ejec_sql = $conn-> prepare($sql);

  $registro = array('id' => $id, 'nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'dni' => $dni, 'FK_vehiculo' => $FK_vehiculo, 'FK_transporte' => $FK_transporte);
  $ejec_sql -> execute($registro);
  
  header('location: administracion_choferes.php');
?>