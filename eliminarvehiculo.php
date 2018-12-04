<?php
  session_start();
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);
  

  $sql = "DELETE FROM vehiculo WHERE id = ". $_GET["id"];
  $ejec_sql = $conn -> prepare($sql);
  $ejec_sql -> execute();

  header('location: ver_vehiculo.php');
 ?>