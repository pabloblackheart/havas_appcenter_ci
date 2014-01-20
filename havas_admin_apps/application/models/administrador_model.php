<?php
class Administrador_model extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  function getListadoApp(){
    $query = $this->db->get('aplicaciones');
    return $query->result_array();
  }

}
?>