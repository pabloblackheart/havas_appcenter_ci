  <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();?>/assets/assets_admin/js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="<?php echo base_url();?>/assets/assets_admin/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="<?php echo base_url();?>assets/assets_admin/js/app.js"></script>
  <script src="<?php echo base_url();?>assets/assets_admin/js/app.plugin.js"></script>
  <script src="<?php echo base_url();?>assets/assets_admin/js/app.data.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
	  $("#form_new_app").validate({
		rules: {
			app_name   : {	required: true },
			app_id     : {	required: true },
			app_secret : {	required: true }
		},
		submitHandler: function() {
	  	  var formulario = $('#form_new_app').serialize();
	      var data = {
	        formulario  : formulario,
	        action      : 1
	      };

	      var ajaxurl = '<?php echo base_url();?>administrador_controller/ws_admin';
	      $.post(ajaxurl,data, function(rsp) {
	        if ( rsp == "correcto") {
	          $('#form_new_app').each (function(){
		        this.reset();
		      });
			  $(".alert-success").fadeIn(function(){
			  $(this).delay(3000).fadeOut();
			});
	        }else{
			  $(".alert-danger").fadeIn(function(){
			    $(this).delay(3000).fadeOut();
			  });
	        }
	      });
		}
	  });
	});
  </script>
</body>
</html>