<?php 
  session_start(); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista vehiculos</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="Estilo.css" rel="stylesheet" type="text/css"/>
  </head>
<body id="LoginForm">
  <h2 align="center">Lista Vehiculos</h2>
<?php
  $servername = "localhost";
  $database = "proyecto";
  $username = "root";
  $password = "root";
  $conn = mysqli_connect($servername, $username, $password, $database);
  $buscar = mysqli_query($conn, "SELECT * FROM vehiculo"); 
  if (mysqli_num_rows($buscar) > 0) {
?>  
    <table bgcolor="white" border = "2" width = "100%"> 
    <tr bgcolor="orange"> 
      <th>Marca</th> 
      <th>Modelo</th> 
      <th>Año fabricacion</th>
      <th>Patente</th>  
      <th>Opciones</th>  
    </tr>
    <?php
      while ($datos = mysqli_fetch_array($buscar)){ 
    ?>
      <tr> 
        <td> <?=$datos['marca']?> </td> 
        <td> <?=$datos['modelo']?> </td> 
        <td> <?=$datos['anho_fabricacion']?> </td>
        <td> <?=$datos['patente']?> </td> 
        <td> <form method='POST' action='eliminarvehiculo.php'>
      <input type='hidden' name='patente' value='$datos["patente"]'>
      <input type='submit' value='Eliminar'>
      </form></td>
      </tr> 
    <?php
  }
    mysqli_free_result($buscar); 
  }
    ?>
</table>         
<a href="administracion_vehiculos.php"> <<--Volver al menu</a>
</body>
</html>