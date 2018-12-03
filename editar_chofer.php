<?php 
  session_start(); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista choferes</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="Estilo.css" rel="stylesheet" type="text/css"/>
  </head>
<body id="LoginForm">
  <h2 align="center">Lista Choferes</h2>
<?php
  $servername = "localhost";
  $database = "proyecto";
  $username = "root";
  $password = "root";
  $conn = mysqli_connect($servername, $username, $password, $database);
  $buscar = mysqli_query($conn, "SELECT * FROM chofer"); 
  if (mysqli_num_rows($buscar) > 0) {
?>  
    <table bgcolor="white" border = "2" width = "100%"> 
    <tr bgcolor="orange"> 
      <th>ID</th> 
      <th>Nombre</th> 
      <th>Apellido</th>
      <th>DNI</th> 
      <th>Email</th>
      <th>Vehiculo</th> 
      <th>Transporte</th> 
      <th>Opciones</th>  
    </tr> 
    <?php 
      while ($datos = mysqli_fetch_array($buscar)){ 
    ?> 
      <tr> 
        <td> <?=$datos["id"]?> </td> 
        <td> <?=$datos["nombre"]?> </td> 
        <td> <?=$datos["apellido"]?> </td>
        <td> <?=$datos["dni"]?> </td> 
        <td> <?=$datos["email"]?> </td>
        <td> <?=$datos["FK_vehiculo"]?> </td>
        <td> <?=$datos["FK_transporte"]?> </td>
        <td> <a href="eliminarchofer.php?id=$datos['id']">Eliminar</a><a href="editarchofer.php?id=$datos['id']">Editar</a></td>
      </tr> 
    <?php 
      } 
      mysqli_free_result($buscar); 
  }
    ?> 
  </table>      
<a href="administracion_choferes.php">Volver al menu</a>
</body>
</html>