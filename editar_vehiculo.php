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
      -webkit-transition-duration: 0.4s; 
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
    <title>Lista vehiculos</title>
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
          <h2>Edición de Chofer</h2>
          <h5>Rellene los datos: </h5>
          <br><br>
          <form class="formulario" action="editarvehiculo.php" method="POST">

          <?php
            $id = $_GET['id'];
            $servidor = 'localhost';
            $usuario = 'root';
            $clave = 'root';
            $base = 'proyecto';
            $conn = new PDO("mysql: host=$servidor; dbname=$base", $usuario, $clave);

            $sql = "select * from vehiculo";
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
                    echo "<label for=\"marca\">Marca: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"marca\" id=\"marca\"value=\"$fila[marca]\">";
                  echo "</div>";
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"modelo\">Modelo: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"modelo\" id=\"modelo\" value=\"$fila[modelo]\">";
                  echo "</div>";
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"anho_fabricacion\">Año fabricacion: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"anho_fabricacion\" id=\"anho_fabricacion\"value=\"$fila[anho_fabricacion]\">";
                  echo "</div>";
                  echo "<div class=\"form-group\">";
                    echo "<label for=\"patente\">Patente: </label>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"patente\" id=\"patente\"value=\"$fila[patente]\">";
                  echo "</div>";
                  break;
                }
              }
            }
          ?>
          <button type="submit" class="button button1">Aceptar</button>
        </form>
        <form class="quit" action="administracion_choferes.php" method="POST">
          <button type="submit" class="button button1">Volver</button>
        </form>
        <br><br>
      </div>
     </div>
   </div>
  </form>
 </body>
</html>