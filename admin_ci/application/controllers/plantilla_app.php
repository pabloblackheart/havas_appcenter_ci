<?php
class Plantilla_app extends CI_Controller {
	public function __construct(){	  
      parent::__construct();
   	  
   	  $this->load->helper('url');
   	  $this->load->model('plantilla_model');
	  $this->load->library('session');

   	  $fb_config = array(
	    'appId'  => APP_ID,
	    'secret' => APP_SECRET
	  );

   	  $this->load->library('fb/facebook.php',$fb_config);
    }

   function index(){

	  if ($this->input->get('fb_source') == 'bookmark_apps' && $this->input->get('ref') == 'bookmarks') {
	    echo "<script type='text/javascript'>top.location.href='".FANPAGE."app_".APP_ID."';</script>";
	  }

	  if ($this->input->get('ref') == 'reminders' || $this->input->get('fb_source') == 'search' || $this->input->get('app_request_type') == 'user_to_user' || $this->input->get('fb_source') == 'feed'){
		echo "<script type='text/javascript'>top.location.href='".FANPAGE."app_".APP_ID."';</script>";
	  }

	  $signed_request	= $this->facebook->getSignedRequest();
	  //$user 			= $this->facebook->getUser();

	  if ($signed_request['page']['liked'] == '1') {
	 	$this->load->view('plantilla_app/inicio');
	  } else {
		//print_r($_GET);
		$this->load->view('plantilla_app/nofan');
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
			$this->session->set_userdata('nombre_completo', $nombre_completo);
			$this->session->set_userdata('email', $email);


		  	if( $this->plantilla_model->verificaUsuario($uid) > 0){
		  	  echo "Existe";
			}else{
		  	  $this->plantilla_model->inserta_usuario($nombre_completo, $uid);
		  	  echo "Nuevo";
			}
	   	  }
   	  	  break;
   	  	case 2:
			$nombre    = $this->input->post('nombre');
			$email     = $this->input->post('email');
			$telefono  = $this->input->post('telefono');
			$direccion = $this->input->post('direccion');

   	  		if($this->plantilla_model->actualiza_datos( $this->session->userdata('uid'),$nombre, $email, $telefono, $direccion)){
   	  		  echo "correcto";
   	  		}else{
   	  		  echo "incorrecto";
   	  		}
   	  		break;
   	  }
   }

   function formulario(){
      $this->load->view('plantilla_app/formulario');
   }

   function gracias(){
      $this->load->view('plantilla_app/gracias');
   }
}
?>