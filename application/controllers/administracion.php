<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administracion extends CI_Controller {

	
	public function perfil_adm()
	{
		$this->load->model('usr_model');
		$this->load->model('enc_model');
		$this->load->model('adm_model');
		$this->load->model('group_model');
		$this->load->model('local_model');
		$this->load->model('evento_model');
		$this->load->model('productora_model');
		$this->load->model('essentials_model');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$data['SolicitudesL'] = $this->adm_model->solicitudesLocal();
			$data['SolicitudesP'] = $this->adm_model->solicitudesProd();
			$data['getGrupos'] = $this->group_model->getGrupos();
			$data['getLocal'] = $this->local_model->getLocales();
			$data['getProductora'] = $this->productora_model->getProductoras();
			$data['getEventos'] = $this->evento_model->getEventos();
			

			$this->load->view('header');
			$this->load->view('Administracion/main',$data);
			$this->load->view('footer');
		}else{
			header("Location: " . site_url(".."));
		}
	}

	

}
