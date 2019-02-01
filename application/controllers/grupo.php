<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupo extends CI_Controller {

	
	public function perfil_grupo()
	{
		$this->load->model('group_model');
		$id = $this->input->get('profile');
		$data['grupo'] = $this->group_model->getGrupo($id);
		//$data['nintegrantes'] = $this->group_model->getnIntegrantes($id);
		$data['integrantes'] = $this->group_model->getintegrantes($id);

		$this->load->view('header');
		$this->load->view('perfiles/grupo_perfil',$data);
		$this->load->view('footer');
	}

}
