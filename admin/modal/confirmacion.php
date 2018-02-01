<?php
	if (isset($con)):
?>
<div class="modal fade modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal_confirmar">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><strong>¿Desea Eliminar el usuario?</strong></h4>
				<input type="hidden" name="cod_user" id="cod_user" class="form-control" value="">
				<input type="hidden" name="tipo_eliminar" id="tipo_eliminar" class="form-control" value="">
			</div>			
			<div class="modal-footer text-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnconfirmar">Aceptar</button>
			</div>
		</div>
	</div>
</div>
<?php endif;?>