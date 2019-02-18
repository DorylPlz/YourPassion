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

    public function configEmail()
    {
        $infomail = $this->db->query("SELECT noreply,host,mail,protocolo,puerto FROM essentials");

        foreach($infomail->result() as $credentials) {
            $noreply = $credentials->noreply;
            $host = $credentials->host;
            $mail = $credentials->mail;
            $protocolo = $credentials->protocolo;
            $puerto = $credentials->puerto;
        }
        $configmail = array(
                    'protocol' => $protocolo,
                    'validation'=> TRUE,
                    'smtp_host' => $host,
                    'smtp_port' => $puerto, //
                    'smtp_user' => $mail,
                    'smtp_pass' => $noreply,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ); 

        return $configmail;

    }


}
?>