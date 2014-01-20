<?php include ("header.php"); ?>
<a href="https://www.facebook.com/hmgdev/app_714805905210442" target="_top">volver</a>
<h1>listado</h1>
<?php if (count($preguntas)>0){ ?>
<?php foreach($preguntas as $item): ?>
  <img src="https://graph.facebook.com/<?php echo $item['agathaEneroRespuestasUsuario_uid'];?>/picture" />
  <?php if( $getPorcentaje = $this->model_agatha->getPorcentaje($this->session->userdata('uid'),$item['agathaEneroRespuestasUsuario_uid']) ){ ?>
  <?php echo $getPorcentaje[0]["agathaEneroRespuestas_porcentaje"]."%"; ?>
  <?php }else{?>
  <a href="single_test?uid=<?php echo $item['agathaEneroRespuestasUsuario_uid'];?>">Ir al test</a><br>
  <?php } ?>
<?php endforeach; ?>
<?php }else{
	echo "<span>No hay tests disponibles</span>";
	} ?>
<?php include ("footer.php"); ?>