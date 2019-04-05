<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class localAjax extends CI_Controller {

	public function nuevaDesc()
	{
		$this->load->helper('form');
		$this->load->model('local_model');
		$this->load->model('essentials_model');
		$id = $this->input->post('local');
		$desc = $this->input->post('ndesc');
		$usuId = $this->session->userdata('id_usu');
		$check = $this->essentials_model->CheckAdm($usuId, $id, 2);

		if($check != 'false'){
			$ndesc = $this->local_model->nuevaDesc($id, $desc);
			echo json_encode($ndesc);
		}else{
			echo json_encode(2);
		}

	}
        
}
        
        
                            