<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	$sql="";
	if(isset($_REQUEST['tipo'])){
		session_start();
		if(isset($_REQUEST['usuario'])){
			$sql="SELECT * FROM users WHERE login = '{$_REQUEST['usuario']}' and id != {$_SESSION['user_id']}";
		}
		if(isset($_REQUEST['email'])){
			$sql="SELECT * FROM users WHERE email = '{$_REQUEST['email']}' and id != {$_SESSION['user_id']}";
		}
		if($resultado=mysqli_query($con,$sql)){
			$nrodefilas=$resultado->num_rows;
			if($nrodefilas == 0)
				echo "true";
			else
				echo "false";
		}
	}else{
		if(isset($_REQUEST['usuario'])){
			$sql="SELECT * FROM users WHERE login = '{$_REQUEST['usuario']}'";
		}
		if(isset($_REQUEST['email'])){
			$sql="SELECT * FROM users WHERE email = '{$_REQUEST['email']}'";
		}
		if($resultado=mysqli_query($con,$sql)){
			$nrodefilas=$resultado->num_rows;
			if($nrodefilas == 0)
				echo "true";
			else
				echo "false";
		}
	}
?>