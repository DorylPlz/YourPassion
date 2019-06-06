    <?php

class group_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getGrupo($id)
    {
        
        $result = $this->db->query("SELECT * FROM grupo gru
        INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
        INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
        INNER JOIN localizacion Loc ON gru.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        WHERE id_grupo = '".$id."' LIMIT 1");

        return $result;

    }
    public function get4grupos()
    {
        
        $result = $this->db->query("SELECT * FROM grupo gru
        INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
        INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
        INNER JOIN localizacion Loc ON gru.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria gal ON gal.fk_id_usu_img = gru.id_usu_img && gal.img_tipo = 2
        ORDER BY gru.id_grupo DESC LIMIT 4");

        return $result->result();

    }


    public function getPublicaciones($id)
    {
        
        $result = $this->db->query("SELECT * FROM publicación WHERE fk_id_grupo = '".$id."' ORDER BY id_entrada DESC");

        return $result->result_array();

    }

    public function npublicacion($publicacion)
    {
       try{
            $this->db->insert('publicación',$publicacion);
            return 'true';
       }catch(Exception $e){
           return 'false';
       }

    }

    public function CheckAdm($usuId, $id)
    {
        if($usuId != null){
            $result = $this->db->query("SELECT usu_nivel FROM usu_grupo WHERE fk_id_usu = '".$usuId."' && fk_id_grupo = '".$id."' && entrada_estado = 1 && usu_nivel = 2");
            if($result->num_rows() > 0 ){
                return 'true';
            }else{
                return 'false';
            }

        }else{
            return 'false';
        }
        

        

    }

    public function getintegrantes($id)
    {
        
        $check = $this->db->query("
            SELECT link.usu_cargo,
            usu.usu_nombre, usu.id_usu
            FROM usu_grupo link
            INNER JOIN usuarios usu ON link.fk_id_usu = usu.id_usu
            WHERE fk_id_grupo = '".$id."'");

       

        return $check->result_array();

    }

    public function getTipo()
    {
    	
    	$result = $this->db->query("SELECT * FROM tipo");

        return $result;

    }

    public function getGeneros()
    {
        
        $result = $this->db->query("SELECT * FROM genero");

        return $result;

    }
    public function grupoNombre($id)
    {
        
        $get_id = $this->db->query("SELECT gru_nombre FROM grupo WHERE id_grupo = ".$id." LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $nombre = $id_array->gru_nombre;
            
        }

        return $nombre;

    }
    public function getEmail($id)
    {
        
        $get_id = $this->db->query("SELECT gru_email FROM grupo WHERE id_grupo = ".$id." LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $email = $id_array->gru_email;
            
        }

        return $email;

    }
    public function filtro_grupo($estilo, $tipo, $region)
    {
        if($estilo){
            $estilo = " && gru.fk_genero_id = '".$estilo."'";
        }else{
            $estilo = "";
        }
        if($tipo){
            $tipo = " && gru.fk_estilo_id = '".$tipo."'";
        }else{
            $tipo = "";
        }
        if($region){
            $region = " && Reg.id_region = '".$region."'";
        }else{
            $region = "";
        }
            try{
            $result = $this->db->query("SELECT * FROM grupo gru
                INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
                INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
                INNER JOIN localizacion Loc ON gru.fk_id_localizacion = Loc.id_localizacion
                INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
                INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
                LEFT JOIN galeria Gal ON Gal.fk_id_usu_img = CONCAT('B-', gru.id_grupo) && Gal.img_tipo = 2
                WHERE gru.gru_estado = 1 ".$estilo.$tipo.$region."");
                return $result->result_array();
            }catch(Exception $e){
                return null;
            }
        
    }
    public function new_group($n_group)
    {
        
        $this->db->insert('grupo',$n_group);
        $get_id = $this->db->query("SELECT id_grupo FROM grupo ORDER BY id_grupo DESC LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_grupo;
            $this->db->query("UPDATE grupo SET id_usu_img = 'B-".$id."' WHERE id_grupo = '".$id."' LIMIT 1");
        }

        return $id;

    }

    public function adm_grupo($id_grupo,$id_usu)
    {
        
        $result = $this->db->query("INSERT INTO `usu_grupo`(`usu_nivel`,`fk_id_usu`,`fk_id_grupo`,entrada_estado) VALUES (2,$id_usu,$id_grupo, 1)");

        return $result;

    }

    public function getGruposUsu($emaildecrypt)
    {
        
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_usu;
        }


        $result = $this->db->query("SELECT usugrupo.fk_id_grupo, Gal.img_ruta, usugrupo.usu_nivel, gru.id_grupo, gru.gru_nombre, gru.id_usu_img, gru.fk_estilo_id, gru.fk_genero_id, Tipo.tipo_nombre, Gen.gen_nombre
                FROM usu_grupo usugrupo
                INNER JOIN grupo gru ON gru.id_grupo = usugrupo.fk_id_grupo
                INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
                INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
                LEFT JOIN galeria Gal ON Gal.fk_id_usu_img = CONCAT('B-', gru.id_grupo) && Gal.img_tipo = 2
                WHERE usugrupo.fk_id_usu =  '" . $id . "' && usugrupo.entrada_estado = 1");
        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }

    }

    public function invNusu($id,$rol,$id_grupo)
    {
        
        $result = $this->db->query("INSERT INTO `usu_grupo`(`usu_nivel`,`fk_id_usu`,`fk_id_grupo`,`usu_cargo`) VALUES (1,'".$id."','".$id_grupo."','".$rol."')");

        return $result;

    }

    public function checkExistenciaInv($id_usu,$id_entrada,$id_grupo)
    {
        
        $result = $this->db->query("SELECT * FROM usu_grupo WHERE fk_id_usu = '" . $id_usu . "' && fk_id_grupo = '".$id_grupo."' && id_entrada = '".$id_entrada."' && entrada_estado = 0 LIMIT 1 ");

        if($result->num_rows() > 0 ){
            

            return true;
            



        }else{
            return null;
        }

    }

    public function aceptarInv($id_entrada)
    {
        
        $result = $this->db->query("UPDATE usu_grupo SET entrada_estado = 1 WHERE id_entrada = '".$id_entrada."' LIMIT 1");

        return $result;

    }

        public function rechazarInv($id_entrada)
    {
        
        $result = $this->db->query("UPDATE usu_grupo SET entrada_estado = 2 WHERE id_entrada = '".$id_entrada."' LIMIT 1");

        return $result;

    }

    public function nuevaDesc($id, $desc)
    {
        try{
            $result = $this->db->query("UPDATE grupo SET gru_desc = '".$desc."' WHERE id_grupo = '".$id."' LIMIT 1");
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }

    public function Modificar($id, $columna, $data)
    {
        try{
            $this->db->query("UPDATE `grupo` SET ".$columna." = '".$data."' WHERE `id_grupo` = '".$id."'");
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }
    public function getGrupos()
    {
        
        $result = $this->db->query("SELECT * FROM grupo");

        return $result;

    }

    public function seguidoUsuGru($idGru, $idUsu)
    {
        
        try{
            $result = $this->db->query("SELECT * FROM grupo_seguidor WHERE fk_id_usu = '" . $idUsu . "' && fk_id_grupo = '".$idGru."' && seguidor_estado = 1 LIMIT 1 ");

            if($result->num_rows() > 0 ){
                
                return 1;
                
            }else{
                return 0;
            }
        }catch(Exception $e){
            return 2;
        }

    }

    public function seguidor($ingreso)
    {
        
        try{
            $this->db->insert('grupo_seguidor',$ingreso);
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }
    public function seguidorDejar($idGru, $idUsu)
    {
        
        try{
                $result = $this->db->query("SELECT id_entrada FROM grupo_seguidor WHERE fk_id_usu = '" . $idUsu . "' && fk_id_grupo = '".$idGru."' && seguidor_estado = 1 LIMIT 1 ");
                foreach($result->result() as $r){
                    $resultado = $r->id_entrada;
                    $this->db->query("UPDATE `grupo_seguidor` SET seguidor_estado = 0 WHERE `id_entrada` = '".$resultado."'");
                }
                return 1;

        }catch(Exception $e){
            return 0;
        }

    }
    
}

?>