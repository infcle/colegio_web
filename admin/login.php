<?php
require_once("config/db.php");
require_once("clases/Login.php");

$mlogin = new Login();
if ($mlogin->estaConectado() == true) :?>
  <?php header("location: administrador.php"); ?>
<?php else: ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Login</title>
  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS  -->
    <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel=icon href='img/icoRot.ico' sizes="32x32" type="image/ico">
  </head>
  <body>
   <div class="container">
          <div class="card card-container">
              <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
              <p id="profile-name" class="profile-name-card"></p>
              <form method="post" accept-charset="utf-8" action="login.php" name="loginform" id="loginform" autocomplete="off" role="form" class="form-signin">
                <?php
                  if (isset($mlogin)) {
                    if ($mlogin->errors):?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>Error!</strong>
                        <?php 
                          foreach ($mlogin->errors as $error) {
                            echo $error;
                          }
                        ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($mlogin->messages):?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>Aviso!</strong>
                        <?php
                        foreach ($mlogin->messages as $message) {
                          echo $message;
                        }?>
                      </div> 
                    <?php endif;?>
                <?php } ?>
                <span id="reauth-email" class="reauth-email"></span>
                  <input class="form-control" placeholder="Usuario o email" name="user_name" type="text" value="" autofocus="" required="">
                  <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off"  required="">
                  <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="btnlogin" id="submit">Iniciar Sesión</button>
              </form>
          </div>
      </div>
    </body>
  </html>
<?php endif; ?>