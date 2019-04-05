<?php

class local_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function n_local($n_local,$rut_local,$id_usu)
    {

    	$this->db->insert('local',$n_local);

        $get_id = $this->db->query("SELECT id_local FROM local WHERE local_rut = '".$rut_local."' LIMIT 1");
            
            foreach($get_id->result() as $id_array) {
                $id = $id_array->id_local;
               $this->db->query("UPDATE local SET id_usu_img = 'C-".$id."' WHERE local_rut = '".$rut_local."' LIMIT 1");
            }

        $this->db->query("INSERT INTO `usu_local`(`usu_nivel`,`fk_id_usu`,`fk_id_local`) VALUES (2,$id_usu,$id)");

        return true;
    }


    public function getLocalUsu($emaildecrypt)
    {
        
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_usu;
        }


        $result = $this->db->query("SELECT usulocal.fk_id_local, usulocal.usu_nivel, Local.id_local, Local.local_nombre, Local.id_usu_img
                FROM usu_local usulocal
                INNER JOIN local Local ON Local.id_local = usulocal.fk_id_local
                WHERE usulocal.fk_id_usu =  '" . $id . "'");
        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }

    }

    public function getLocal($id)
    {
        
        $result = $this->db->query("SELECT * 
                                    FROM local loc
                                    LEFT JOIN localizacion Dir ON loc.fk_id_localizacion = Dir.id_localizacion
                                    LEFT JOIN comunas Com ON Dir.fk_id_comuna = Com.id_comuna
                                    LEFT JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
                                    LEFT JOIN galeria Gal ON loc.id_usu_img = CONCAT('C-', Gal.fk_id_usu_img) && Gal.img_tipo = 2
                                    WHERE id_local = ".$id."");

        return $result->result();

    }

    public function getLocales()
    {
        
        $result = $this->db->query("SELECT * FROM local");

        return $result;

    }

}
?>