<?php

class essentials_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function getRegion()
    {
    	
    	$result = $this->db->query("SELECT * FROM regiones");

        return $result;

    }
    public function getComuna()
    {
        
        $result = $this->db->query("SELECT * FROM comunas");

        return $result;

    }

    public function n_genero($new_genero,$id_usu)
    {
        
        $insert = $this->db->query("INSERT INTO genero(`gen_nombre`,`usuario`) VALUES ('".$new_genero."','".$id_usu."')");

        $result = $this->db->query("SELECT id_genero FROM genero WHERE gen_nombre = '".$new_genero."' LIMIT 1");

        return $result;

    }

    public function n_ubicacion($direccion)
    {
        
        $insert = $this->db->insert('localizacion',$direccion);



        $result = $this->db->query("SELECT id_localizacion FROM localizacion  ORDER BY id_localizacion DESC LIMIT 1 ");

        return $result;

    }
}
?>