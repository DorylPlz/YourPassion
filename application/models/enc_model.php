<?php

class enc_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();


    }
    public function encdata($string)
    {
    	$keys = $this->db->query("SELECT * FROM essentials");

        foreach($keys->result() as $credentials) {
            $class = $credentials->class;
            $method = $credentials->type;
            $type = $credentials->method;
        }



        $result = openssl_encrypt($string, $method, $type, false, $class);

        return $result;

    }
    public function decdata($string)
    {
        $keys = $this->db->query("SELECT * FROM essentials");

        foreach($keys->result() as $credentials) {
            $class = $credentials->class;
            $method = $credentials->type;
            $type = $credentials->method;
        }



        $result = openssl_decrypt($string, $method, $type, false, $class);

        return $result;

    }

    
    
}
?>