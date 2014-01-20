<?php include ("header.php"); ?>
  <script type="text/javascript">
  var respuestas = Array();
  $(document).ready(function(){

      $(".enviartest").click(function(){
        FB.ui({ method: 'apprequests',
          message: '<%= @app.invite_message %>',
          filters: ['app_non_users'],
          title: 'Invitación',
          max_recipients: '50'
        },requestCallback);
      });

      $(".siguiente").click(function(){
      	var current = $(this).attr("rel");
      	var next_preg = parseInt(current)+1;
      	
      	if (current < 5) {
          respuestas.push(new Array( $("#preg_"+current+"_1").val(),$("#preg_"+current+"_2").val(),$("#preg_"+current+"_3").val() ) );

          $("#pregunta_"+current).hide();
          $("#pregunta_"+next_preg).fadeIn();
        }else{
          respuestas.push(new Array( $("#preg_"+current+"_1").val(),$("#preg_"+current+"_2").val(),$("#preg_"+current+"_3").val() ) );
      	  $("#contenedor_preguntas").hide();
      	  $("#contenedor_invitar").fadeIn();
      	}
      });

	});

  function requestCallback(response) {
    var data = {
  	  id_invitado : response.to,
  	  respuestas  : respuestas,
  	  action      : 2
    };
    var ajaxurl = '<?php echo base_url();?>app_agatha/ws_app';
    $.post(ajaxurl,data, function(rsp) {
      //alert(rsp);
      if ( rsp == "correcto") {
        location.href = '<?php echo base_url();?>app_agatha/gracias';
      }else{alert("error");}
    });
  }
  </script>
<div id="contenedor_preguntas" class="contenedor preguntas">
  <!-- PREGUNTA 1 -->
  <div id="pregunta_1" class="pregunta_uno">
    <div class="paso1"></div>
      <label><img src="../includes/img/pregunta_banda.png" /></label>
      <input type="text" class="campo_grande" id="preg_1_1"/>
      <br />
      <input type="text" class="campo_peque izquierda" id="preg_1_2" />
      <input type="text" class="campo_peque derecha" id="preg_1_3" />
      <a href="#" class="siguiente enviar" rel="1"></a>
  </div>
  <!-- FIN PREGUNTA 1 -->
  <!--PREGUNTA 2-->
  <div id="pregunta_2" class="pregunta_dos" style="display:none;">
    <div class="paso2"></div>
      <label style="left: 113px;"><img src="../includes/img/pregunta_serie.png"/></label>
      <input type="text" class="campo_grande" id="preg_2_1"/>
      <br />
      <input type="text" class="campo_peque izquierda" id="preg_2_2"/>
      <input type="text" class="campo_peque derecha" id="preg_2_3"/>
      <a href="#" class="siguiente enviar" rel="2"></a>
  </div>
  <!--FIN PREGUNTA 2-->

  <!--PREGUNTA 3-->
  <div id="pregunta_3" class="pregunta_tres" style="display:none;">
    <div class="paso3"></div>
      <label style="left: 190px;"><img src="../includes/img/pregunta_comida.png" /></label>
      <input type="text" class="campo_grande" id="preg_3_1"/>
      <br />
      <input type="text" class="campo_peque izquierda" id="preg_3_2"/>
      <input type="text" class="campo_peque derecha" id="preg_3_3"/>
      <a href="#" class="siguiente enviar" rel="3"></a>
  </div>
  <!--FIN PREGUNTA 3-->

  <!--PREGUNTA 4-->
  <div id="pregunta_4" class="pregunta_cuatro" style="display:none;">
    <div class="paso4"></div>
      <label style="left: 120px;"><img src="../includes/img/pregunta_deporte.png" /></label>
      <input type="text" class="campo_grande" id="preg_4_1"/>
      <br />
      <input type="text" class="campo_peque izquierda" id="preg_4_2"/>
      <input type="text" class="campo_peque derecha" id="preg_4_3"/>
      <a href="#" class="siguiente enviar" rel="4"></a>
  </div>
  <!--FIN PREGUNTA 4-->


  <!--PREGUNTA 5-->
  <div id="pregunta_5" class="pregunta_cinco" style="display:none;">
    <div class="paso5"></div>
      <label style="left: 50px;"><img src="../includes/img/pregunta_perfume.png" /></label>
      <input type="text" class="campo_grande" id="preg_5_1"/>
      <br />
      <input type="text" class="campo_peque izquierda" id="preg_5_2"/>
      <input type="text" class="campo_peque derecha" id="preg_5_3"/>
      <a href="#" class="siguiente enviar" rel="5"></a>
  </div>
  <!--FIN PREGUNTA 2-->
</div>
<!-- CONTENEDOR TEST-->
<div id="contenedor_invitar" class="contenedor test" style="display:none;">
  <a class="enviartest" href="#"></a>
</div>
<!--FIN CONTENEDOR TEST-->
<?php include ("footer.php"); ?>