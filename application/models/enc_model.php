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
    	
    	$class = 'yp_class_palta12';
        $method = 'aes128';
        $type = 'yp_login_type_91068176121';

        $result = openssl_encrypt($string, $method, $type, false, $class);

        return $result;

    }
    public function decdata($string)
    {
        
        $class = 'yp_class_palta12';
        $method = 'aes128';
        $type = 'yp_login_type_91068176121';

        $result = openssl_decrypt($string, $method, $type, false, $class);

        return $result;

    }

    
    
}
?>