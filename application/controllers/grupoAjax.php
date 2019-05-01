<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupoAjax extends CI_Controller {

	
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
		$this->load->model('essentials_model');
		$idgrupo = $this->input->post('grupo');
		$nombre = $this->input->post('nombre_grupo');
		$formacion = $this->input->post('fformacion');
		$tipogrupo = $this->input->post('tipo_grupo');
		$genero = $this->input->post('genero_grupo');
		$newgen = $this->input->post('new_genero');
		$comuna = $this->input->post('comuna');
		$email = $this->input->post('email_grupo');
		$numero = $this->input->post('n_grupo');
		$usuId = $this->session->userdata('id_usu');
		$check = $this->group_model->CheckAdm($usuId, $idgrupo);

		if($check != 'false'){
			
			if($nombre){
				$this->group_model->Modificar($idgrupo, 'gru_nombre', $nombre);
			}
			
			if($formacion){
				$this->group_model->Modificar($idgrupo, 'gru_formacion', $formacion);
			}
			
			if($tipogrupo){
				$this->group_model->Modificar($idgrupo, 'fk_estilo_id', $tipogrupo);
			}
			
			if($genero == 0){
				
				$ngenero = $this->essentials_model->n_genero($newgen,$usuId);
				
				foreach($ngenero->result() as $generoarray){
					$genero = $generoarray->id_genero;
				}
				$this->group_model->Modificar($idgrupo, 'fk_genero_id', $genero);
			}else{
				$this->group_model->Modificar($idgrupo, 'fk_genero_id', $genero);
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
				$this->group_model->Modificar($idgrupo, 'fk_id_localizacion', $localizacion);
			}
			
			if($email){
				$this->group_model->Modificar($idgrupo, 'gru_email', $email);
			}
			
			if($numero){
				$this->group_model->Modificar($idgrupo, 'gru_tel', $numero);
			}
			header("Location: ../grupo/mod_grupo?profile=".$idgrupo."");
		}else{
			header("Location: ../grupo/perfil_grupo?profile=".$idgrupo."");
		}

	}

	public function seguir()
	{
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$this->load->helper('date_helper');
		$grupo = $this->input->post('grupo');
		$idUsu = $this->session->userdata('id_usu');
		$fecha = get_date();
		$ingreso = array(
			'fecha_entrada' => $fecha,
			'fk_id_grupo' => $grupo,
			'fk_id_usu' => $idUsu,
			'seguidor_estado' => 1
		);
		$result = $this->group_model->seguidor($ingreso);

		echo $result;


	}
	public function dejarSeguir()
	{
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$grupo = $this->input->post('grupo');
		$idUsu = $this->session->userdata('id_usu');

		$result = $this->group_model->seguidorDejar($grupo, $idUsu);

		echo $result;


	}
	

}
