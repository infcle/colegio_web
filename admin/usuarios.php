<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_administrador="";
	$active_ccurricular="";
	$active_usuarios="active";
	$active_configuracion="";
	$title="Usuarios";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	<?php include("head.php");?>
	</head>
 	<body>
 	<?php include("navbar.php");?> 
	    <div class="container">
			<div class="panel panel-info">
				<div class="panel-heading">
				    <div class="btn-group pull-right">
						<button type='button' class="btn btn-info" data-toggle="modal" data-target="#myModal_registro">
							<span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario
						</button>
					</div>
					<h4><i class='glyphicon glyphicon-user'></i> Usuarios Activos</h4>
				</div>			
				<div class="panel-body">
					<?php
					include("modal/registro_usuarios.php");
					include("modal/editar_usuarios.php");
					include("modal/cambiar_password.php");
					?>
					<div id="resultados">
					</div>
					<?php include("modal/confirmacion.php"); ?>
				</div>
			</div>
		</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/locales/messages_es.js"></script>
	<script type="text/javascript" src="js/usuarios.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>
<script>