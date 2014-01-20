<?php include ("header.php"); ?>
	<script type="text/javascript">	
		$(document).ready(function() {
			$(".participar,.invitado").click(function(e){
			e.preventDefault();
			    var class_btn = $(this).attr("class");
				FB.login(function(response) {
				  if (response.authResponse) {
					sessionFB = response.authResponse;
					var data = {
						action      : 1,
						token       : sessionFB.accessToken,
						session_key : sessionFB.signedRequest,
						uid 		: sessionFB.userID
					};
					var ajaxurl = '<?php echo base_url();?>app_agatha/ws_app';
					$.post(ajaxurl,data, function(e) {
					  if (e == "participo"){
					  	if (class_btn == "participar") {
  					      location.href = '<?php echo base_url();?>app_agatha/gracias';
					  	}else{
					      location.href = '<?php echo base_url();?>app_agatha/listado_test';
					  	}
					  }else{
					  	if (class_btn == "participar") {
					      location.href = '<?php echo base_url();?>app_agatha/preguntas';
					  	}else{
					      location.href = '<?php echo base_url();?>app_agatha/listado_test';
					  	}
					  }
					});
				  } else {
					 // espacio para alerta en caso de que el usuario no acepte la app
				  }
				}, { scope:'email,publish_stream,offline_access' }); // http://developers.facebook.com/docs/reference/api/permissions/ (todos los permisos)
			});
		});
	</script>
	<div class="contenedor fan">
      <?php if ($participo==0){?>
	    <a href="#" class="participar"></a>
      <?php }else{?>
        <a href="#" class="invitado">Contestar Test</a>
      <?php }?>
	</div>
<?php include ("footer.php"); ?>