<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	$jsondata = array();
	$id=$_REQUEST['id_user'];
	$sql="SELECT id, name, login, email FROM users where id={$id}";
	if($result=mysqli_query($con,$sql)){
		if($result->num_rows > 0){
			$jsondata['estado']="correcto";
			while ($row = $result->fetch_array() ) {
				$jsondata['usuario'] = $row;
			}
		}
	}else{
		$jsondata['estado']="Error en la consulta";
	}
	echo json_encode($jsondata);
?>