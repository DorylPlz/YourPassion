<?php

class adm_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();


    }
    public function solicitudesLocal()
    {
        $result = $this->db->query("SELECT * FROM local WHERE local_estado = 0");
        
        return $result;

    }
    public function solicitudesProd()
    {
        $result = $this->db->query("SELECT * FROM productora WHERE prod_estado = 0");
        
        return $result;

    }
    
}
?>