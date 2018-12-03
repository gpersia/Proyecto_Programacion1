<?php
  session_start();

  /*$cont = file_get_contents("../conexion.php"); 
  echo $cont;*/

  $name = $_POST['nombre'];
  $lastname = $_POST['apellido'];
  $email = $_POST['email'];
  $documento = $_POST['dni'];


  $dbhost = "localhost";   
  $dbuser = "root";     
  $dbpass = "root";       
  $dbname = "proyecto";    


  $conexion = new PDO("mysql: host=$dbhost; dbname=$dbname", $username, $password);

  $sql = 'select * from chofer';
  $ejec_sql = $conexion->prepare($sql);
  $ejec_sql -> execute();

  $registro = array('nombre' => $name, 'apellido' => $lastname, 'email' => $email, 'dni' => $documento);

  $sql = "INSERT INTO chofer (name, lastname, email, dni) VALUES (:name, :lastname, :email, :documento)";
  $ejec_sql = $conexion -> prepare($sql);
  $ejec_sql -> execute($registro);

  /*header('location: Administracion_usuarios.php');
  die();*/
 ?>
