<?php
class Administrador_model extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  function getListadoApp(){
    $query = $this->db->get('aplicaciones');
    return $query->result_array();
  }


  function insertaApp($app_name,$app_id,$app_secret,$app_title,$app_description,$app_message,$app_analytics,$app_fanpage_link){
      $datos = array(
        'ap_nombre' => $app_name,
        'ap_appId' => $app_id,
        'ap_appSecret' => $app_secret,
        'ap_compartirCaption' => $app_title,
        'ap_compartirDescription' => $app_description,
        'ap_invitarMessage' => $app_message,
        'ap_analytics' => $app_analytics,
        'ap_fanpageLink' => $app_fanpage_link
      );

      $this->db->insert('aplicaciones', $datos);
      return $this->db->insert_id();
   }

}
?>