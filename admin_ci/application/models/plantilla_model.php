<?php
class Plantilla_model extends CI_Model{

    function __construct(){
        $this->load->database();
    }

   function verificaUsuario($uid){
    $query = $this->db->get_where('datos_app', array('uid' => $uid) );
    $count = $query->num_rows(); 
    return $count; 
   }

	function inserta_usuario($nombre, $uid){
      $datos = array(
          'uid' => $uid,
          'nombre' => $nombre
      );
      
      $this->db->insert('datos_app', $datos);
      return $this->db->insert_id();
   }
   
   function actualiza_datos($uid,$nombre, $email,$telefono,$direccion){
	    $datos = array(
          'nombre'    => $nombre,
          'email'     => $email,
          'telefono'  => $telefono,
	        'direccion' => $direccion
	    );
   	  
      $this->db->where('uid', $uid);
      if ($this->db->update('datos_app', $datos) ){
        return true;
      }else{
        return false;
      }
   }

}
?>