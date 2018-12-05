<?php session_start(); ?>

<?php 
if($_SESSION['id'] = null){
  header('Location: index.html');
}
?>
<html>
  <head>
        <style>
      .button{
      background-color: #f0ad4e none repeat scroll 0 0;
      border: 1px solid #d4d4d4d;
      border-radius: 4px;
      color: #ffffff;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      -webkit-transition-duration: 0.4s;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 25%;
      height: 50px;
      line-height: 50px;
      padding: 0;
      }
      .button1{
        background-color: #f0ad4e; 
        color: white; 
        border: 2px solid #f0ad4e;
      }
      .button1:hover {
        background-color: #ffffff;
        color: #f0ad4e;
      }
      .buttonHolder{ text-align: center; }
      </style>
    <meta charset="utf-8">
    <title>Lista transporte</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="Estilo.css" rel="stylesheet" type="text/css"/>
  </head>
<body id="LoginForm">
<h2 align="center">Lista Transportes</h2>
<table border="2" bgcolor="white" align="center">

<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);
  $nombre = $_POST['nombre'];
  $registro = array('nombre' => $nombre);
  $sql = "SELECT * FROM  transporte WHERE nombre =:nombre";
               $ejec_sql = $conn -> prepare($sql);
               $ejec_sql -> execute($registro);
              echo "<tr bgcolor='orange'>";
                echo "<td>";
                echo "ID";
                echo "</td>";
                echo "<td>";
                echo "Nombre";
                echo "</td>";
                echo "<td>";
                echo "Pais procedencia";
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
                 echo "<a href='eliminartransporte.php?id=".$fila['id']."'>Eliminar</a>";
                 echo "&nbsp;&nbsp;&nbsp;";
                 echo "<a href='editar_transporte.php?id=".$fila['id']."'>Editar</a>";
                 echo "</td>";
                 echo "</tr>";
              }
?>
</table>         
        <form class="quit" action="administracion_transporte.php" method="POST">
        <div class="buttonHolder">
          <button type="submit" class="button button1 enter ">Volver</button>
        </div>
        </form>
</body>
</html>