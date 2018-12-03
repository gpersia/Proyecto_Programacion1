<?php
$servername = "localhost";
$database = "proyecto";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$vehiculo = $_POST['FK_vehiculo'];
$transporte = $_POST['FK_transporte'];
 
$sql = "INSERT INTO chofer (nombre, apellido, email, dni, FK_vehiculo, FK_transporte) VALUES ('$nombre', '$apellido', '$email', '$dni', $vehiculo, '$transporte')";
if (mysqli_query($conn, $sql)) {
      echo "Se agrego el chofer a la base de datos";
      "<a href=welcome.php>Volver al panel de administracion</a>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
