<?php
$servername = "localhost";
$database = "proyecto";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Fallo la conexión: " . mysqli_connect_error());
}
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anho_fabricacion = $_POST['anho_fabricacion'];
$patente = $_POST['patente'];
 
$sql = "INSERT INTO vehiculo (marca, modelo, anho_fabricacion, patente) VALUES ('$marca', '$modelo', '$anho_fabricacion', '$patente')";
if (mysqli_query($conn, $sql)) {
      echo "Se agrego el vehiculo a la base de datos \n \n";
      echo "<a href=welcome.php>Volver al panel de administracion</a>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>