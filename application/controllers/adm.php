<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adm extends CI_Controller {

	public function main()
	{
		$this->load->model('usr_model');
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id);

		if($check == 2){
			$this->load->view('header');
			$this->load->view('Administracion/main');
			$this->load->view('footer');
		}else{
			header("Location: " . site_url("../main/index"));
		}


	}
	public function crud()
	{
		$this->load->model('usr_model');
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id);

		if($check == 2){
			$this->load->view('header');
			$this->load->view('Administracion/main');
			$this->load->view('footer');
		}else{
			header("Location: " . site_url("../main/index"));
		}


	}

	

}