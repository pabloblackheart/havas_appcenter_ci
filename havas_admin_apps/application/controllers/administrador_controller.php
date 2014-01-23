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
    $action = $this->input->post('action');
    switch ($action) {
      case 1:
          $variables = $this->input->post('formulario');
          parse_str($variables, $form_fields);
          //print_r($form_fields);
          $app_name         = $form_fields['app_name'];
          $app_id           = $form_fields['app_id'];
          $app_secret       = $form_fields['app_secret'];
          $app_title        = $form_fields['app_title'];
          $app_description  = $form_fields['app_description'];
          $app_message      = $form_fields['app_message'];
          $app_analytics    = $form_fields['app_analytics'];
          $app_fanpage_link = $form_fields['app_fanpage_link'];

          if( $this->administrador_model->insertaApp($app_name,$app_id,$app_secret,$app_title,$app_description,$app_message,$app_analytics,$app_fanpage_link)){
              echo "correcto";
          }else{
              echo "incorrecto";
          }
          //echo $app_name;
        break;
      default:
        # code...
        break;
    }

  }

}
?>