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
    public function getEvesUsu($emaildecrypt)
    {
        $sql = "SELECT id_usu FROM usuarios WHERE usu_mail = ? LIMIT 1";
        $get_id = $this->db->query($sql, array($emaildecrypt));
        foreach($get_id->result() as $id_array) {
            $id = $id_array->id_usu;
        }


        $result = $this->db->query("SELECT *
                FROM evento eve
                LEFT JOIN galeria Gal ON Gal.fk_id_usu_img = CONCAT('E-', eve.id_evento) && Gal.img_tipo = 2
                WHERE eve.fk_id_adm =  '" . $id . "'");
        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }

    }
    public function checkAdm($usu,$eve)
    {
        $sql = "SELECT id_evento FROM evento WHERE fk_id_adm = ? && id_evento = ? LIMIT 1 ";
        $result = $this->db->query($sql, array($usu,$eve));

        if($result->num_rows() > 0 ){
            
            return 1;
            
        }else{
            return 0;
        }

    }
    public function cambio_estado($id,$estado)
    {
        try{
            $sql = "UPDATE `evento` SET eve_estado = ? WHERE `id_evento` = ?";
            $this->db->query($sql,array($estado,$id));
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }
    public function getNombre($id)
    {
        $sql = "SELECT eve_nombre FROM evento WHERE id_evento = ? LIMIT 1";
        $get_id = $this->db->query($sql,array($id));
        foreach($get_id->result() as $id_array) {
            $nombre = $id_array->eve_nombre;
            
        }

        return $nombre;

    }
    public function eveUsu($id)
    {
        
        $sql = "SELECT * FROM evento WHERE fk_id_adm = ? && eve_estado = 1";
        $result = $this->db->query($sql, array($id));

        return $result;

    }
    public function getEvento($id)
    {
        
        $sql = "SELECT * FROM evento eve
        INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
        INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
        INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria Gal ON eve.id_usu_img = Gal.fk_id_usu_img && Gal.img_tipo = 2
        LEFT JOIN local Local on eve.fk_local = Local.id_local
        LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
        WHERE id_evento = ? LIMIT 1";

        $result = $this->db->query($sql,array($id));

        return $result;

    }

    public function CheckCompra($usuId, $id)
    {
        
        $sql = "SELECT * FROM hist_compra WHERE fk_id_usu = ? && fk_id_evento = ?";
        $result = $this->db->query($sql, array($usuId,$id));
        if($result->num_rows() > 0 ){
            return 1;
        }else{
            return 0;
        }



    }
    public function get4eventos()
    {
        
        $result = $this->db->query("SELECT * FROM evento eve
        INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
        INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
        INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria Gal ON eve.id_usu_img = Gal.fk_id_usu_img && Gal.img_tipo = 2
        LEFT JOIN local Local on eve.fk_local = Local.id_local
        LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
        ORDER BY eve.id_evento DESC LIMIT 4");

        return $result->result();

    }

    public function get2eventos()
    {
        
        $result = $this->db->query("SELECT * FROM evento eve
        INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
        INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
        INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
        INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
        INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
        LEFT JOIN galeria Gal ON eve.id_usu_img = Gal.fk_id_usu_img && Gal.img_tipo = 2
        LEFT JOIN local Local on eve.fk_local = Local.id_local
        LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
        ORDER BY Eve.id_evento DESC LIMIT 2");

        return $result->result();

    }
    public function getInvitados($id)
    {
        
        $sql = "SELECT * FROM inveve eve
        INNER JOIN grupo gru ON gru.id_grupo = eve.fk_id_grupo
        INNER JOIN tipo Tipo ON gru.fk_estilo_id = Tipo.id_tipo
        INNER JOIN genero Gen ON gru.fk_genero_id = Gen.id_genero
        LEFT JOIN galeria Gal ON Gal.fk_id_usu_img = CONCAT('B-', gru.id_grupo) && Gal.img_tipo = 2
        WHERE eve.fk_id_evento = ?";

        $result = $this->db->query($sql, array($id));

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

        $sql = "SELECT * FROM evento WHERE eve_estado = 1 && ? = ?";
        $result = $this->db->query($sql, array($columna, $id));
        
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
    public function compraexitosa($array,$ideve,$idusu)
    {
        $this->load->model('essentials_model');
        try{
            $insert = $this->db->insert('hist_compra',$array);
            try{
                $sql = "SELECT hist.id_compra, hist.compra_fecha, hist.fk_id_evento, hist.fk_id_valor, val.val_costo, eve.eve_nombre
                FROM hist_compra hist 
                INNER JOIN valor val ON hist.fk_id_valor = val.id_valor
                INNER JOIN evento eve ON hist.fk_id_evento = eve.id_evento
                WHERE hist.fk_id_evento = ? && hist.fk_id_usu = ? ORDER BY hist.id_compra DESC LIMIT 1";

                $select = $this->db->query($sql, array($ideve,$idusu));
                
                return $select;
            }catch(Exception $e){
                $this->load->model('essentials_model');
                $configmail = $this->essentials_model->configEmail();
					$text=$e;
					
 					$this->email->initialize($configmail);
					$this->email->from('yourpassion-noreply@yourpassionweb.com');
					$this->email->to('darylolivares@gmail.com'); 
					$this->email->subject('Registro de error de compra');
					$this->email->message($text);
					$this->email->send(); 
                return null;
            }

        }catch(Exception $e){
            $this->load->model('essentials_model');
            $configmail = $this->essentials_model->configEmail();
                $text=$e;
                
                 $this->email->initialize($configmail);
                $this->email->from('yourpassion-noreply@yourpassionweb.com');
                $this->email->to('darylolivares@gmail.com'); 
                $this->email->subject('Registro de error de compra');
                $this->email->message($text);
                $this->email->send(); 
            return null;
        }
    }
    
    public function getBoleta($id)
    {
        try{
            $sql = "SELECT * FROM hist_compra Hist
            INNER JOIN evento eve ON eve.id_evento = Hist.fk_id_evento
            INNER JOIN usuarios usu ON usu.id_usu = Hist.fk_id_usu
            INNER JOIN valor val ON val.id_valor = Hist.fk_id_valor
            WHERE Hist.id_compra = ?
            ORDER BY 'Hist.id_compra' DESC LIMIT 1";

            $result = $this->db->query($sql, array($id));
            return $result;
        }catch(Exception $e){
            return 0;
        }
    }
    public function modPrecio($id,$val_eve)
    {
        try{
            $sql = "UPDATE `valor` SET val_costo = ? WHERE `fk_id_evento` = ?";

            $this->db->query($sql, array($val_eve,$id));
            return 1;
        }catch(Exception $e){
            return 0;
        }
    }

    public function Modificar($id, $columna, $data)
    {
        try{
            $sql = "UPDATE `evento` SET ? = ? WHERE `id_evento` = ?";

            $this->db->query($sql, array($columna,$data,$id));
            return 1;
        }catch(Exception $e){
            return 0;
        }

    }
    public function registroInvitación($invitacion)
    {
        $select = $this->db->select('*')->from('inveve')->where($invitacion)->get();
        if($select->num_rows() > 0 ){
            return 'true';
        }else{
            
            try{
                $insert = $this->db->insert('inveve',$invitacion);
                $get_id = $this->db->query("SELECT id_entrada FROM inveve WHERE estado = 0 ORDER BY id_entrada  DESC LIMIT 1");
                foreach($get_id->result() as $id_array) {
                    $id = $id_array->id_entrada;
                }
                return $id;
    
            }catch(Exception $e){
                return 'false';
            }
        }

    }

    public function getInvitacion($id)
    {
        $sql = "SELECT * FROM inveve WHERE id_entrada = ? ORDER BY id_entrada  DESC LIMIT 1";
        $select = $this->db->query($sql,array($id));

        return $select;

    }

    public function getVal($id)
    {
        $sql = "SELECT id_valor FROM valor WHERE fk_id_evento = ? LIMIT 1";
        $select = $this->db->query($sql,array($id));
        foreach($select->result() as $id_array) {
            $id = $id_array->id_valor;
        }
        return $id;


    }

    public function confInv($id,$conf)
    {
        try{
            $sql = "UPDATE `inveve` SET estado = ? WHERE `id_entrada` = ?";
            $update = $this->db->query($sql,array($conf,$id));

            return 1;
        }catch(Exception $e){
            return 0;
        }


    }

    public function getAsistentes($id)
    {
        try{
            $sql = "SELECT Hist.id_compra, usu.usu_mail FROM hist_compra Hist
            INNER JOIN usuarios usu ON Hist.fk_id_usu = usu.id_usu
            WHERE Hist.fk_id_evento = ?";

            $result = $this->db->query($sql,array($id));
            if($result->num_rows() > 0 ){
                return $result->result();
            }else{
                return null;
            }
        }catch(Exception $e){
            return null;
        }


    }
    

    public function filtro_evento($estilo, $tipo, $region)
    {
        if($estilo){
            $estilo = " && eve.eve_genero = ".$estilo."";
        }else{
            $estilo = "";
        }
        if($tipo){
            $tipo = " && eve.eve_tipo = ".$tipo."";
        }else{
            $tipo = "";
        }
        if($region){
            $region = " && Reg.id_region = ".$region."";
        }else{
            $region = "";
        }
            try{
                $result = $this->db->query("SELECT * FROM evento eve
                INNER JOIN genero Gen ON eve.eve_genero = Gen.id_genero
                INNER JOIN tipo Tipo ON eve.eve_tipo = Tipo.id_tipo
                INNER JOIN localizacion Loc ON eve.fk_id_localizacion = Loc.id_localizacion
                INNER JOIN comunas Com ON Loc.fk_id_comuna = Com.id_comuna
                INNER JOIN regiones Reg ON Com.fk_id_region = Reg.id_region
                LEFT JOIN galeria Gal ON eve.id_usu_img = Gal.fk_id_usu_img && Gal.img_tipo = 2
                LEFT JOIN local Local on eve.fk_local = Local.id_local
                LEFT JOIN valor Val on Val.fk_id_evento = eve.id_evento
                WHERE eve.eve_estado = 1 ".$estilo.$tipo.$region." ORDER BY eve.id_evento DESC");
                return $result->result();
            }catch(Exception $e){
                return null;
            }
        
    }
    
}
?>