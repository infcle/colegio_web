<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$password=$_REQUEST['user_password_repeat3'];
	$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
	$id= $_REQUEST['user_id_mod'];

	$actualizar = "UPDATE users set password='{$user_password_hash}' where id={$id}";

	if(mysqli_query($con, $actualizar))
		echo 1;
	else
		echo 0;
?>