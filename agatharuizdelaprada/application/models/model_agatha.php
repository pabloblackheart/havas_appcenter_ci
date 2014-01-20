<?php
class Model_agatha extends CI_Model{

    function __construct(){
        $this->load->database();
    }

   function verificaUsuario($uid){
    $query = $this->db->get_where('agathaEneroUsuarios', array('agathaEneroUsuarios_uid' => $uid) );
    $count = $query->num_rows();
    return $count;
   }

   function verificaUsuarioParticipacion($uid){
    $query = $this->db->get_where('agathaEneroUsuarios', array('agathaEneroUsuarios_uid' => $uid,'agathaEneroUsuarios_status' => 1) );
    $count = $query->num_rows();
    return $count;
   }

	function insertaUsuario($uid,$nombre_completo,$email,$gender,$link,$ip){
      $datos = array(
          'agathaEneroUsuarios_uid' => $uid,
          'agathaEneroUsuarios_nombre' => $nombre_completo,
          'agathaEneroUsuarios_email' => $email,
          'agathaEneroUsuarios_genero' => $gender,
          'agathaEneroUsuarios_url_perfil' => $link,
          'agathaEneroUsuarios_ip' => $ip
      );

      $this->db->insert('agathaEneroUsuarios', $datos);
      return $this->db->insert_id();
   }

   function ingresaPreguntas( $uid,$id_invitados,$preguntas ){

      $datos = array(
          'agathaEneroRespuestasUsuario_uid'          => $uid,
          'agathaEneroRespuestasUsuario_uid_invitado' => json_encode($id_invitados),
          'agathaEneroRespuestasUsuario_respuestas'  => json_encode($preguntas)
      );

      if ($this->db->insert('agathaEneroRespuestasUsuario', $datos) ){
        $datos1 = array(
          'agathaEneroUsuarios_status' => 1
        );
        $this->db->where('agathaEneroUsuarios_uid', $uid);
        $this->db->update('agathaEneroUsuarios', $datos1);
        return true;
      }else{
        return false;
      }
   }

   function getListadoTest($uid){
     $this->db->like('agathaEneroRespuestasUsuario_uid_invitado', $uid); 
     $query = $this->db->get_where('agathaEneroRespuestasUsuario');
    return $query->result_array();
   }

   function getPreguntasSingle($uid,$uid_usuario_test){
     $this->db->like('agathaEneroRespuestasUsuario_uid_invitado', $uid); 
     $query = $this->db->get_where('agathaEneroRespuestasUsuario', array('agathaEneroRespuestasUsuario_uid' => $uid_usuario_test));
    return $query->result_array();
   }

   
   function ingresaRespuestas($uid,$uid_usuario_test,$porcentaje){

      $datos = array(
          'agathaEneroRespuestas_uid'              => $uid,
          'agathaEneroRespuestas_uid_usuario_test' => $uid_usuario_test,
          'agathaEneroRespuestas_porcentaje'       => $porcentaje
      );

      if ($this->db->insert('agathaEneroRespuestas', $datos) ){
        return true;
      }else{
        return false;
      }
   }

   function getPorcentaje($uid,$uid_usuario_test){
     $query = $this->db->get_where('agathaEneroRespuestas', array('agathaEneroRespuestas_uid' => $uid,'agathaEneroRespuestas_uid_usuario_test' => $uid_usuario_test) );
     //$count = $query->num_rows();
     return $query->result_array();
   }

}
?>