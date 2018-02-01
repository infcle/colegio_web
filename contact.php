<?php require('template/header.php'); ?>
	<!-- Page Header -->
	<div class="row">
		<div class="col-md-12">
			<div id="page-header" data-animated="0">
				<h3><span>Contactenos</span></h3>
				<ul class="bread_crumbs">
					<li><a href="index.php">Inicio</a></li>
					<li>contactos</li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- Contact Content -->
	<div class="row">
		<div class="col-md-12">
			<div id="contact-form" >
				<div class="row">
				
					<!-- Google Map -->
					<div class="col-md-6" data-animated="0">
						<div class="map">
							<div class="gmap">
								<div id="map"></div>
							</div>
						</div>
					</div>
					
					<!-- Contact Form -->
					<div class="col-md-6" data-animated="0">
						<h3>Envie un nuevo mensaje</h3>
						
						<form class="contact-form" data-animated="0" id="contactForm" action="php/contact.php" method="post">
							<div class="mc-name">
								<input type="text" name="senderName" id="senderName" placeholder="name" Required>
								<span><i class="fa fa-user"></i></span>
							</div>
							<div class="mc-email">
								<input type="email" name="senderEmail" id="senderEmail" placeholder="Email Address" Required>
								<span><i class="fa fa-envelope-o"></i></span>
							</div>
							<div class="mc-website">
								<input type="text" name="subject" id="subject" placeholder="subject">
								<span><i class="fa fa-link"></i></span>
							</div>
							<div class="mc-message">
								<textarea name="message" id="message" placeholder="Message" Required></textarea>
								<button type="submit"><span>Enviar</span></button>
							</div>
						</form>
						<div id="successMessage" class="successmessage">
							<p><span class="success-ico"></span> ¡Gracias por enviar su mensaje! Nos pondremos en contacto con usted en breve.</p>
						</div>
						<div id="failureMessage" class="errormessage">
							<p><span class="error-ico"></span> Hubo un problema al enviar su mensaje. Inténtalo de nuevo.</p>
						</div>
						<div id="incompleteMessage" class="statusMessage">
							<p>Por favor complete todos los campos en el formulario antes de enviar.</p>
						</div>

					</div>
				</div>
				
				<!-- Contact Info -->
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 cf-info" data-animated="0">
							<h3>Datos de contacto</h3>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris morbi accumsan ipsum velit. Nam nec tellus a odio.</p>
							<ul>
								<li>
									<span><i class="fa fa-home"></i></span>
									<h5>Ciudad de el alto - zona santa rosa calle 4 # 150</h5>
								</li>
								<li>
									<span><i class="fa fa-phone"></i></span>
									<h5>poner numero</h5>
								</li>
								<li>
									<span><i class="fa fa-envelope"></i></span>
									<h5>poner correo electronico</h5>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Content -->

<?php require('template/footer.php'); ?>
