<?php
	if (isset($title))
	{
?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Administración</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_administrador;?>">
          <a href="index.php"><i class='glyphicon glyphicon-home'></i> Inicio</a>
        </li>
        <li class="dropdown <?php echo $active_ccurricular;?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i  class='glyphicon glyphicon-book'></i> Publicar <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="nueva_curricular.php"><i class='glyphicon glyphicon-list-alt'></i> Nueva Curricular</a></li>
            <li><a href="nuevo_instructivo.php"><i class='glyphicon glyphicon-barcode'></i> Nuevo Instructivo</a></li>
          </ul>
        </li>
        <?php if($_SESSION['rol'] == 'admin'): ?>
          <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
        <?php endif; ?>
		  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombre'] ?></a></li>
        <li class="dropdown <?php echo $active_configuracion;?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i  class='glyphicon glyphicon-cog'></i> Configuracion <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="perfil.php"><i class='glyphicon glyphicon-user'></i> Mi cuenta</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
          </ul>
        </li>
		
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
	}
?>