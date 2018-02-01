<?php
	session_start();
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$user_name=$_REQUEST['user'];
	$email=$_REQUEST['email'];
	$id= $_SESSION['user_id'];
	if(!empty($_REQUEST['password_new'])){
		$user_password_hash = password_hash($_REQUEST['password_new'], PASSWORD_DEFAULT);
		$actualizar = "UPDATE users set login='{$user_name}', email='{$email}' , password = '{$user_password_hash}' where id={$id}";
	}else{
		$actualizar = "UPDATE users set login='{$user_name}', email='{$email}' where id={$id}";
	}
	if(mysqli_query($con, $actualizar))
		echo 1;
	else
		echo 0;
?>