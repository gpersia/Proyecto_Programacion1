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
	$pais_procedencia = $_POST['pais_procedencia'];
  
  $sql = "UPDATE transporte SET nombre = :nombre, pais_procedencia = :pais_procedencia WHERE id = :id";
  $ejec_sql = $conn-> prepare($sql);

  $registro = array('id' => $id, 'nombre' => $nombre, 'pais_procedencia' => $pais_procedencia);
  $ejec_sql -> execute($registro);
  
  header('location: administracion_transporte.php');
?>