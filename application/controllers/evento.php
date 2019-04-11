<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evento extends CI_Controller {

	public function nuevoEvento()
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
		foreach($email->result() as $email_usu) {
			$email = $email_usu->usu_mail;
		}

		$grupos = $this->group_model->getGruposUsu($email);
		$locales = $this->local_model->getLocalUsu($email);
		$prod = $this->productora_model->getProdUsu($email);

		$data['tipogrupo'] = $this->group_model->getTipo();
		$data['generosgrupo'] = $this->group_model->getGeneros();
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['comunas'] = $this->essentials_model->getComuna();

		$data['getGruposUsu'] = $grupos;
		$data['getLocalesUsu'] = $locales;
		$data['getProdUsu'] = $prod;

		$this->load->view('header');
		$this->load->view('perfiles/nuevoevento',$data);
		$this->load->view('footer'); 



	}

	public function nuevo_evento(){

		$this->load->helper('form');
		$this->load->model('enc_model');
		$this->load->model('essentials_model');
		$this->load->model('evento_model');
		$image = $this->input->post('image'); 
		$nombre_eve = $this->input->post('nombre_eve'); 
		$frealizar = $this->input->post('frealizar');  
		$tipo_eve = $this->input->post('tipo_eve');  
		$Hrealizar = $this->input->post('Hrealizar'); 
		$genero_eve = $this->input->post('genero_eve');  
		$new_genero = $this->input->post('new_genero');  
		$comuna = $this->input->post('comuna');  
		$calle_eve = $this->input->post('calle_eve');  
		$nDir = $this->input->post('nDir');  
		$email_eve = $this->input->post('email_eve');  
		$num_eve = $this->input->post('num_eve');  
		$desc = $this->input->post('desc');  
		$precio = $this->input->post('precio');  
		$publicacion = $this->input->post('publicacion');  

		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));

		if($genero_eve == 0){
			
			$ngenero = $this->essentials_model->n_genero($new_genero,$id_usu);

			foreach($ngenero->result() as $generoarray){
				$genero = $generoarray->id_genero;
			}

		}else{
			
			$genero = $genero_eve;
		}


		$direccion = array(
			'loc_calle' => $calle_eve,
			'loc_numero' => $nDir,
			'loc_cod_postal' => '',
			'fk_id_comuna' => $comuna
		);

		$id_localizacion = $this->essentials_model->n_ubicacion($direccion);
		foreach($id_localizacion->result() as $localizacion_array){
			$localizacion = $localizacion_array->id_localizacion;
		}

		$n_eve = array(
			'eve_desc' => $desc,
			'eve_estado' => 1,
			'eve_fecha' => $frealizar,
			'eve_genero' => $genero,
			'eve_hora' => $Hrealizar,
			'eve_nombre' => $nombre_eve,
			'eve_tipo' => $tipo_eve,
			'fk_id_localizacion' => $localizacion

			);

			$id_evento = $this->evento_model->new_evento($n_eve);
			//$this->group_model->adm_grupo($id_grupo,$id_usu);

		print_r($n_eve);


	}


	

}
