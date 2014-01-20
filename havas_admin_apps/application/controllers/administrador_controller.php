<?php
class Administrador_controller extends CI_Controller{

  public function __construct(){
    parent::__construct();
   	$this->load->helper('url');
   	$this->load->model('administrador_model');
  }

  public function index(){
    $this->load->view('administrador_view/index');
  }

  public function all_apps(){
   	$getListadoApp = $this->administrador_model->getListadoApp();
    $data = array(
      'aplicaciones' => $getListadoApp
    );
    $this->load->view('administrador_view/all_apps', $data);
  }

  public function new_app(){
    $this->load->view('administrador_view/new_app');
  }

  public function ws_admin(){
    echo "string";
  }

}
?>