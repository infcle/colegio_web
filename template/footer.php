<!-- Footer contact -->
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12" id="m-contact" data-animated="0">
			<h3>Envianos un mensaje</h3>

			<form class="contact-form" data-animated="0" id="contactForm" action="assets/php/contact.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="mc-name">
							<input type="text" name="senderName" id="senderName" placeholder="Nombre" Required>
							<span><i class="fa fa-user"></i></span>
						</div>
						<div class="mc-email">
							<input type="email" name="senderEmail" id="senderEmail" placeholder="Dirrecion Email" Required>
							<span><i class="fa fa-envelope-o"></i></span>
						</div>
						<div class="mc-website">
							<input type="text" name="subject" id="subject" placeholder="Asunto">
							<span><i class="fa fa-link"></i></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mc-message">
							<textarea name="message" id="message" placeholder="Mensaje" Required></textarea>
							<button type="submit"><span>Enviar</span></button>
						</div>
					</div>
				</div>
			</form>
			<div id="successMessage" class="successmessage">
				<p><span class="success-ico"></span> Gracias por enviar su mensaje</p>
			</div>
			<div id="failureMessage" class="errormessage">
				<p><span class="error-ico"></span> Hubo un error en el envio de su mensaje. Por favor intente otra vez.</p>
			</div>
			<div id="incompleteMessage" class="statusMessage">
				<p>Por favor complete todos los campos.</p>
			</div>

			<div class="contact-info" data-animated="0">
				<h4>Informacion de contacto</h4>
				<ul>
					<li><i class="fa fa-home"></i> Ciudad de el alto - Zona Santa Rosa Calle 4 # 1004</li>
					<li><i class="fa fa-phone"></i> poner numero</li>
					<li><i class="fa fa-envelope"></i> poner correo electronico</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Footer - copyright -->
<footer data-animated="0">
	<p>&copy; 2017 Sergio. Todos los derechos Reservados</p>
	<a href="#page-top" class="backtotop-icon page-scroll"></a>
</footer>
</div>
		<!-- Right Main Content - END -->
	</div>
</div>
<!-- Outer-wrap - END -->

<!-- jQuery -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/js/easytabs/easyResponsiveTabs.js"></script>
<script src="assets/js/jflickrfeed.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/flex-slider/jquery.flexslider.js"></script>
<script src="assets/js/jCProgress-1.0.3.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/jquery.inview.js"></script>
<script src="assets/js/jquery.prettyphoto.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/main.js"></script>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/js/gmaps.js"></script>
<script src="assets/js/script.js"></script>
<script>
	//$(document).ready(function() {
		$('#img_historia').carousel({
			  interval: 1500
			});
	//});

</script>
</body>
</html>
