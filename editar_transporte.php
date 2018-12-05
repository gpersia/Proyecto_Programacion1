<?php session_start(); ?>

<?php 
if($_SESSION['id'] = null){
  header('Location: index.html');
}
?>
<!DOCTYPE html>
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
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      cursor: pointer;
      width: 100%;
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
      </style>
    <meta charset="utf-8">
    <title>Lista choferes</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="Estilo.css" rel="stylesheet" type="text/css"/>
  </head>
  <body id="LoginForm">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <br>
          <h2>Edición de Transporte</h2>
          <h5>Rellene los datos: </h5>
          <br><br>
          <form class="formulario" action="editartransporte.php" method="POST">

          <?php
            $id = $_GET['id'];
            $servidor = 'localhost';
            $usuario = 'root';
            $clave = 'root';
            $base = 'proyecto';
            $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

            $sql = "select * from transporte";
            $ejec_sql = $conn -> prepare($sql);
            $ejec_sql -> execute();
            while($fila = $ejec_sql -> fetch(PDO::FETCH_ASSOC)){
              foreach($fila as $campo){
                if($fila['id'] == $id){
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"id\">ID: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"id\" id=\"id\"value=\"$fila[id]\" readonly=\"readonly\">";
                  echo "</div>";
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"nombre\">Nombre: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"nombre\" id=\"nombre\"value=\"$fila[nombre]\">";
                  echo "</div>";
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"apellido\">Apellido: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"pais_procedencia\" id=\"pais_procedencia\" value=\"$fila[pais_procedencia]\">";
                  echo "</div>";
                  break;
                }
              }
            }
          ?>
          <button type="submit" class="button button1">Aceptar</button>
        </form>
        <form class="quit" action="administracion_transporte.php" method="POST">
          <button type="submit" class="button button1">Volver</button>
        </form>
        <br><br>
      </div>
     </div>
   </div>
  </form>
 </body>
</html>