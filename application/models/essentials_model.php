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

    public function getReviews($id,$tipo)
    {
        if($tipo == 1){
            $columna = 'fk_id_grupo';
        }else if($tipo == 2){
            $columna = 'fk_id_local';
        }else if($tipo == 3){
            $columna = 'fk_evento_id';
        }
        $result = $this->db->query("SELECT * FROM comentario com 
                                    INNER JOIN usuarios usu ON com.fk_id_usu = usu.id_usu
                                    LEFT JOIN galeria gal ON gal.fk_id_usu_img = usu.id_usu_img && gal.img_tipo = 2
                                    WHERE com.".$columna." = ".$id."");

        return $result;

    }
    public function getReviewsSum($id,$tipo)
    {
        if($tipo == 1){
            $columna = 'fk_id_grupo';
        }else if($tipo == 2){
            $columna = 'fk_id_local';
        }else if($tipo == 3){
            $columna = 'fk_evento_id';
        }
        //$result = $this->db->query("SELECT SUM(com_calificacion) FROM comentario WHERE ".$columna." = ".$id."");
        $this->db->select_sum('com_calificacion');
        $this->db->where(''.$columna.' = '.$id.'');
        $result = $this->db->get('comentario')->row();
        return $result->com_calificacion;

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
    
    public function getGaleria($idImg)
    {
        
        $result = $this->db->query("SELECT img_ruta FROM galeria WHERE fk_id_usu_img = '".$idImg."' && img_tipo = 1");

        return $result->result_array();

    }

    public function getImgPerfil($idImg)
    {
        
        $result = $this->db->query("SELECT img_ruta FROM galeria WHERE fk_id_usu_img = '".$idImg."' && img_tipo = 2 LIMIT 1");

        return $result->result_array();

    }

    public function checkNivel($id)
    {
    	
        $result = $this->db->query("SELECT usu_tipo FROM usuarios WHERE id_usu = '".$id."' LIMIT 1");
        foreach($result->result() as $nivel){
            $perm = $nivel->usu_tipo;
        }

        return $perm;

    }

    public function CheckAdm($usuId, $id, $tipo)
    {

        if($tipo == 1){
            $tabla = 'usu_grupo';
            $columna = 'fk_id_grupo';
        }else if($tipo == 2){
            $tabla = 'usu_local';
            $columna = 'fk_id_local';
        }else if($tipo == 3){
            $tabla = 'prod_usu';
            $columna = 'fk_id_prod';
        }

        if($usuId != null){
            $result = $this->db->query("SELECT usu_nivel FROM ".$tabla." WHERE fk_id_usu = ".$usuId." && ".$columna." = ".$id." && entrada_estado = 1 && usu_nivel = 2");
            if($result->num_rows() > 0 ){
                return 'true';
            }else{
                return 'false';
            }

        }else{
            return 'false';
        }
        

        

    }

    public function insertReview($id,$tipo,$titulo,$desc,$cal,$idUsu,$fecha,$hora)
    {
        if($tipo == 1){
            $columna = 'fk_id_grupo';
        }else if($tipo == 2){
            $columna = 'fk_id_local';
        }
        try{
            $insert = $this->db->query("INSERT INTO `comentario`(`com_detalle`, `com_fecha`, `com_hora`, `com_calificacion`, `com_titulo`, `fk_id_usu`,`".$columna."` ) VALUES ('".$desc."','".$fecha."','".$hora."','".$cal."','".$titulo."','".$idUsu."','".$id."')");
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }

}
?>