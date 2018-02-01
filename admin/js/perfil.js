$(document).ready(function() {
	$('#frm_perfil').validate({
		debug: true,
		rules: {
			email:{
				required: true,
				email: true,
				remote: {
                    url: "ajax/verifica.php",
                    type: 'post',
                    data: {
                        email: function() {
                            return $("#email").val();
                        },
                        tipo: 'perfil'
                    }
                }
			},
			user: {
				required: true,
				minlength: 3,
				remote: {
                    url: "ajax/verifica.php",
                    type: 'post',
                    data: {
                        usuario: function() {
                            return $("#user").val();
                        },
                        tipo: 'perfil'
                    }
                } 
			},
			password_new:{				
				minlength: 6
			},
			password_new_rep:{
				equalTo: "#password_new",
				minlength: 6
			},
			
		},
		messages: {
			user:{
				required: "Es necesario un nombre de usuario.",
				remote: "El usuario ya existe use otro nombre de usuario."
			},
			password_new:{
				minlength: "La contraseña debe tener al menos 6 caracteres."
			},
			password_new_rep:{
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
		submitHandler: function (form) {alert("exito");
			var progreso='<div class="progress progress-striped active">'+
							'<div class="progress-bar  bg-theme-inverse" role="progressbar" '+
										'aria-valuenow="20" aria-valuemin="0" aria-valuemax="45" style="width: 100%">'+
								'<div class="progress-label">'+
									'<h5><strong>Procesando por favor espere...</strong></h5></div></div></div>';
			$.ajax({
				data: $("#frm_perfil").serialize(),
				url: "ajax/editar_perfil.php",
				type: "post",
				beforeSend: function() {
					$("#resultado").html(progreso);
				},
				success: function(response) {
					$("#resultado").empty();
					if(response==1){
						setTimeout(function(){window.location.href='login.php?logout';}, 3000);
						mensajes_alerta('DATOS MODIFICADOS EXITOSAMENTE, se cerrara la sesion !! ','success','MODIFICAR PERFIL');
					}else{
						mensajes_alerta('ERROR AL MODIFICAR DATOS !! ','error','MODIFICAR PERFIL');						
					}
				}
			});
		}
	});
});



			