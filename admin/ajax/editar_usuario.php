<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$nombre=$_REQUEST['firstname2'];
	$email=$_REQUEST['user_email2'];
	$id= $_REQUEST['mod_id'];

	$actualizar = "UPDATE users set name='{$nombre}', email='{$email}' where id={$id}";

	if(mysqli_query($con, $actualizar))
		echo 1;
	else
		echo 0;
?>