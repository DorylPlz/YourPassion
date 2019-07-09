<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class eventoAjax extends CI_Controller {

	
	public function nuevaDesc()
	{
		$this->load->helper('form');
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$id = $this->input->post('grupo');
		$desc = $this->input->post('ndesc');
		$usuId = $this->session->userdata('id_usu');
		$check = $this->group_model->CheckAdm($usuId, $id);

		if($check != 'false'){
			$ndesc = $this->group_model->nuevaDesc($id, $desc);
			echo json_encode($ndesc);
		}else{
			echo json_encode(2);
		}

	}

	public function Modificar()
	{
		$this->load->helper('form');
		$this->load->model('group_model');
		$this->load->model('evento_model');
		$this->load->model('essentials_model');
		$this->load->model('enc_model');
		$idevento = $this->input->post('idevento');
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));

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
		$check = $this->evento_model->CheckAdm($id_usu, $idevento);

		if($check != 0){
			
			if($nombre_eve){
				$this->evento_model->Modificar($idevento, 'eve_nombre', $nombre_eve);
			}
			
			if($frealizar){
				$this->evento_model->Modificar($idevento, 'eve_fecha', $frealizar);
			}

			if($Hrealizar){
				$this->evento_model->Modificar($idevento, 'eve_hora', $Hrealizar);
			}
			
			if($tipo_eve){
				$this->evento_model->Modificar($idevento, 'eve_tipo', $tipo_eve);
			}
			
			if($genero_eve == 0){
				
				$ngenero = $this->essentials_model->n_genero($new_genero,$id_usu);
				
				foreach($ngenero->result() as $generoarray){
					$genero = $generoarray->id_genero;
				}
				$this->evento_model->Modificar($idevento, 'eve_genero', $genero);
			}else{
				$this->evento_model->Modificar($idevento, 'eve_genero', $genero_eve);
			}

			if($comuna){
				$codPost = 123;
				$direccion = array(
					'loc_calle' => $calle_eve,
					'loc_numero' => $nDir,
					'loc_cod_postal' => $codPost,
					'fk_id_comuna' => $comuna
				);
		
				$id_localizacion = $this->essentials_model->n_ubicacion($direccion);
				foreach($id_localizacion->result() as $localizacion_array){
					$localizacion = $localizacion_array->id_localizacion;
				}
				$this->evento_model->Modificar($idevento, 'fk_id_localizacion', $localizacion);
			}
			
			if($email_eve){
				$this->evento_model->Modificar($idevento, 'eve_mail', $email_eve);
			}
			
			if($num_eve){
				$this->evento_model->Modificar($idevento, 'eve_numero', $num_eve);
			}
			if($precio){
				$this->evento_model->modPrecio($idevento, $precio);
			}
			if($desc){
				$this->evento_model->Modificar($idevento, 'eve_desc', $desc);
			}

			if($nombre_eve != ""){
				header("Location: ". site_url("evento/Perfil/$idevento/$nombre_eve"));
			}else{
				$nombre = $this->evento_model->getNombre($idevento);
				header("Location: " . site_url("evento/Perfil/$idevento/$nombre"));
			}
		}else{
			$nombre = $this->evento_model->getEventos($idevento);
			header("Location: " . site_url("evento/Perfil/$idevento/$nombre"));
		}

	}
	

}
