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
        $sql = "SELECT usu_mail FROM usuarios WHERE id_usu = ? LIMIT 1";
        $result = $this->db->query($sql, array($id));

        if($result->num_rows() > 0 ){
            

            return $result;
            



        }else{
            return null;
        }


    }

    public function getUser($email = '')
    {
    	$sql = "SELECT * FROM usuarios WHERE usu_mail = ? LIMIT 1 ";
    	$result = $this->db->query($sql, array($email));

    	if($result->num_rows() > 0 ){
    		

            return $result->row();
            



    	}else{
    		return null;
    	}


    }
    function conf_new_usr($emaildecrypt){
        $sql1 = "SELECT * FROM usuarios WHERE usu_mail = ? && usu_estado = 0 LIMIT 1 ";
        $check = $this->db->query($sql1, array($emaildecrypt));


        if($check->num_rows > 0){
            $sqlupdate = "UPDATE usuarios SET usu_estado = 1 WHERE usu_mail = ? LIMIT 1 ";
            $this->db->query($sqlupdate, array($emaildecrypt));
            
            $sqlget = "SELECT id_usu FROM usuarios WHERE usu_mail = ? LIMIT 1";
            $get_id = $this->db->query($sqlget, array($emaildecrypt));
            
            foreach($get_id->result() as $id_array) {
                $id = $id_array->id_usu;
                $sqlupdate2 = "UPDATE usuarios SET id_usu_img = ? WHERE usu_mail = ? LIMIT 1";
                $this->db->query($sqlupdate2, array('A-'.$id,$emaildecrypt));
            }
           
            

            return $id;
        }else{
            return $id;
        }

        
    }


    function new_user($registro){
       

        $this->db->insert('usuarios',$registro);
        return true;
    }

    function get_profile($emaildecrypt){
       
        $sql = "SELECT id_usu, usu_nombre, usu_nacimiento, usu_tipo, usu_mail, usu_tel, usu_estado, usu_desc, usu_creacion, fk_rrss, id_usu_img FROM usuarios WHERE usu_mail = ? LIMIT 1 ";
        $result = $this->db->query($sql, array($emaildecrypt));

        return $result;
    }

    function getSeguidos($id){
       
        $sql = "SELECT * FROM grupo_seguidor gs 
        INNER JOIN grupo gru ON gru.id_grupo = gs.fk_id_grupo
        LEFT JOIN galeria gal ON gal.fk_id_usu_img = gru.id_usu_img && gal.img_tipo = 2
        WHERE gs.fk_id_usu = ? && gs.seguidor_estado = 1";
        $get_seguidos = $this->db->query($sql, array($id));

        if($get_seguidos->num_rows > 0){

            return $get_seguidos->result();

        }else{
            return null;
        }

    }

    function get4seguidos($id){
       
        $sql = "SELECT * FROM grupo_seguidor gs 
        INNER JOIN grupo gru ON gru.id_grupo = gs.fk_id_grupo
        INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
        INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
        INNER JOIN localizacion Loc ON gru.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria gal ON gal.fk_id_usu_img = gru.id_usu_img && gal.img_tipo = 2

        WHERE gs.fk_id_usu = ? && gs.seguidor_estado = 1 ORDER BY gru.id_grupo DESC LIMIT 4";
        $get_seguidos = $this->db->query($sql, array($id));

        if($get_seguidos->num_rows > 0){

            return $get_seguidos->result();

        }else{
            return null;
        }

    }

    function getEventos($emaildecrypt){
       
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_mail = ? LIMIT 1";
        $get_id = $this->db->query($sql1, array($emaildecrypt));

            if($get_id->num_rows > 0){
            
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_usu;
                    $sql2 = "SELECT * FROM grupo_seguidor WHERE fk_id_usu = ?";
                   $get_seguidos = $this->db->query($sql2, array($id));

                    if($get_seguidos->num_rows > 0){

                        return $get_seguidos;
                        
                    }else{
                        return 0;
                    }
                }
               
            }
    }

    function getOpiniones($emaildecrypt){
       
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_mail = ? LIMIT 1";
        $get_id = $this->db->query($sql1, array($emaildecrypt));

            if($get_id->num_rows > 0){
            
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_usu;
                    $sql2 = "SELECT * FROM comentario WHERE fk_id_usu = ?";
                   $get_seguidos = $this->db->query($sql2, array($id));

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
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_mail = ?";
       $consulta = $this->db->query($sql1, array($email));

       $random = rand(1,99999);

        $new_token_decrypt = ''.$email.'+/+/+/+'.$random.'';


        $new_token = $this->enc_model->encdata($new_token_decrypt);



            if($consulta->num_rows > 0){
                $sqltoken = "UPDATE `usuarios` SET `usu_token`= ? WHERE usu_mail = ?";
                $token = $this->db->query($sqltoken, array($new_token,$email));
                $sqlestado = "UPDATE `usuarios` SET `token_estado`= '0' WHERE usu_mail = ?";
                $estado = $this->db->query($sqlestado, array($email));

                $result = $new_token;
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function new_pass($passencrypt,$token){
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_token = ? && token_estado = 0";
       $consulta = $this->db->query($sql1, array($token));
       

            if($consulta->num_rows > 0){
                $sqltoken = "UPDATE `usuarios` SET `usu_contraseña`= ? WHERE usu_token = ? && token_estado = '0'";
                $tokeningreso = $this->db->query($sqltoken, array($passencrypt,$token));
                $sqlestado = "UPDATE `usuarios` SET `token_estado`= '1' WHERE usu_token = ?";
                $estado = $this->db->query($sqlestado, array($token));

                $result = 'true';
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function cancelpass($token){
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_token = ? && token_estado = 0";
       $consulta = $this->db->query($sql1, array($token));
       

            if($consulta->num_rows > 0){
                $sql2 = "UPDATE `usuarios` SET `token_estado`= '1' WHERE usu_token = ?";
                $estado = $this->db->query($sql2, array($token));

                $result = 'true';
                
            }else{

                $result = 'falso';

            }



       return $result;
    }

    function checkInvitacionesGrupo($id){
        $sql = "SELECT gru.id_grupo, gru.gru_nombre, gru.gru_formacion, Tipo.tipo_nombre, Gen.gen_nombre, Com.comu_nombre, Reg.region_nombre, UsuGru.usu_cargo, UsuGru.id_entrada
        FROM grupo gru 
        INNER JOIN usu_grupo UsuGru ON UsuGru.fk_id_grupo = gru.id_grupo
        INNER JOIN tipo Tipo ON Tipo.id_tipo = gru.fk_estilo_id
        INNER JOIN genero Gen ON Gen.id_genero = gru.fk_genero_id
        INNER JOIN localizacion Loc ON Loc.id_localizacion = gru.fk_id_localizacion
        INNER JOIN comunas Com ON Com.id_comuna = Loc.fk_id_comuna
        INNER JOIN regiones Reg ON Reg.n_region = Com.fk_id_region
        WHERE UsuGru.fk_id_usu = ? && UsuGru.entrada_estado = 0";

       $consulta = $this->db->query($sql, array($id));
       

            if($consulta->num_rows > 0){
                
                
                    $result = $consulta;
                
                
                
            }else{

                $result = null;

            }



       return $result;
    }

    public function getHistorial($emaildecrypt)
    {
        $sql1 = "SELECT id_usu FROM usuarios WHERE usu_mail = ? LIMIT 1";
        $get_id = $this->db->query($sql1, array($emaildecrypt));

        if($get_id->num_rows > 0){
        
            foreach($get_id->result() as $id_array) {
                $id = $id_array->id_usu;

                $sql2 = "SELECT * FROM hist_compra hist
                INNER JOIN evento eve ON hist.fk_id_evento = eve.id_evento  
                INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
                INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
                INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
                INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
                INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
                LEFT JOIN local Local on eve.fk_local = Local.id_local
                LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
                WHERE hist.fk_id_usu = ?";

               $get_compras = $this->db->query($sql2, array($id));

                if($get_compras->num_rows > 0){

                    return $get_compras->result();
                    
                }else{
                    return 0;
                }
            }
           
        }

    }

}

?>