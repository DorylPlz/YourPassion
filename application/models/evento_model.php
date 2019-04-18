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

    public function checkAdm($usu,$eve)
    {
        $result = $this->db->query("SELECT id_evento FROM evento WHERE fk_id_adm = '" . $usu . "' && id_evento = '".$eve."' LIMIT 1 ");

        if($result->num_rows() > 0 ){
            
            return 1;
            
        }else{
            return 0;
        }

    }
    public function getNombre($id)
    {
        
        $get_id = $this->db->query("SELECT eve_nombre FROM evento WHERE id_evento = ".$id." LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $nombre = $id_array->eve_nombre;
            
        }

        return $nombre;

    }

    public function getEvento($id)
    {
        
        $result = $this->db->query("SELECT * FROM evento Eve
        INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
        INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
        INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria Gal ON eve.id_usu_img = Gal.fk_id_usu_img && gal.img_tipo = 2
        LEFT JOIN local Local on eve.fk_local = Local.id_local
        LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
        WHERE id_evento = '".$id."' LIMIT 1");

        return $result;

    }
    public function getInvitados($id)
    {
        
        $result = $this->db->query("SELECT * FROM inveve Eve
        INNER JOIN grupo gru ON gru.id_grupo = Eve.fk_id_grupo
        INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
        INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
        LEFT JOIN galeria Gal ON gal.fk_id_usu_img = CONCAT('B-', gru.id_grupo) && gal.img_tipo = 2
        WHERE Eve.fk_id_evento =  '" . $id . "'");

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
    public function new_evento($n_eve)
    {
        $this->db->insert('evento',$n_eve);
        $get_id = $this->db->query("SELECT id_evento FROM evento ORDER BY id_evento DESC LIMIT 1");
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_evento;
            $this->db->query("UPDATE evento SET id_usu_img = 'E-".$id."' WHERE id_evento = '".$id."' LIMIT 1");
        }

        return $id;

    }
    public function valor_evento($val_eve)
    {
        try{
            $insert = $this->db->insert('valor',$val_eve);

            return 1;

        }catch(Exception $e){
            return 0;
        }
    }

    public function modPrecio($id,$val_eve)
    {
        try{
            $this->db->query("UPDATE `valor` SET val_costo = '".$val_eve."' WHERE `fk_id_evento` = '".$id."'");
            return 1;
        }catch(Exception $e){
            return 0;
        }
    }

    public function Modificar($id, $columna, $data)
    {
        try{
            $this->db->query("UPDATE `evento` SET ".$columna." = '".$data."' WHERE `id_evento` = '".$id."'");
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }
    
}
?>