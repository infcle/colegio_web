$(document).ready(function() {
	$('#btnconfirmar').click(function(event) {
		var mtipo=$('#tipo_eliminar').val();
		var id=$('#cod_user').val();
		var mje="";
		var mje_e="";
		var titulo="";
		var mrul="";
		if(mtipo == 1){
			mje="INSTRUCTIVO ELIMINADO CORRECTAMENTE !!";
			mje_e="ERROR AL ELIMINAR INSTRUCTIVO !!";
			titulo="ELIMINAR INSTRUCTIVO";
			mrul = "ajax/eliminar_instructivo.php";
		}else{
			mje="COCURRICULAR ELIMINADO CORRECTAMENTE !!";
			mje_e="ERROR AL ELIMINAR COCURRICULAR !!";
			titulo="ELIMINAR INSTRUCTIVO";
			mrul = "ajax/eliminar_post.php";
		}
		$.ajax({
			url: mrul,
			type: 'POST',
			data: {
				id: id
			},
			success: function(datos){
				if(datos==1){
					mensajes_alerta(mje,'success',titulo);
					setTimeout(function(){location.reload();}, 1500);
				}else{
					mensajes_alerta(mje_e,'error',titulo);
				}
				$('#modal_confirmar').modal('hide');
				$('#resultados').empty();
			}
		});
	});
});