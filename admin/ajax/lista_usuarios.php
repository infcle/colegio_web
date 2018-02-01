<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");						
	$query="SELECT * FROM users where estado=1";
	if($resultado=mysqli_query($con, $query))
		//$resultado = dbx_query($con,$query);
		$lista= $resultado;
	else
		$lista = 'Error mensaje';	
	
	//echo "<pre>";print_r ($lista);echo "</pre>";
	if($lista->num_rows>0):
?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="col-md-4">Nombres</th>
				<th>Usuario</th>
				<th class="col-md-4">E-mail</th>
				<th class="col-md-2">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lista as $fila) {?>
			<tr>
				<td><?php echo $fila['name']; ?></td>
				<td><?php echo $fila['login']; ?></td>
				<td><?php echo $fila['email']; ?></td>
				<td>
					<a href="#" class='btn btn-default' title='Editar usuario' data-toggle="modal" data-target="#myModal2" onclick="obtener_datos(<?php echo $fila['id']; ?>)">
						<i class="glyphicon glyphicon-edit"></i>
					</a> 
					<a href="#" class='btn btn-default' title='Cambiar contraseña' data-toggle="modal" data-target="#myModal3" onclick="cambiarPass(<?php echo $fila['id']; ?>)">
						<i class="glyphicon glyphicon-cog"></i>
					</a>
					<a href="#" class='btn btn-default' title='Borrar usuario' data-toggle="modal" data-target=".modal_eliminar" onclick="eliminar(<?php echo $fila['id']; ?>)">
						<i class="glyphicon glyphicon-trash"></i> 
					</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php else: ?>
	<p class="bg-info text-center">No existen registros de usuarios activos</p>
<?php endif; ?>