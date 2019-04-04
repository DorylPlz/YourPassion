<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admAjax extends CI_Controller {

	public function modalSolicitudesL()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('local_model');
		$idLocal = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$response = $this->local_model->getLocal($idLocal);
			echo json_encode($response);
		}


	}

	public function aceptarLocal()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('adm_model');
		$idLocal = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$estado = 1;
			$respuesta = $this->adm_model->estadoLocal($idLocal, $estado);
			echo json_encode($respuesta);
		}else{
			echo json_encode(2);
		}


	}

	public function rechazarLocal()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('adm_model');
		$idLocal = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$estado = 2;
			$rechazo = $this->adm_model->estadoLocal($idLocal, $estado);
			echo json_encode($rechazo);
		}else{
			echo json_encode(2);
		}


	}

	public function modalSolicitudesP()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('productora_model');
		$idProd = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$response = $this->productora_model->getProd($idProd);
			echo json_encode($response);
		}


	}

	public function aceptarProd()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('adm_model');
		$idProd = $this->input->post('idprod');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$estado = 1;
			$respuesta = $this->adm_model->estadoProd($idProd, $estado);
			echo json_encode($respuesta);
		}else{
			echo json_encode(2);
		}


	}

	public function rechazarProd()
	{
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('adm_model');
		$idProd = $this->input->post('id');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));
		$check = $this->essentials_model->checkNivel($id_usu);

		if($check == 2){
			$estado = 2;
			$rechazo = $this->adm_model->estadoProd($idProd, $estado);
			echo json_encode($rechazo);
		}else{
			echo json_encode(2);
		}


	}
	

}
