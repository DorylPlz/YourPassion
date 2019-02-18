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

	public function invNusu()
	{
		$this->load->model('group_model');
		$this->load->model('usr_model');
		$email = $this->input->post('email');
		$rol = $this->input->post('rolusu');
		$id_grupo = $this->input->post('grupo');

		$check = $this->usr_model->getUser($email);

		if($check != null){
			$check2 = $this->group_model->getGruposUsu($email);
			if($check2 == null){
					$id = $check->id_usu;
					$this->group_model->invNusu($id,$rol,$id_grupo);
					$data['estado'] = '<h1 class="title">Se ha invitado al usuario</h1>
		                        <p>Se ha enviado un correo de notificacion al usuario.
		                        <br /><br />
		                        Igualmente este podrá aceptar la invitación desde su perfil.
		                        <br/>
		                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
		                        </p>';

			
					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
			}else{
				$data['estado'] = '<h1 class="title">El usuario ya es parte del grupo</h1>
		                        <p>Si quieres cambiar el rol del integrante, puedes hacerlo desde la configuración de perfil de grupo.
		                        <br />
		                        <br/>
		                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
		                        </p>';

			
					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
			}
		}else{

			
			$data['estado'] = '<h1 class="title">El usuario no es parte de YourPassion</h1>
		                        <p>Igualmente se ha enviado un correo al usuario con una invitación a ser parte de esta red, cuando se haya registrado, automaticamente pasará a ser parte del grupo.
		                        <br />
		                        <br/>
		                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
		                        </p>';

			
					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
		}

		
		
	}
	


}
