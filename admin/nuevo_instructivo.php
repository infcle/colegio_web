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
	$title="Nuevo Instructivo";
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
			<h4><i class='glyphicon glyphicon-book'></i> REGISTRO DE NUEVO INSTRUCTIVO </h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_publicacion" name="datos_publicacion" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="titulo" class="col-md-2 control-label">TÍTULO</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="titulo"  name="titulo" placeholder="Titulo del instructivo" required  />						  	
							  	</div>
							</div>
						</div>
						<div class="col-md-6 hidden">
							<div>						  	
							  	<label for="fecha_publicacion" class="col-md-5 control-label text-right">Fecha publicacion</label>
								<div class="form-group col-md-4">
									<input type="text" class="form-control text-center" id="fecha" name="fecha" value="<?php echo date("d/m/Y");?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="remitente_de" class="col-md-2 control-label">DE:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="remitente_de"  name="remitente_de" placeholder="Lic. Pepito Perez" required />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="con_cargo" class="col-md-2 control-label">CON CARGO:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="con_cargo"  name="con_cargo" placeholder="Cargo que ocupa" required />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="dirigido_a" class="col-md-2 control-label">DIRIGIDO A:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="dirigido_a"  name="dirigido_a" placeholder="A quien va dirigido" required />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="referencia" class="col-md-2 control-label">REF:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="referencia"  name="referencia" placeholder="Referencia" required />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="fecha_literal" class="col-md-2 control-label">FECHA:</label>
							  	<div class="form-group col-md-7">
								  	<input type="text" class="form-control" id="fecha_literal"  name="fecha_literal" placeholder="El alto, dia de mes literal de año" required />
							  	</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="descripcion" class="col-md-2 control-label">CONTENIDO</label>
							<div class=" form-group col-md-8">
								<textarea name="descripcion" id="descripcion" class="form-control" rows="15" placeholder="Contenido de la instructiva" required ></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="pull-right">
							<button type="submit" id="bt_publicar" name="bt_publicar" class="btn btn-success" data-toggle="modal" data-target="#nuevoProducto">
								<span class="glyphicon glyphicon-floppy-save"></span> PUBLICAR
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
	<script src="js/nueva_intructiva.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>