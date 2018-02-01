<?php 
	function partirTitulo($titulo){
		$arrayTitulo=explode(" ", $titulo);
		return $arrayTitulo[0];
	}
	function obtExtencion($nomimg){
		$arrayNomImg=explode(".", $nomimg);
		$extencion = array_pop($arrayNomImg);
		return $extencion;
	}
	function reducirImg($rutaimg, $nomimg, $extencion){

		if($extencion == "gif"){
			$img_origen = imagecreatefromgif($rutaimg.$nomimg);
		}elseif ($extencion == "jpg" || $extencion == "jpeg") {
			$img_origen = imagecreatefromjpeg($rutaimg.$nomimg);
		}elseif ($extencion == "png") {
			$img_origen = imagecreatefrompng($rutaimg.$nomimg);
		}

		$ancho_origen=imagesx($img_origen);
		$alto_origen=imagesy($img_origen);
		$ancho_limite=720;

		if($ancho_origen>$alto_origen){//Para fotos horizontales
			$ancho_origen=$ancho_limite;
			$alto_origen=$ancho_origen*imagesy($img_origen)/imagesx($img_origen);
		}else{//Para fotos verticales
			$alto_origen=$ancho_limite;
			$ancho_origen=$ancho_origen*imagesx($img_origen)/imagesy($img_origen);
		}
		$img_destino = imagecreatetruecolor($ancho_origen, $alto_origen);
		imagecopyresized($img_destino, $img_origen, 0,0,0,0, $ancho_origen, $alto_origen, imagesx($img_origen), imagesy($img_origen));
		if($extencion == "gif"){
			imagegif($img_destino, $rutaimg.$nomimg);
		}elseif ($extencion == "jpg" || $extencion == "jpeg") {
			imagejpeg($img_destino, $rutaimg.$nomimg);
		}elseif ($extencion == "png") {
			imagepng($img_destino, $rutaimg.$nomimg);
		}		
	}
	require_once ('../config/db.php');
	require_once ("../config/conexion.php");
	// echo '<pre>';print_r ($_FILES);echo '</pre>';
	// echo '<pre>';print_r ($_REQUEST);echo '</pre>';die();
	$titulo=$_REQUEST['titulo'];
	$contenido=$_REQUEST['descripcion'];
	$nomimagen=$_REQUEST['img_nombre'];
	$tipo='instructivo';
	$id=$_REQUEST['id_post'];

	$sql="";
	//imagen
	if(isset($_FILES) && isset($_FILES['imagefile']) && !empty($_FILES['imagefile']['name']) && !empty($_FILES['imagefile']['tmp_name'])){
		if($nomimagen == $_FILES['imagefile']['name']){
			$sql="UPDATE post set titulo='{$titulo}', contenido ='{$contenido}', tipo='{$tipo}' where id={$id}";
		}else{
			//hemos recibido el fichero
			$target_dir="../../contenido/imagenes/";
			$extencionimg=obtExtencion($_FILES['imagefile']['name']);
			$size_img=$_FILES['imagefile']['size'];
			$image_name = time().'_'.partirTitulo($titulo).'.'.$extencionimg;

			//Comprobamos que es un fichero subido por php, y no hay inyeccion por otros medios
			if( !is_uploaded_file($_FILES['imagefile']['tmp_name'])){
				echo 'Error: El fichero encontrado no fue procesado por la subida correctamente';
				exit;
			}
			$source = $_FILES['imagefile']['tmp_name'];
			$destino =$target_dir.$image_name;
			if(is_file($destino)){
				echo 'Error: Ya existe almacenado un fichero con ese nombre';
				unlink(ini_get("upload_tmp_dir").$_FILES['imagefile']['tmp_name']);
				exit;
			}
			if(!@move_uploaded_file($source, $destino)){
				echo 'Error: no se ha podido mover el archivo el fichero enviado a la carpeta destino';
				unlink(ini_get("upload_tmp_dir").$_FILES['imagefile']['tmp_name']);
				exit;
			}
			//echo 'Fichero subido correctamente';
			if($size_img >350000)
				reducirImg($target_dir, $image_name, $extencionimg);
			$sql="UPDATE post set titulo='{$titulo}', contenido ='{$contenido}', url_imagen='{$image_name}', tipo='{$tipo}' where id={$id}";
		}
		
	}else{
		//echo 'No existe archivo para subir';
		$sql="UPDATE post set titulo='{$titulo}', contenido ='{$contenido}', tipo='{$tipo}' where id={$id}";
	}
	
	if(mysqli_query($con, $sql)){
		echo 1;
	}
	else{
		if(isset($destino))
			unlink($destino);
		echo 0;
	}
?>