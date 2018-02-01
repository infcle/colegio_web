$(document).ready(function() {
	$("#datos_publicacion").validate( {
		debug: true,
		rules: {
			titulo: {
				required: true,
				maxlength: 250					
			},
			fecha: "required",
			descripcion: {
				required: true,
				minlength:25
			}		
		},
		messages: {},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest(".form-group").addClass("has-error"); // set error class to the control group
		},
		unhighlight: function (element) { // revert the change done by hightlight
			$(element)
				.closest(".form-group").removeClass("has-error"); // set error class to the control group
		},
		success: function (label) {
			label
				.closest(".form-group").removeClass("has-sussess"); // set success class to the control group
		},			
		submitHandler: function (form) {
			var progreso='<div class="progress progress-striped active">'+
							'<div class="progress-bar  bg-theme-inverse" role="progressbar" '+
										'aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">'+
								'<div class="progress-label">'+
									'<h5><strong>Procesando por favor espere...</strong></h5></div></div></div>';

			$.ajax({
				data: $("#datos_publicacion").serialize(),
				url: "ajax/editar_instructivo.php",
				type: "post",
				beforeSend: function() {
					$("#resultado").html(progreso);
				},
				success: function(response) {
					var respuesta="";
					if(response==1){						
						exito();
					}else{
						respuesta="<script>"+
										"mensajes_alerta('ERROR AL EDITAR LOS DATOS !!','error','EDICION DE INSTRUCTIVO');"+
									"</script>";
						$("#resultado").html(respuesta);
					}
					
				}
			});
		}
	});

	
});

function exito(){
	setTimeout(function(){window.location.href='administrador.php';}, 1500);
	mensajes_alerta('DATOS EDITADOS CORRECTAMENTE !! ','success','EDICION DE INSTRUCTIVO');
}