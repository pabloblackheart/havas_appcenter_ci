<?php include ("header.php"); ?>
<?
  $delete = array('"', '[', ']');
  $onlyquestion = str_replace($delete, "", $preguntas[0]['agathaEneroRespuestasUsuario_respuestas']);
  
  $preguntas_single = explode(",", $onlyquestion);
  $counter = 1;
  $counter_array = 1;
  foreach($preguntas_single as $pregunta):
    if ($counter == 1){ $array[$counter_array] = array(); $preg = ""; }
    if ($counter<3) {
  	  array_push($array[$counter_array], $pregunta);
    }else{
  	  array_push($array[$counter_array], $pregunta);
  	  $counter=0;
  	  $counter_array=$counter_array+1;
    }
    $counter=$counter+1;
  endforeach;
  $correcto1 = $array[1][0];
  $correcto2 = $array[2][0];
  $correcto3 = $array[3][0];
  $correcto4 = $array[4][0];
  $correcto5 = $array[5][0];
?>
<script type="text/javascript">
  $(document).ready(function(){
    $(".preguntas a").click(function(){
  	  var resp  = $(this).html();
      if (resp !="Siguiente"){
  	    var current   = $(this).attr("rel");
  	    var next_preg = parseInt(current)+1;

  	    if(current < 5) {
          $("#pregunta_"+current).hide();
          $("#pregunta_"+next_preg).fadeIn();
          $("#preg_"+current).val(resp);
        }else{
          $("#preg_"+current).val(resp);
          var correcto1="<?php echo $correcto1;?>";
          var correcto2="<?php echo $correcto2;?>";
          var correcto3="<?php echo $correcto3;?>";
          var correcto4="<?php echo $correcto4;?>";
          var correcto5="<?php echo $correcto5;?>";
          var porcentaje =0;

          if (correcto1 == $("#preg_1").val() ) { porcentaje = porcentaje + 20; }
          if (correcto2 == $("#preg_2").val() ) { porcentaje = porcentaje + 20; }
          if (correcto3 == $("#preg_3").val() ) { porcentaje = porcentaje + 20; }
          if (correcto4 == $("#preg_4").val() ) { porcentaje = porcentaje + 20; }
          if (correcto5 == $("#preg_5").val() ) { porcentaje = porcentaje + 20; }

	        var data = {
            uid_usuario_test : "<?php echo $preguntas[0]['agathaEneroRespuestasUsuario_uid'];?>",
	  	      porcentaje : porcentaje,
	  	      action      : 3
	        };
	        var ajaxurl = '<?php echo base_url();?>app_agatha/ws_app';
	        $.post(ajaxurl,data, function(rsp){
	          alert(rsp);
	          /*if ( rsp == "correcto") {
	            location.href = '<?php echo base_url();?>app_agatha/gracias';
	          }else{alert("error");}*/
	        });
  	    }
      }else{alert("siguiente");}
  	});
  });
</script>
<h1>Single Test</h1>
  <img src="https://graph.facebook.com/<?php echo $preguntas[0]['agathaEneroRespuestasUsuario_uid'];?>/picture" /><br>
  <div id="pregunta_1" >
    <?php  shuffle( $array[1] ); ?>
    <P>¿Pregunta 1?</P>
    <div id="pregunta1" class="preguntas">
      <a href="#" rel="1"><?php echo $array[1][0]; ?></a>
      <a href="#" rel="1"><?php echo $array[1][1]; ?></a>
      <a href="#" rel="1"><?php echo $array[1][2]; ?></a>
      <input type="hidden" id="preg_1">
      <a href="#" class="siguiente">Siguiente</a>
    </div>
  </div>
  <div id="pregunta_2" style="display:none;">
    <?php  shuffle( $array[2] ); ?>
    <P>¿Pregunta 2?</P>
    <div id="pregunta2" class="preguntas">
      <a href="#" rel="2"><?php echo $array[2][0]; ?></a>
      <a href="#" rel="2"><?php echo $array[2][1]; ?></a>
      <a href="#" rel="2"><?php echo $array[2][2]; ?></a>
      <input type="hidden" id="preg_2">
      <a href="#" class="siguiente">Siguiente</a>
    </div>
  </div>
  <div id="pregunta_3" style="display:none;">
    <?php  shuffle( $array[3] ); ?>
    <P>¿Pregunta 3?</P>
    <div id="pregunta3" class="preguntas">
      <a href="#" rel="3"><?php echo $array[3][0]; ?></a>
      <a href="#" rel="3"><?php echo $array[3][1]; ?></a>
      <a href="#" rel="3"><?php echo $array[3][2]; ?></a>
      <input type="hidden" id="preg_3">
      <a href="#" class="siguiente">Siguiente</a>
    </div>
  </div>
  <div id="pregunta_4" style="display:none;">
    <?php  shuffle( $array[4] ); ?>
    <P>¿Pregunta 4?</P>
    <div id="pregunta4" class="preguntas">
      <a href="#" rel="4"><?php echo $array[4][0]; ?></a>
      <a href="#" rel="4"><?php echo $array[4][1]; ?></a>
      <a href="#" rel="4"><?php echo $array[4][2]; ?></a>
      <input type="hidden" id="preg_4">
      <a href="#" class="siguiente">Siguiente</a>
    </div>
  </div>
  <div id="pregunta_5" style="display:none;">
    <?php  shuffle( $array[5] ); ?>
    <P>¿Pregunta 5?</P>
    <div id="pregunta5" class="preguntas">
      <a href="#" rel="5"><?php echo $array[5][0]; ?></a>
      <a href="#" rel="5"><?php echo $array[5][1]; ?></a>
      <a href="#" rel="5"><?php echo $array[5][2]; ?></a>
      <input type="hidden" id="preg_5">
      <a href="#" class="siguiente">Siguiente</a>
    </div>
  </div>
<?php include ("footer.php"); ?>