<?php

class evento_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();


    }
    public function getEventos()
    {
        $result = $this->db->query("SELECT * FROM evento WHERE eve_estado = 1");
        
        return $result;

    }

    public function getEventosList($id,$tipo)
    {
        if($tipo == 1){
            $columna = 'fk_grupo';
        }else if($tipo == 2){
            $columna = 'fk_local';
        }else if($tipo == 3){
            $columna = 'fk_productora';
        }
        $result = $this->db->query("SELECT * FROM evento WHERE eve_estado = 1 && '".$columna."' = '".$id."'");
        
        return $result;

    }
    
}
?>