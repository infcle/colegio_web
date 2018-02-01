<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	$active_administrador="";
	$active_ccurricular="";
	$active_usuarios="";
	$active_configuracion="active";
	$title="Perfil";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<?php include("head.php");?>	
  </head>
  <body>
	<?php
	include("navbar.php");	
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
			</div>
			<h4><i class='glyphicon glyphicon-user'></i> MODIFICAR DATOS </h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="frm_perfil" name="frm_perfil" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="nombre" class="col-md-4 control-label">NOMBRE COMPLETO:</label>
							  	<div class="form-group col-md-6">
								  	<input type="text" class="form-control" id="nombre"  name="nombre" required readonly="" value="<?php echo $_SESSION['nombre']; ?>" disabled/>						  	
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="email" class="col-md-4 control-label">E-MAIL:</label>
							  	<div class="form-group col-md-6">
								  	<input type="email" class="form-control" id="email"  name="email" placeholder="Correo electronico" required value="<?php echo $_SESSION['user_email']; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="user" class="col-md-4 control-label">USUARIO:</label>
							  	<div class="form-group col-md-6">
								  	<input type="text" class="form-control" id="user"  name="user" placeholder="Nombre usuario" required  value="<?php echo $_SESSION['user_name']; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="password_new" class="col-md-4 control-label">NUEVA CONTRASEÑA:</label>
							  	<div class="form-group col-md-6">
								  	<input type="password" class="form-control" id="password_new"  name="password_new" placeholder="Escriba nueva Contraseña" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="password_new_rep" class="col-md-4 control-label">REPITA CONTRASEÑA:</label>
							  	<div class="form-group col-md-6">
								  	<input type="password" class="form-control" id="password_new_rep"  name="password_new_rep" placeholder="Repita contraseña nueva" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" id="bt_publicar" name="bt_publicar" class="btn btn-primary">
								<span class="glyphicon glyphicon-refresh"></span> MODIFICAR
							</button>
						</div>	
					</div>
				</form>	
			</div>
		</div>
		<div id="resultado">
		</div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>	
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/locales/messages_es.js"></script>
	<script src="js/perfil.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>