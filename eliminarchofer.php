<?php
  session_start();
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = mysqli_connect($servidor, $usuario, $clave, $base);

  $dni = $_POST['dni'];

  $registro = array('dni' => $dni);
  $sql = "DELETE FROM chofer WHERE dni = :dni";
  $ejec_sql = $conn -> prepare($sql);
  $ejec_sql -> execute($registro);

  header('location: ver_chofer.php');
 ?>