<?php include ("header.php"); ?>
<script type="text/javascript">	
	$(document).ready(function() {
		$("#participar").click(function(e){
		e.preventDefault();
			FB.login(function(response) {
			  if (response.authResponse) {
				sessionFB = response.authResponse;
				var data = {
					action      : 1,
					token       : sessionFB.accessToken,
					session_key : sessionFB.signedRequest,
					uid 		: sessionFB.userID
				};
				var ajaxurl = '<?php echo base_url();?>plantilla_app/ws_app';
				$.post(ajaxurl,data, function(e) {
				  location.href = '<?php echo base_url();?>plantilla_app/formulario';
				});
			  } else {
				 // espacio para alerta en caso de que el usuario no acepte la app
			  }
			}, { scope:'email,publish_stream,offline_access' }); // http://developers.facebook.com/docs/reference/api/permissions/ (todos los permisos)
		});
	});
</script>
  <a href="javascript:void(0);" id="participar">Inicio</a>
<?php include ("footer.php"); ?>