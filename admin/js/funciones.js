function mensajes_alerta(mensaje,tipo,titulo){
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  //"progressBar": true,
	  "positionClass": "toast-top-full-width",
	  "onclick": null,
	  "showDuration": "1000",
	  "hideDuration": "1000",
	  "timeOut": "4000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	toastr[tipo](mensaje, titulo);
}

function eliminar(id){
	$('#cod_user').val(id);
}

function eliminar2(id, tipo){
	$('#cod_user').val(id);
	$('#tipo_eliminar').val(tipo);
}