var validacion;

$(document).ready(function() {
	$('#resultados').load('ajax/lista_usuarios.php');
	$('#guardar_datos').click(function(event) {
		validacion=$("#guardar_usuario").validate( {
			debug: true,
			onkeyup: false,
			rules: {
				user_name: {
					required: true,
					minlength: 3,
					remote: {
	                    url: "ajax/verifica.php",
	                    type: 'post',
	                    data: {
	                        usuario: function() {
	                            return $("#user_name").val();
	                        }
	                    }
	                } 
				},
				user_password_new:{
					required: true,
					minlength: 6
				},
				user_password_repeat:{
					equalTo: "#user_password_new",
					minlength: 6
				},
				user_email:{
					required: true,
					email: true,
					remote: {
	                    url: "ajax/verifica.php",
	                    type: 'post',
	                    data: {
	                        email: function() {
	                            return $("#user_email").val();
	                        }
	                    }
	                }
				}
			},
			messages: {
				user_name:{
					required: "Es necesario un nombre de usuario.",
					remote: "El usuario ya existe use otro nombre de usuario."
				},
				user_password_new:{
					required: "Tiene que introducir una contraseña.",
					minlength: "La contraseña debe tener al menos 6 caracteres."
				},
				user_password_repeat:{
					required: "Tiene que introducir una contraseña.",
					minlength: "La contraseña debe tener al menos 6 caracteres.",
					equalTo: "Las contraseña no coincide."
				},
				user_email:{
					required: "Es necesario un correo electronico.",
					remote: "El E-mail ya existe use otro."
				}
			},
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
					data: $("#guardar_usuario").serialize(),
					url: "ajax/nuevo_usuario.php",
					type: "post",
					beforeSend: function() {
						$("#resultados_ajax").html(progreso);
					},
					success: function(response) {
						var respuesta="";						
						if(response==1){
							limpiar();
							mensajes_alerta('DATOS ALMACENADOS CORRECTAMENTE !!','success','REGISTRO DE NUEVO USUARIO');
							$('#myModal_registro').modal('hide');
							$('#resultados').empty();
							$('#resultados').load('ajax/lista_usuarios.php');
							$("#resultados_ajax").empty();
						}else{
							respuesta="<script>"+
											"mensajes_alerta('ERROR REGISTRAR LOS DATOS !!','error','REGISTRO DE NUEVO USUARIO');"+
										"</script>";
							$("#resultados_ajax").html(respuesta);
						}
						
					}
				});
			}
		});
	});
	$('#actualizar_datos').click(function(event) {
		validacion=$("#editar_usuario").validate( {
			debug: true,
			onkeyup: false,
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
				$.ajax({
					data: $("#editar_usuario").serialize(),
					url: "ajax/editar_usuario.php",
					type: "post",
					success: function(response) {
						var respuesta="";						
						if(response==1){
							mensajes_alerta('DATOS EDITADOS CORRECTAMENTE !!','success','EDITAR USUARIO');
							$('#myModal2').modal('hide');
							$('#resultados').empty();
							$('#resultados').load('ajax/lista_usuarios.php');
						}else{
							mensajes_alerta('ERROR AL EDITAR LOS DATOS !!','error','EDITAR USUARIO');
						}
						
					}
				});
			}
		});
	});
	$('#actualizar_datos3').click(function(event) {
		validacion=$("#editar_password").validate( {
			debug: true,
			onkeyup: false,
			rules: {
				user_password_new3:{
					required: true,
					minlength: 6
				},
				user_password_repeat3:{
					equalTo: "#user_password_new3",
					minlength: 6
				}
			},
			messages: {
				user_password_new3:{
					required: "Tiene que introducir una contraseña.",
					minlength: "La contraseña debe tener al menos 6 caracteres."
				},
				user_password_repeat3:{
					required: "Tiene que introducir una contraseña.",
					minlength: "La contraseña debe tener al menos 6 caracteres.",
					equalTo: "Las contraseña no coincide."
				}
			},
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
				$.ajax({
					data: $("#editar_usuario").serialize(),
					url: "ajax/editar_password.php",
					type: "post",
					success: function(response) {
						var respuesta="";						
						if(response==1){
							mensajes_alerta('DATOS EDITADOS CORRECTAMENTE !!','success','EDITAR USUARIO');
							$('#myModal2').modal('hide');
							
						}else{
							mensajes_alerta('ERROR AL EDITAR LOS DATOS !!','error','EDITAR USUARIO');
						}
						
					}
				});
			}
		});
	});
	$('#btnconfirmar').click(function(event) {
		var id=$('#cod_user').val();
		$.ajax({
			url: 'ajax/eliminar_usuario.php',
			type: 'POST',
			data: {
				id_user: id
			},
			success: function(datos){
				if(datos==1){
					mensajes_alerta('USUARIO ELIMINADO CORRECTAMENTE !!','success','ELIMINAR USUARIO');
				}else{
					mensajes_alerta('ERROR AL ELIMINAR AL USUARIO !!','error','ELIMINAR USUARIO');
				}
				$('#modal_confirmar').modal('hide');
				$('#resultados').empty();
				$('#resultados').load('ajax/lista_usuarios.php');
			}
		});
	});
});

function limpiar(){
	$('#firstname').val('');
	$('#lastname').val('');
	$('#user_name').val('');
	$('#user_email').val('');
	$('#user_password_new').val('');
	$('#user_password_repeat').val('');
	validacion.resetForm();
}
function obtener_datos(id){
	$.ajax({
		url: 'ajax/datos_usuarios.php',
		type: 'POST',
		dataType: "json",
		data: {id_user: id},
		success: function(datos){
			$("#firstname2").val(datos['usuario']['name']);
			$("#mod_id").val(datos['usuario']['id']);
			$("#user_name2").val(datos['usuario']['login']);
			$("#user_email2").val(datos['usuario']['email']);
			//console.log(datos['usuario']['name']);
		}
	});
}

function cambiarPass(id){
	$('#user_id_mod').val(id);
}

