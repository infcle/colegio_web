<?php 
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";die();
	
	$titulo=$_REQUEST['titulo'];
	$contenido=$_REQUEST['descripcion'];
	$fecha=$_REQUEST['fecha'];
	$remitente_de=$_REQUEST['remitente_de'];
	$con_cargo=$_REQUEST['con_cargo'];
	$dirigido_a=$_REQUEST['dirigido_a'];
	$referencia=$_REQUEST['referencia'];
	$fecha_literal=$_REQUEST['fecha_literal'];

	$query_instructivo = "INSERT INTO intructivo (titulo, de, de_cargo, dirigido_a, ref, fecha_literal, contenido) VALUES ('{$titulo}','{$remitente_de}','{$con_cargo}','{$dirigido_a}', '{$referencia}', '{$fecha_literal}', '{$contenido}')";

	if(mysqli_query($con, $query_instructivo))
		echo 1;
	else
		echo 0;
?>