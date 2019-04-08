<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evento extends CI_Controller {

	public function modalSolicitudesL()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('usr_model');
		$this->load->model('group_model');
		$this->load->model('local_model');
		$this->load->model('productora_model');
		$idLocal = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$email = $this->usr_model->getEmail($id_usu);

		$data['getGruposUsu'] = $this->group_model->getGruposUsu($email);
		$data['getLocalesUsu'] = $this->local_model->getLocalUsu($email);
		$data['getProdUsu'] = $this->productora_model->getProdUsu($email);

		


	}


	

}
