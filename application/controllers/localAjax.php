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
	public function Modificar()
	{
		$this->load->helper('form');
		$this->load->model('local_model');
		$this->load->model('essentials_model');
		
		$idlocal = $this->input->post('local');
		$nombre = $this->input->post('nombre_local');
		$comuna = $this->input->post('comuna');
		$email = $this->input->post('email_local');
		$numero = $this->input->post('n_local');
		$usuId = $this->session->userdata('id_usu');
		$check = $this->essentials_model->CheckAdm($usuId, $idlocal, 2);

		if($check != 'false'){
			
			if($nombre){
				$this->local_model->Modificar($idlocal, 'local_nombre', $nombre);
			}

			
			if($comuna){
				$direccion = array(
					'loc_calle' => '',
					'loc_numero' => '',
					'loc_cod_postal' => '',
					'fk_id_comuna' => $comuna
				);
		
				$id_localizacion = $this->essentials_model->n_ubicacion($direccion);
				foreach($id_localizacion->result() as $localizacion_array){
					$localizacion = $localizacion_array->id_localizacion;
				}
				$this->local_model->Modificar($idlocal, 'fk_id_localizacion', $localizacion);
			}
			
			if($email){
				$this->local_model->Modificar($idlocal, 'local_email', $email);
			}
			
			if($numero){
				$this->local_model->Modificar($idlocal, 'local_tel', $numero);
			}
			header("Location: ../local/mod_local/".$idlocal."/$nombre");
		}else{
			header("Location: ../local/perfil_local?profile=".$idlocal."");
		}

	}
        
}
        
        
                            