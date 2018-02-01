<?php
	function resumen($cadena){
		$maximo= strlen ($cadena);		
		if($maximo>=100){
			$nueva_cadena=substr($cadena, 0, 100).'...';
		}else{
			$nueva_cadena=$cadena.'...';
		}
		echo $nueva_cadena;
	}
	require_once("admin/config/db.php");
	require_once("admin/config/conexion.php");

	$sql="SELECT * FROM post  WHERE estado =1 ORDER BY (id) DESC LIMIT 10";

	$result= mysqli_query($con, $sql);
	setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
?>
<!-- Actividades Cocurriculares -->
<div class="row">
	<div class="col-md-12">
		<div id="blog" data-animated="0">
			<h3>Activididades co-curriculares</h3>
			
			<div id="m-blog" class="owl-carousel owl-theme">
			<?php
			foreach ($result as $post) {
				$date = date_create($post['fecha']);
			?>
				<div class="item">
					<div class="mb-thumb">
						<img src="contenido/imagenes/<?php echo $post['url_imagen'] ?>" class="img-responsive" alt=""/>
						<div class="date"><?php echo date_format($date, 'd'); ?><span><?php echo  strftime("%b", strtotime($post['fecha'])); ?></span></div>
						<span class="rmore"><a href="single-post.php?num=<?php echo $post['id']; ?>">Leer mas</a></span>
					</div>
					<h4><a href="single-post.php?num=<?php echo $post['id']; ?>" class="text-uppercase"><?php echo $post['titulo']; ?></a></h4>
					<p><strong><?php resumen($post['contenido']); ?></strong></p>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>