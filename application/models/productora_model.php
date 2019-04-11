<?php

class productora_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function prod_registro($productora,$id_usu)
    {
        $insert = $this->db->insert('productora',$productora);
        $id_prod = $get_id = $this->db->query("SELECT id_productora FROM productora ORDER BY id_productora DESC LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_productora;
            $this->db->query("UPDATE productora SET id_usu_img = 'D-".$id."' WHERE id_productora = '".$id."' LIMIT 1");
            $this->db->query("INSERT INTO prod_usu(fk_id_usu, fk_id_prod, prod_nivel) VALUES (".$id_usu.",".$id.",2)");
        }
        return $id;
    }

    public function getProdUsu($emaildecrypt)
    {
        $get_id = $this->db->query("SELECT id_usu FROM usuarios WHERE usu_mail = '".$emaildecrypt."' LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_usu;
        }


        $result = $this->db->query("SELECT produsu.fk_id_prod, produsu.usu_nivel, Prod.id_productora, Prod.prod_nombre, Prod.id_usu_img
                FROM prod_usu produsu
                INNER JOIN productora Prod ON Prod.id_productora = produsu.fk_id_prod
                WHERE produsu.fk_id_usu =  '" . $id . "'");
        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }
    }

    public function getProductoras()
    {
        
        $result = $this->db->query("SELECT * FROM productora");

        return $result;

    }

    public function getProd($id)
    {
        
        $result = $this->db->query("SELECT * FROM productora WHERE id_productora = ".$id."");

        return $result->result();

    }

}
?>