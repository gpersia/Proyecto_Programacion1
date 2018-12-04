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
<table border="2" bgcolor="white" align="center">

<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

  $sql = 'select * from chofer';
               $ejec_sql = $conn -> prepare($sql);
               $ejec_sql -> execute();
              echo "<tr bgcolor='orange'>";
                echo "<td>";
                echo "ID";
                echo "</td>";
                echo "<td>";
                echo "Nombre";
                echo "</td>";
                echo "<td>";
                echo "Apellido";
                echo "</td>";
                echo "<td>";
                echo "Email";
                echo "</td>";
                echo "<td>";
                echo "DNI";
                echo "</td>";
                echo "<td>";
                echo "Vehiculo";
                echo "</td>";
                echo "<td>";
                echo "Transporte";
                echo "</td>";
                echo "<td>";
                echo "Creado";
                echo "</td>";
                echo "<td>";
                echo "Modificado";
                echo "</td>";
                echo "<td>";
                echo "Opciones";
                echo "</td>";
                echo "</tr>";
              while($fila = $ejec_sql -> fetch(PDO::FETCH_ASSOC)){
                 echo "<tr>";
                foreach($fila as $campo){
                  echo "<td>";
                  echo "$campo";
                  echo "</td>";
                }
                 echo "<td>";
                 echo "<a href='eliminarchofer.php?id=".$fila['id']."'>Eliminar</a>";
                 echo "&nbsp;&nbsp;&nbsp;";
                 echo "<a href='editar_chofer.php?id=".$fila['id']."'>Editar</a>";
                 echo "</td>";
                 echo "</tr>";
              }
?>
</table>         
<a href="administracion_choferes.php"> <<--Volver al menu</a>
</body>
</html>