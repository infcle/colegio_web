<?php
	function listar_post($con){
		$query="SELECT * FROM post where estado=1";
		if($resultado=mysqli_query($con, $query))
			return $resultado;
		else
			$resultado = 'Error mensaje';
		return $resultado;
	}

	function listar_instructivos($con){
		$query="SELECT * FROM intructivo where estado=1";
		if($resultado=mysqli_query($con, $query))
			return $resultado;
		else
			$resultado = 'Error mensaje';
		return $resultado;
	}

	function instructivo_x($con, $id){
		$query="SELECT * FROM intructivo where estado=1 and id = {$id}";
		if($resultado=mysqli_query($con, $query))
			return $resultado;
		else
			$resultado = 'Error mensaje';
		return $resultado;
	}

	function curricular_X($con, $id){
		$query="SELECT * FROM post where estado=1 and id = {$id}";
		if($resultado=mysqli_query($con, $query))
			return $resultado;
		else
			$resultado = 'Error mensaje';
		return $resultado;
	}
?>