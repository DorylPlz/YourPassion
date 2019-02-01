<?php

class usr_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function getEmail($id)
    {
        
        $result = $this->db->query("SELECT usu_mail FROM usuarios WHERE id_usu = '" . $id . "' LIMIT 1 ");

        if($result->num_rows() > 0 ){
            

            return $result;
            



        }else{
            return null;
        }


    }

    public function getUser($email = '')
    {
    	
    	$result = $this->db->query("SELECT * FROM usuarios WHERE usu_mail = '" . $email . "' LIMIT 1 ");

    	if($result->num_rows() > 0 ){
    		

            return $result->row();
            



    	}else{
    		return null;
    	}


    }
    function conf_new_usr($emaildecrypt){
        $check = $this->db->query("SELECT * FROM usuarios WHERE usu_mail = '".$emaildecrypt."' && usu_estado = 0 LIMIT 1 ");


        if($check->num_rows > 0){
            $this->db->query("UPDATE usuarios SET usu_estado = 1 WHERE usu_mail = '".$emaildecrypt."' LIMIT 1 ");
            
            $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
            
            foreach($get_id->result() as $id_array) {
                $id = $id_array->id_usu;
               $this->db->query("UPDATE usuarios SET id_usu_img = 'A-".$id."' WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
            }
           
            

            return 1;
        }else{
            return 0;
        }

        
    }


    function new_user($registro){
       

        $this->db->insert('usuarios',$registro);
        return true;
    }

    function get_profile($emaildecrypt){
       

        $result = $this->db->query("SELECT id_usu, usu_nombre, usu_nacimiento, usu_tipo, usu_mail, usu_tel, usu_estado, usu_desc, usu_creacion, fk_rrss, id_usu_img FROM usuarios WHERE usu_mail = '" . $emaildecrypt . "' LIMIT 1 ");

        return $result;
    }

    function getSeguidos($emaildecrypt){
       
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");

            if($get_id->num_rows > 0){
            
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_usu;

                   $get_seguidos = $this->db->query("SELECT * FROM grupo_seguidor WHERE fk_id_usu = '".$id."'");

                    if($get_seguidos->num_rows > 0){

                        return $get_seguidos;

                    }else{
                        return 0;
                    }
               
               }
            
        }
    }

    function getEventos($emaildecrypt){
       
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");

            if($get_id->num_rows > 0){
            
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_usu;

                   $get_seguidos = $this->db->query("SELECT * FROM grupo_seguidor WHERE fk_id_usu = '".$id."'");

                    if($get_seguidos->num_rows > 0){

                        return $get_seguidos;
                        
                    }else{
                        return 0;
                    }
                }
               
            }
        }

    function getOpiniones($emaildecrypt){
       
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");

            if($get_id->num_rows > 0){
            
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_usu;

                   $get_seguidos = $this->db->query("SELECT * FROM comentario WHERE fk_id_usu = '".$id."'");

                    if($get_seguidos->num_rows > 0){

                        return $get_seguidos;
                        
                    }else{
                        return 0;
                    }
               
                }
            }
        }

}

?>