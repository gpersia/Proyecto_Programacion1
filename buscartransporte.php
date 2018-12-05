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
    <title>Registro Transporte</title>
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
          <?php session_start(); ?>

          <?php 
            if($_SESSION['id'] = null){
              header('Location: index.html');
            }
          ?>
          <h2 align="center">Buscar transporte</h2>
          <form class="formulario" action="buscar_transporte.php" method="POST">
            <div class="form-group">
              <label for="nombre">Ingrese nombre: </label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <br>
            <button type="submit" class="button button1">Enviar</button>
              <br><br>
          </form>
          <form class="quit" action="administracion_transporte.php" method="POST">
            <button type="submit" class="button button1">Volver</button>
          </form>
          <br><br><br>
        </div>
        </div>
        <p class="botto-text" align="center"> Dise&ntilde;ado por Tempra-Persia</p>
  </body>
</html>
