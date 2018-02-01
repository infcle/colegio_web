<?php 
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$titulo=$_REQUEST['titulo'];
	$contenido=$_REQUEST['descripcion'];
	$remitente_de=$_REQUEST['remitente_de'];
	$con_cargo=$_REQUEST['con_cargo'];
	$dirigido_a=$_REQUEST['dirigido_a'];
	$referencia=$_REQUEST['referencia'];
	$fecha_literal=$_REQUEST['fecha_literal'];
	$id=$_REQUEST['id'];

	$query_instructivo = "UPDATE intructivo set titulo='{$titulo}',  de= '{$remitente_de}', de_cargo= '{$con_cargo}', dirigido_a='{$dirigido_a}', ref= '{$referencia}', fecha_literal= '{$fecha_literal}', contenido= '{$contenido}' where id={$id}";

	if(mysqli_query($con, $query_instructivo))
		echo 1;
	else
		echo 0;
?>