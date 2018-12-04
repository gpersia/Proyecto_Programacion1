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
    <title>Registro Vehiculos</title>
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
          <?php
            session_start();
          ?>
          <h2 align="center">Registrar Vehiculo</h2>
          <h5 align="center">Completar los datos</h5>
          <form class="formulario" action="crearvehiculo.php" method="POST">
            <div class="form-group">
              <label for="marca">Marca: </label>
              <input type="text" class="form-control" name="marca" id="marca">
            </div>
            <div class="form-group">
              <label for="modelo">Modelo: </label>
              <input type="text" class="form-control" name="modelo" id="modelo">
            </div>
            <div class="form-group">
              <label for="anho_fabricacion">Año fabricacion: </label>
              <input type="text" class="form-control" name="anho_fabricacion" id="anho_fabricacion">
            </div>
            <div class="form-group">
              <label for="patente">Patente: </label>
              <input type="text" class="form-control" name="patente" id="patente">
            </div>
              <br>
            <button type="submit" class="button button1">Enviar</button>
            <a href="administracion_vehiculos.php"><button class="button button1">Volver</button></a>
              <br><br>
          </form>
          <br><br>
        </div>
        </div>
        <p class="botto-text" align="center"> Dise&ntilde;ado por Tempra-Persia</p>
  </body>
</html>