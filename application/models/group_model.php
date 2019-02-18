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
        
        $result = $this->db->query("INSERT INTO `usu_grupo`(`usu_nivel`,`fk_id_usu`,`fk_id_grupo`) VALUES (2,$id_usu,$id_grupo)");

        return $result;

    }

    public function getGruposUsu($emaildecrypt)
    {
        
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_usu;
        }


        $result = $this->db->query("SELECT usugrupo.fk_id_grupo, usugrupo.usu_nivel, gru.id_grupo, gru.gru_nombre, gru.id_usu_img, gru.fk_estilo_id, gru.fk_genero_id, Tipo.tipo_nombre, Gen.gen_nombre
                FROM usu_grupo usugrupo
                INNER JOIN grupo gru ON gru.id_grupo = usugrupo.fk_id_grupo
                INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
                INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
                WHERE usugrupo.fk_id_usu =  '" . $id . "'");
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
}

?>