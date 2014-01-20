  <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();?>/assets/assets_admin/js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="<?php echo base_url();?>/assets/assets_admin/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="<?php echo base_url();?>/assets/assets_admin/js/app.js"></script>
  <script src="<?php echo base_url();?>/assets/assets_admin/js/app.plugin.js"></script>
  <script src="<?php echo base_url();?>/assets/assets_admin/js/app.data.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
	  $("#enviar_newApp").click(function(){
	    var data = {
	      action      : 2
	    };
	    var ajaxurl = '<?php echo base_url();?>administrador_controller/ws_admin';
	    $.post(ajaxurl,data, function(rsp) {
	      alert(rsp);
	      /*if ( rsp == "correcto") {
	        location.href = '<?php echo base_url();?>app_agatha/gracias';
	      }else{alert("error");}*/
	    });
	  });
	});	
  </script>
</body>
</html>