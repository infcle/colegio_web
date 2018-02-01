<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	$active_administrador="";
	$active_ccurricular="active";
	$active_usuarios="";
	$active_configuracion="";
	$title="Cocurricular";

	$id = $_REQUEST['id_post'];
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	require_once("ajax/funciones.php");

	$miPost=curricular_X($con, $id);
	$post = mysqli_fetch_object($miPost);

	$date = new DateTime($post->fecha);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<?php include("head.php");?>
	<link rel="stylesheet" href="css/fileinput.min.css">
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
			<h4><i class='glyphicon glyphicon-book'></i> Editar Cocurricular </h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_publicacion" name="datos_publicacion" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_post" id="id_post" class="form-control" value="<?php echo $id; ?>">
					<div class="form-group row">
					  	<label for="titulo" class="col-md-1 control-label">Título</label>
					  	<div class="col-md-3">
						  	<input type="text" class="form-control input-sm" id="titulo" name="titulo" placeholder="Titulo de la publicacion" required value="<?php echo $post->titulo; ?>">						  	
					  	</div>
					  	<label for="fecha_publicacion" class="col-md-5 control-label text-right">Fecha publicacion</label>
						<div class="col-md-3">
							<input type="text" class="form-control input-sm" id="fecha" name="fecha" value="<?php echo $date->format('d/m/Y');?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="descripcion" class="col-md-1 control-label">Contenido</label>
						<div class="col-md-6">
							<textarea name="descripcion" id="descripcion" class="form-control" rows="10" required="required" minlength="50"><?php echo $post->contenido; ?></textarea>
						</div>
						<label for="descripcion" class="col-md-1 control-label">Imagen</label>
						<div class="form-group col-md-4">
							<input class='file-loading' data-preview-file-type="text" type="file" name="imagefile" id="imagefile" multiple="false">
							<input type="hidden" name="img_nombre" id="img_nombre" class="form-control" value="<?php echo $post->url_imagen; ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#nuevoProducto" id="btnguardar">
								<span class="glyphicon glyphicon-floppy-save"></span> Editar
							</button>
						</div>
					</div>
				</form>
				<div id="resultado">
				</div>
			</div>
		</div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/locales/messages_es.js"></script>
	<script type="text/javascript" src="js/fileinput.min.js"></script>
	<script type="text/javascript" src="js/locales/es.js"></script>
	<script src="js/editar_cocurricular.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>