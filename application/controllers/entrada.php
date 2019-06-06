<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entrada extends CI_Controller {

	public function Boleto($idenc = "")
	{
		$this->load->model('enc_model');
        $this->load->model('evento_model');
        $id = $this->enc_model->decdata($idenc);
        $entrada = $this->evento_model->getBoleta($id);
        $this->load->library('Pdf');
        foreach($entrada->result() as $dataent){
            $usu = $dataent->usu_nombre;
            $eve = $dataent->eve_nombre;
            $fecha = $dataent->eve_fecha;
            $valor = $dataent->val_costo;
            $code = $dataent->codigo;
        }
        $data['usu'] = $usu;
        $data['eve'] = $eve;
        $data['fecha'] = $fecha;
        $data['valor'] = $valor;
        $data['code'] = $code;
        $this->load->view('pdf/entrada.php',$data);
   

    }


}