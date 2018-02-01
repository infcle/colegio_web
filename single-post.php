<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php
	require('template/header.php');
	require_once("admin/config/db.php");
	require_once("admin/config/conexion.php");
	$mi_id=$_REQUEST['num'];
	$sql="SELECT * FROM post WHERE estado =1 and id={$mi_id}";

	$result= mysqli_query($con, $sql);
	$npost= mysqli_fetch_object($result);
	setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
	$date = date_create($npost->fecha);
?>
<body id="page-top">

<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Actividades</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li>blog</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-blog-content">
						<div class="row">
							<div class="col-md-12">
								<article class="item">
									<div class="mb-thumb">
										<img src="contenido/imagenes/<?php echo $npost->url_imagen; ?>" class="img-responsive" alt="" style='width:100%;height:auto;max-width:100%;max-height:100%;'/>
										<div class="date"><?php echo date_format($date, 'd');?><span><?php echo strftime("%b", strtotime($npost->fecha)); ?></span></div>
									</div>
									<h4 class="text-uppercase"><?php echo $npost->titulo; ?></h4>
									<p><?php echo $npost->contenido; ?></p>
								</article>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Blog Post Content -->		
		
		<?php require('template/footer.php'); ?>
		