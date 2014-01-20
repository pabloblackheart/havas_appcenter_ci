<?php include ("header.php"); ?>
  <script type="text/javascript">
	$(document).ready(function(){
      $("#guardar").click(function(){
      	$('#form_registro').submit();
      });

	$("#form_registro").validate({
		rules: {
			nombre     : { required: true },
			email 	   : { required: true, email: true },
			telefono   : { required: true },
			direccion  : { required: true }
		},
		submitHandler: function() {
			//var formulario = $('#form_registro').serialize();
			var data = {
				nombre    : $("#nombre").val(),
				email     : $("#email").val(),
				telefono  : $("#telefono").val(),
				direccion : $("#direccion").val(),
				action    : 2
			};
		    var ajaxurl = '<?php echo base_url();?>plantilla_app/ws_app';
		    $.post(ajaxurl,data, function(e) {
		      if ( e == "correcto") {
		        location.href = '<?php echo base_url();?>plantilla_app/gracias';
		      }else{alert("error");}
		    });
		}
	});

	});	
  </script>
  <div>
	<form name="form_registro" id="form_registro" method="post" action="">
  	  <p>
	    <input type="text" name="nombre" id="nombre" maxlength="150" placeholder="Nombre" onkeypress="return validatxt(event)" value="<?php echo $this->session->userdata('nombre_completo'); ?>" />
	  </p>
  	  <p>
	    <input type="text" name="email" id="email" maxlength="200" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>" disabled/>
	  </p>
	  <p>
	    <input type="text" name="telefono" id="telefono" onkeypress="return validanum(event)" maxlength="15" placeholder="Teléfono" />
	  </p>
	  <p>
	    <input type="text" name="direccion" id="direccion" maxlength="200" placeholder="Dirección" />
	  </p>
	  <a href="#" id="guardar">Enviar</a>
	</form>
  </div>
<?php include ("footer.php"); ?>