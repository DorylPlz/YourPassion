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
    
}
?>