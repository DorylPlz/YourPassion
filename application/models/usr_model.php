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

    function newToken($email){
        $this->load->model('enc_model');

       $consulta = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$email."'");

       $random = rand(1,99999);

        $new_token_decrypt = ''.$email.'+/+/+/+'.$random.'';


        $new_token = $this->enc_model->encdata($new_token_decrypt);



            if($consulta->num_rows > 0){
                
                $token = $this->db->query("UPDATE `usuarios` SET `usu_token`= '".$new_token."' WHERE usu_mail = '".$email."'");
                $estado = $this->db->query("UPDATE `usuarios` SET `token_estado`= '0' WHERE usu_mail = '".$email."'");

                $result = $new_token;
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function new_pass($passencrypt,$token){
       $consulta = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_token = '".$token."' && token_estado = 0");
       

            if($consulta->num_rows > 0){
                
                $tokeningreso = $this->db->query("UPDATE `usuarios` SET `usu_contraseña`= '".$passencrypt."' WHERE usu_token = '".$token."' && token_estado = '0'");
                $estado = $this->db->query("UPDATE `usuarios` SET `token_estado`= '1' WHERE usu_token = '".$token."'");

                $result = 'true';
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function cancelpass($token){
       $consulta = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_token = '".$token."' && token_estado = 0");
       

            if($consulta->num_rows > 0){
                
                $estado = $this->db->query("UPDATE `usuarios` SET `token_estado`= '1' WHERE usu_token = '".$token."'");

                $result = 'true';
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function checkInvitacionesGrupo($id){
       $consulta = $this->db->query("SELECT gru.id_grupo, gru.gru_nombre, gru.gru_formacion, Tipo.tipo_nombre, Gen.gen_nombre, Com.comu_nombre, Reg.region_nombre, UsuGru.usu_cargo, UsuGru.id_entrada
                                    FROM grupo gru 
                                    INNER JOIN usu_grupo UsuGru ON UsuGru.fk_id_grupo = gru.id_grupo
                                    INNER JOIN tipo Tipo ON Tipo.id_tipo = gru.fk_estilo_id
                                    INNER JOIN genero Gen ON Gen.id_genero = gru.fk_genero_id
                                    INNER JOIN localizacion Loc ON Loc.id_localizacion = gru.fk_id_localizacion
                                    INNER JOIN comunas Com ON Com.id_comuna = Loc.fk_id_comuna
                                    INNER JOIN regiones Reg ON Reg.n_region = Com.fk_id_region
                                    WHERE UsuGru.fk_id_usu = '".$id."' && UsuGru.entrada_estado = 0");
       

            if($consulta->num_rows > 0){
                
                
                    $result = $consulta;
                
                
                
            }else{

                $result = null;

            }



       return $result;
    }

}

?>