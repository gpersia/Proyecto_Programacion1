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
    <title>Registro Choferes</title>
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
          <h2 align="center">Registrar Chofer</h2>
          <h5 align="center">Completar los datos</h5>
          <form class="formulario" action="crearchofer.php" method="POST">
            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido: </label>
              <input type="text" class="form-control" name="apellido" id="apellido">
            </div>
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="dni">Documento: </label>
              <input type="text" class="form-control" name="dni" id="dni">
            </div>
            <div class="form-group">
              <label for="FK_vehiculo">Vehiculo: </label>
              <input type="text" class="form-control" name="FK_vehiculo" id="FK_vehiculo">
            </div>
            <div class="form-group">
              <label for="FK_transporte">Tipo transporte: </label>
              <input type="text" class="form-control" name="FK_transporte" id="FK_transporte">
            </div>
              <br>
            <button type="submit" class="button button1">Enviar</button>
            <a href="administracion_choferes.php"><button class="button button1">Volver</button></a>

              <br><br>
          </form>
          <br><br>
        </div>
        </div>
        <p class="botto-text" align="center"> Dise&ntilde;ado por Tempra-Persia</p>
  </body>
</html>
