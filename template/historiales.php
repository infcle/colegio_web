<?php
	function resumenInst($cadena){
		$maximo= strlen ($cadena);		
		if($maximo>=80){
			$nueva_cadena=substr($cadena, 0, 80).'...';
		}else{
			$nueva_cadena=$cadena.'...';
		}
		echo $nueva_cadena;
	}
	require_once("admin/config/db.php");
	require_once("admin/config/conexion.php");
	$sql="SELECT * FROM intructivo  WHERE estado =1 ORDER BY (id) DESC LIMIT 5";

	$resultinstructivo= mysqli_query($con, $sql);
?>
<!-- Timeline -->
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12" id="timeline-wrap" data-animated="0">
			<h3>INSTRUCTIVOS</h3>
			<ol id="timeline">
			<?php 
				$cont=0;
				foreach ($resultinstructivo as $instructivo) {
					$cont++;
					if($cont % 2==0):
			?>
					<li class="t-right" data-animated="0">
						<div class="t-time"><?php echo $instructivo['titulo'] ?><span><?php echo $instructivo['fecha_literal'] ?></span></div>
						<p><?php resumenInst($instructivo['ref']); ?></p>
						<a class="btn btn-info" href="instructivo.php?num=<?php echo $instructivo['id']; ?>" role="button">ver mas</a>
					</li>
				<?php else: ?>
					<li class="t-left" data-animated="0">
						<div class="t-time"><?php echo $instructivo['titulo'] ?><span><?php echo $instructivo['fecha_literal'] ?></span></div>
						<p><?php resumenInst($instructivo['ref']); ?></p>
	                    <a class="btn btn-info" href="instructivo.php?num=<?php echo $instructivo['id']; ?>" role="button">ver mas</a>
					</li>
				<?php endif; ?>
			<?php }  ?>
			</ol>
		</div>
	</div>
</div>