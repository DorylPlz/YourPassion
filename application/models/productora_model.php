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
            $this->db->query("INSERT INTO prod_usu(fk_id_usu, fk_id_prod, prod_nivel) VALUES (".$id_usu.",".$id.",2)");
        }
        return $id;
    }

}
?>