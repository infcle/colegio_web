<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
	}
	$active_administrador="active";
	$active_ccurricular="";
	$active_usuarios="";
	$active_configuracion="";
	$title="Inicio";
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	require_once ("ajax/funciones.php");
	$lista_post= listar_post($con);
	$lista_instructivo= listar_instructivos($con);
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
    	<?php include ('modal/confirmacion.php'); ?>
    	<div class="row">
    		<div class="panel panel-info">
				<div class="panel-heading">
				    <div class="btn-group pull-right">
						<a  href="nuevo_instructivo.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Instructivo</a>
					</div>
					<h4><i class='glyphicon glyphicon-book'></i> Listado de Instructivos </h4>
				</div>
				<div class="panel-body table-responsive">
				<?php if($lista_instructivo->num_rows>0): ?>
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr class="info">
								<th class="col-md-2 text-center">Fecha de publicacion</th>
								<th class="text-center col-md-3">Título</th>
								<th class="text-center col-md-5">Contenido</th>
								<th class="text-center col-md-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($lista_instructivo as $fila) {?>
							<tr>
								<td><?php echo $fila['fecha_registro'] ?></td>
								<td><?php echo $fila['titulo'] ?></td>
								<td><?php echo $fila['contenido'] ?></td>								
								<td class="text-right">
									<a href="editar_instructivo.php?id_instructivo=<?php echo $fila['id']; ?>" class='btn btn-default' title='Editar'>
										<i class="glyphicon glyphicon-edit"></i>
									</a>									
									<a href="#" class='btn btn-default' title='Eliminar' data-toggle="modal" data-target=".modal_eliminar" onclick="eliminar2(<?php echo $fila['id']; ?>, 1)">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				<?php else: ?>
					<p class="bg-info">No hay ningun registro</p>
				<?php endif; ?>
				</div>
			</div>
    	</div>
    	<div class="row">
    		<div class="panel panel-info">
				<div class="panel-heading">
				    <div class="btn-group pull-right">
						<a  href="nueva_curricular.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Entrada</a>
					</div>
					<h4><i class='glyphicon glyphicon-book'></i> Listado de Cocurricular </h4>
				</div>
				<div class="panel-body table-responsive">
				<?php if($lista_post->num_rows>0): ?>
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr class="info">
								<th class="col-md-1 text-center">Fecha de publicacion</th>
								<th class="text-center col-md-2">Título</th>
								<th class="text-center col-md-4">Contenido</th>
								<th class="text-center col-md-4">Imagen</th>
								<th class="text-center col-md-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($lista_post as $fila) {?>
							<tr>
								<td><?php echo $fila['fecha'] ?></td>
								<td><?php echo $fila['titulo'] ?></td>
								<td><?php echo $fila['contenido'] ?></td>								
								<td><img src="../contenido/imagenes/<?php echo $fila['url_imagen'] ?>" class="img-responsive" alt="Image"></td>
								<td class="text-right">
									<a href="editar_curricular.php?id_post=<?php echo $fila['id']; ?>" class='btn btn-default' title='Editar' >
										<i class="glyphicon glyphicon-edit"></i>
									</a>									
									<a href="#" class='btn btn-default' title='Eliminar' data-toggle="modal" data-target=".modal_eliminar" onclick="eliminar2(<?php echo $fila['id']; ?>, 2)">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				<?php else: ?>
					<p class="bg-info">No hay ningun registro</p>
				<?php endif; ?>
				</div>
			</div>
    	</div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/administrador.js"></script>
  </body>
</html>