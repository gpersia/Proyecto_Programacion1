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
    <title>Administración</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="Estilo.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <br><br>
    <?php
      session_start();
    ?>
    <body id="LoginForm">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          </div>
            <div class="main-div">
              <div class="login-form">
                <form class="admin_user" action="Admin_users.php" method="POST">
                  <div class="panel">
                    <h2>Administración</h2>
                    <p>Seleccione una opción</p>
                  </div>
                  <br>
                  <br>
                  <button type="submit" class="button button1">Usuarios</button>
                  <br>
                </form>
                <form class="aud_register" action="Registro_auditoria.php" method="POST">
                  <button type="submit" class="button button1">Auditoría</button>
                  <br>
                </form>
                  <form class="aud_export" action="Exportacion_auditoria.php" method="POST">
                    <button type="submit" class="button button1">Exportar Auditoria</button>
                  </form>
              </div>

            </div>
            <div class="col-md-3">
              <p class="botto-text"> Dise&ntilde;ado por Tempra-Persia</p>
            </div>
        </div>
    </body>
</html>
