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

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$anho_fabricacion = $_POST['anho_fabricacion'];
	$patente = $_POST['patente'];
 

  	$sql = "INSERT INTO vehiculo (marca, modelo, anho_fabricacion, patente) VALUES (:marca, :modelo, :anho_fabricacion, :patente)";
  	$ejec_sql = $conn -> prepare($sql);
  	$registro = array('marca' => $marca, 'modelo' => $modelo, 'anho_fabricacion' => $anho_fabricacion, 'patente' => $patente);
  	$ejec_sql -> execute($registro);
	header('location: administracion_vehiculos.php');
  	die();
?>