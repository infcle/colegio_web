$(document).ready(function() {
	$('#btnguardar').click(function(event) {
		$("#datos_publicacion").validate( {
			debug: true,
			//onkeyup: false,
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
				
				var parametros = new FormData($('#datos_publicacion')[0]);
				$.ajax({
					url: "ajax/editar_publicacion.php",
					type: "POST",
					data: parametros,
					contentType: false,
					processData:false,
					beforeSend: function() {
						$("#resultado").html(progreso);
					},
					success: function(respuesta)
					{
						if(respuesta==1){						
							setTimeout(function(){window.location.href='index.php';}, 1500);
							mensajes_alerta('DATOS ALMACENADOS CORRECTAMENTE !! ','success','REGISTRO DE COCURRICULAR');
						}else{
							respuesta="<script>"+
										"mensajes_alerta('NO SE PUDO REGISTRAR LOS DATOS !!','error','REGISTRO DE COCURRICULAR');"+
									"</script>";
							$("#resultado").html(respuesta);
						}
					}
				});
			}
		});
	});

	$("#imagefile").fileinput({		
		language: "es",
		showRemove: false,
	    showUpload: false,
	    showDownload: false,
	    showZoom: false,
	    showDrag: false,
		maxFileCount : 1,		
		browseClass: "btn btn-success",
		allowedFileExtensions: ["jpg", "gif", "png"],
		initialCaption: obtNombre(),
		initialPreview: [
        	"<img src='../contenido/imagenes/"+obtNombre()+"' class='file-preview-image' alt='Desert' title='imagen post' style='width:auto;height:auto;max-width:100%;max-height:100%;'>",
    	],
    	initialPreviewConfig: [
		    {
		        caption: obtNombre(),
		        width: '120px', 
		        //url: 'http://localhost/avatar/delete', // server delete action 
		        key: obtNombre(), 
		        extra: {id: obtNombre()}
		    }
		]
	});
});

function obtNombre(){
	var nombre=$('#img_nombre').val();
	return nombre;
}