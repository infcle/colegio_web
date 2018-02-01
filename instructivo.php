<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php
	require('template/header.php');
	require_once("admin/config/db.php");
	require_once("admin/config/conexion.php");
	$mi_id=$_REQUEST['num'];
	$sql="SELECT * FROM intructivo WHERE estado = 1 and id={$mi_id}";

	$result= mysqli_query($con, $sql);
	$ninstructivo= mysqli_fetch_object($result);
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
						<h3><span>Instructivo</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li>instructivo</li>
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
									<h5 class="text-center">
										MINISTERIO DE EDUCACIÓN<br>
										<h6 class="text-center">DIRECCION DEPARTAMENTAL DE EDUCACION DE LA PAZ</h6>
										<h5 class="text-center">DIRECCION DISTRITAL DE EDUCACIÓN EL ALTO 2</h5>
									</h5>
									<div class="row">
										<div class=" col-md-6 col-md-offset-5">
											<img src="assets/img/logoRot.png" class="img-responsive" alt="Image">
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
											UnIDAD EDUCATIVA ROTARY CHUQUIAGO MARKA TARDE <br>
											SECUNDARIA COMUNITARIA PRODUCTIVA <br>
											EL ALTO BOLIVIA
										</div>
									</div>
									<hr class="mihr">
									<div class="row" >
										<h5 class="text-center"><strong><?php echo $ninstructivo->titulo; ?></strong></h5>					
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
											De:
										</div>
										<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
											<?php echo $ninstructivo->de; ?> <br>
											<?php echo $ninstructivo->de_cargo; ?>
										</div>
									</div><br>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
											A:
										</div>
										<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
											<?php echo $ninstructivo->dirigido_a; ?>
										</div>
									</div><br>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
											REF:
										</div>
										<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
											<?php echo $ninstructivo->ref; ?>
										</div>
									</div><br>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
											FECHA:
										</div>
										<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
											<?php echo $ninstructivo->fecha_literal; ?>
										</div>
									</div>
									<hr class="mihr">									
									<p class="text-justify">
										<?php echo $ninstructivo->contenido; ?>
									</p>
								</article>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Blog Post Content -->		
		
		<?php require('template/footer.php'); ?>
		