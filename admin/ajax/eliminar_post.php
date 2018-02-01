<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$idPost= $_REQUEST['id'];
	//echo $idUser;die();
	$actualizar = "UPDATE post set estado=0 where id={$idPost}";

	if(mysqli_query($con, $actualizar))
		echo 1;
	else
		echo 0;
?>