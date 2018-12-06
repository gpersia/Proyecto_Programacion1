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
    <title>Administración</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="Estilo.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php
      session_start();
    ?>
  </body>
    <body id="LoginForm">
        <div class="container">
                <div class="main-div">
                    <div class="panel">
                        <h2 align="center">Administracion</h2>
                        <p align="center">Seleccione una opcion:</p>
                    </div>
                    <br>
                    <a href="administracion_choferes.php"><button class="button button1">Administracion de choferes</button></a>
                    <br>
                    <a href="administracion_vehiculos.php"><button class="button button1">Administracion de vehiculos</button></a>
                    <br>
                    <a href="administracion_transporte.php"><button class="button button1">Administracion de transportes</button></a>
                    <br>
                    <a href="ver_auditoria.php"><button class="button button1">Ver auditoría</button></a>
                    <br>
                    <a href="exportar_auditoria.php"><button class="button button1">Exportar auditoría</button></a>
                    <br>
                    <a href="index.html"><button class="button button1">Cerrar Sesion</button></a>
                </div>
                <p class="botto-text" align="center"> Dise&ntilde;ado por Tempra-Persia</p>
        </div>
    </body>
</html>
