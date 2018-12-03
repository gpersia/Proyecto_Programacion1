<?php
  session_start();
  $servername = "localhost";
  $database = "proyecto";
  $username = "root";
  $password = "root";
  $conn = mysqli_connect($servername, $username, $password, $database);

  $id = $_GET['id'];
  $borrar = "DELETE FROM chofer WHERE id=:id";
  $ejec_borrar = $conn -> prepare($borrar);
  $ejec_borrar -> execute();
?>