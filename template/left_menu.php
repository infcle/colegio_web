<?php 
	//echo "<pre>";print_r ($_REQUEST['e']);echo "</pre>";die();
	if(!isset($_REQUEST['e']))
		$_REQUEST['e']=1;
?>
<!-- Fixed Left Navigaton -->
<div class="col-md-3 m-left">
	<!-- Navmenu -->
	<header>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php?e=1"><img src="assets/img/logoRot.png" class="img-responsive" alt="Logo Rotary Chuquiago Marka"/></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right menu-effect mimenu">
					<li <?php echo ($_REQUEST['e'] == 1) ? 'class="current"' : '';  ?> >
						<a href="index.php?e=1" data-hover="Inicio">Inicio</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 2) ? 'class="current"' : '';  ?> >
						<a href="about.php?e=2" data-hover="Quienes&nbsp;Somos">Quienes Somos</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 3) ? 'class="current"' : '';  ?> >
						<a href="plantel_administrativo.php?e=3" data-hover="Plantel&nbsp;administrativo">Plantel administrativo
						</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 4) ? 'class="current"' : '';  ?> >
						<a href="horarios_visita.php?e=4" data-hover="Horarios&nbsp;de&nbsp;visita">Horarios de visita</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 5) ? 'class="current"' : '';  ?> >
						<a href="blog.php?e=5" data-hover="Actividades&nbsp;curriculares">Actividades curriculares
						</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 6) ? 'class="current"' : '';  ?> >
						<a href="portafolio.php?e=6" data-hover="Galeria&nbsp;de&nbsp;fotos">Galeria de fotos</a>
					</li>
					<li <?php echo ($_REQUEST['e'] == 7) ? 'class="current"' : '';  ?> >
						<a href="contact.php?e=7" data-hover="Contactos">Contactos</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Navmenu -->
		
		<!-- Hidden Content -->
		<div class="m-header">
			<p class="mh-copy">&copy; 2017 Sergio, Todos los derechos reservados</p>
		</div>
		<div class="m-hide"><i class="fa fa-plus-circle"></i></div>
		<!-- Hidden Content -->
		
	</header>
</div>
<!-- Fixed Left Navigaton - END -->