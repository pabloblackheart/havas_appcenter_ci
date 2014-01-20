<?php
class App_agatha extends CI_Controller {
	public function __construct(){
      parent::__construct();

   	  $this->load->helper('url');
   	  $this->load->model('model_agatha');
	  $this->load->library('session');

   	  $fb_config = array(
	    'appId'  => APP_ID,
	    'secret' => APP_SECRET
	  );

   	  $this->load->library('fb/facebook.php',$fb_config);
    }

   function index(){
	  $signed_request	= $this->facebook->getSignedRequest();
	  $this->session->set_userdata('uid', $this->facebook->getUser());

	  if ($this->input->get('fb_source') == 'bookmark_apps' && $this->input->get('ref') == 'bookmarks') {
	    $this->session->set_userdata('invitado', "si");
	    echo "<script type='text/javascript'>top.location.href='".FANPAGE."app_".APP_ID."';</script>";
	    die();
	  }

	  if ($this->input->get('ref') == 'reminders' || $this->input->get('fb_source') == 'search' || $this->input->get('app_request_type') == 'user_to_user' || $this->input->get('fb_source') == 'feed'){
	    $this->session->set_userdata('invitado', "si");
		echo "<script type='text/javascript'>top.location.href='".FANPAGE."app_".APP_ID."';</script>";
	    die();
	  }

	  //$user 			= $this->facebook->getUser();

	  if ($signed_request['page']['liked'] == '1') {
	 	$participo = $this->model_agatha->verificaUsuarioParticipacion( $this->facebook->getUser() );
		$datos = array(
		  'participo' => $participo
		);
   	    $this->load->view('view_agatha/inicio',$datos);
	  } else {
		//print_r($_GET);
		$this->load->view('view_agatha/nofan');
	  }
   }


   function ws_app(){

   	  $action = $this->input->post('action');
   	  switch ($action) {
   	  	case 1:
	   	  if($_POST){
  	   	    $token = $this->input->post('token');
	   	    $uid = $this->input->post('uid');

	   	  	extract($_POST);
	  	  	$urlFbFeed = 'https://graph.facebook.com/me/?access_token='.$token;
		  	$ch = curl_init();
		  	curl_setopt($ch, CURLOPT_URL, $urlFbFeed);
		 	curl_setopt($ch, CURLOPT_POST, 0);
		  	curl_setopt($ch, CURLOPT_HEADER, 0);
		  	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		  	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
		  	$jsonFbAlbum = curl_exec($ch);
		  	$objJsonDedocde = json_decode($jsonFbAlbum,true);
		  	@extract( $objJsonDedocde );

	   	  	$nombre_completo = $first_name." ".$last_name;
	   	  	$this->session->set_userdata('uid', $uid);
			//$this->session->set_userdata('uid', $uid);
			$ip = $_SERVER['REMOTE_ADDR'];

		  	if( $this->model_agatha->verificaUsuario($uid) > 0){
		  	  if( $this->model_agatha->verificaUsuarioParticipacion($uid) > 0){
		  	    echo "participo";
			  }else{
		  	    echo "Nuevo";
			  }
			}else{
		  	  $this->model_agatha->insertaUsuario($uid,$nombre_completo,$email,$gender,$link,$ip);
		  	  echo "Nuevo";
			}
	   	  }
   	  	  break;
   	  	case 2:
			$id_invitado    = $this->input->post('id_invitado');
			$respuestas    = $this->input->post('respuestas');

   	  		if( $this->model_agatha->ingresaPreguntas( $this->session->userdata('uid'),$id_invitado,$respuestas ) ){
   	  		  echo "correcto";
   	  		}else{
   	  		  echo "incorrecto";
   	  		}
   	  		break;
   	  	case 3:
   	  		$uid_usuario_test = $this->input->post('uid_usuario_test');
   	  		$porcentaje = $this->input->post('porcentaje');

   	  		if( $this->model_agatha->ingresaRespuestas( $this->session->userdata('uid'),$uid_usuario_test,$porcentaje ) ){
   	  		  echo "correcto";
   	  		}else{
   	  		  echo "incorrecto";
   	  		}

			//echo $uid_usuario_test;
   	  		break;
   	  }
   }

   function preguntas(){
     $this->load->view('view_agatha/preguntas');
   }

   function gracias(){
      $this->load->view('view_agatha/gracias');
   }

   function listado_test(){
   	  $getListadoTest = $this->model_agatha->getListadoTest($this->session->userdata('uid'));
      $data = array(
        'preguntas' => $getListadoTest
      );
      $this->load->view('view_agatha/listado_test', $data);
   }

   function single_test(){
   	  $getPreguntasUsuarioSingle = $this->model_agatha->getPreguntasSingle($this->session->userdata('uid'),$this->input->get('uid'));

      $data = array(
        'preguntas' => $getPreguntasUsuarioSingle
      );
      $this->load->view('view_agatha/single_test', $data);
   }
}
?>