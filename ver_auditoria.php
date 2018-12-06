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
      width: 50%;
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
    <title>Lista auditoria</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="Estilo.css" rel="stylesheet" type="text/css"/>
  </head>
<body id="LoginForm">
<h2 align="center">Auditoria</h2>
<table border="2" bgcolor="white" align="center">

<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $clave = 'root';
  $base = 'proyecto';
  $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

  $sql = 'select * from auditoria';
               $ejec_sql = $conn -> prepare($sql);
               $ejec_sql -> execute();
              echo "<tr bgcolor='orange'>";
                echo "<td>";
                echo "ID";
                echo "</td>";
                echo "<td>";
                echo "Usuario";
                echo "</td>";
                echo "<td>";
                echo "Fecha de acceso";
                echo "</td>";
                echo "<td>";
                echo "Tiempo de respuesta de servicio";
                echo "</td>";
                echo "<td>";
                echo "Servicio consumido";
                echo "</td>";
                echo "<td>";
                echo "Fecha creacion auditoria";
                echo "</td>";
                echo "</tr>";
              while($fila = $ejec_sql -> fetch(PDO::FETCH_ASSOC)){
                 echo "<tr>";
                foreach($fila as $campo){
                  echo "<td>";
                  echo "$campo";
                  echo "</td>";
                }
              }
?>
</table>   
<div class="buttonHolder">
  <a href="welcome.php" align="center"><button class="button button1">Volver</button></a>
</div>
</body>
</html>