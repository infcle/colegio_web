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
	$title="Editar Instructivo";

	$id = $_REQUEST['id_instructivo'];
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	require_once("ajax/funciones.php");

	$miInstructivo=instructivo_x($con, $id);
	
	$instructivo = mysqli_fetch_object($miInstructivo);
	//echo "<pre>";print_r ($instructivo->titulo);echo "</pre>";die();
	
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
			<h4><i class='glyphicon glyphicon-book'></i> EDITAR INSTRUCTIVO </h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_publicacion" name="datos_publicacion" method="POST">
				<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">		
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="titulo" class="col-md-2 control-label">TÍTULO</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="titulo"  name="titulo" placeholder="Titulo del instructivo" required value="<?php echo $instructivo->titulo; ?>" />						  	
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="remitente_de" class="col-md-2 control-label">DE:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="remitente_de"  name="remitente_de" placeholder="Lic. Pepito Perez" required value="<?php echo $instructivo->de; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="con_cargo" class="col-md-2 control-label">CON CARGO:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="con_cargo"  name="con_cargo" placeholder="Cargo que ocupa" required value="<?php echo $instructivo->de_cargo; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="dirigido_a" class="col-md-2 control-label">DIRIGIDO A:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="dirigido_a"  name="dirigido_a" placeholder="A quien va dirigido" required value="<?php echo $instructivo->dirigido_a; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="referencia" class="col-md-2 control-label">REF:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="referencia"  name="referencia" placeholder="Referencia" required value="<?php echo $instructivo->ref; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="fecha_literal" class="col-md-2 control-label">FECHA:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="fecha_literal"  name="fecha_literal" placeholder="El alto, dia de mes literal de año" required value="<?php echo $instructivo->fecha_literal; ?>" />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="descripcion" class="col-md-2 control-label">CONTENIDO</label>
							<div class=" form-group col-md-8">
								<textarea name="descripcion" id="descripcion" class="form-control" rows="15" placeholder="Contenido de la instructiva" required ><?php echo $instructivo->contenido; ?></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" id="bt_publicar" name="bt_publicar" class="btn btn-success" data-toggle="modal" data-target="#nuevoProducto">
								<span class="glyphicon glyphicon-floppy-save"></span> MODIFICAR
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
	<script src="js/editar_intructiva.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>