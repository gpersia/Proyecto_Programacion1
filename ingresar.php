<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Check Login and create session</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap.css">
  </head>
  
  <body>  
  <div class="container">
  
<?php

	include 'conexion.php';	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

	$usuario = $_POST['usuario']; 
	$password = $_POST['password'];
	
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usuario' AND password = '$password'");
	$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id'] = $row['id'];
			
			header("location: welcome.php");
			} else {
			echo "<div class='alert alert-danger' role='alert'>Datos incorrectos.
			<p><a href='index.html'><strong>Atras</strong></a></p></div>";
			
		}
?>
</div>
</body>
</html>