<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupo extends CI_Controller {

	
	public function perfil_grupo()
	{
		$this->load->model('group_model');
		$id = $this->input->get('profile');
		$usuId = $this->session->userdata('id_usu');
		$data['grupo'] = $this->group_model->getGrupo($id);
		$data['publicaciones'] = $this->group_model->getPublicaciones($id);
		$data['CheckAdm'] = $this->group_model->CheckAdm($usuId, $id);
		//$data['nintegrantes'] = $this->group_model->getnIntegrantes($id);
		$data['integrantes'] = $this->group_model->getintegrantes($id);

		$this->load->view('header');
		$this->load->view('perfiles/grupo_perfil',$data);
		$this->load->view('footer');
	}

	public function publicacion()
	{
		$this->load->model('group_model');
		$this->load->helper('date_helper');
		$titulo = $this->input->post('titulo');
		$texto = $this->input->post('texto');
		$grupo = $this->input->post('grupo');
		$usuId = $this->session->userdata('id_usu');

		$CheckAdm = $this->group_model->CheckAdm($usuId, $grupo);

		if($CheckAdm == 'true'){
			$publicacion = array(
				'Titulo' => $titulo,
				'texto' => $texto,
				'fecha' => get_date(),
				'fk_id_grupo' => $grupo
			);

			$ingreso = $this->group_model->npublicacion($publicacion);
			if($ingreso == 'true'){
				header("Location: " . site_url("grupo/perfil_grupo?profile=$grupo"));
			}else{
				header("Location: " . site_url('grupo/perfil_grupo?profile='));
			}
			
		}else{
			header("Location: " . site_url('grupo/perfil_grupo?profile='));
		}
	}

	public function invNusu()
	{
		$this->load->model('group_model');
		$this->load->model('essentials_model');
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
					$this->load->library("email");		
						$configmail = $this->essentials_model->configEmail();
						$text='<h1>Has recibido una invitación para unirte a un grupo.</h1> <br/> <p>Para confirmar esta invitación ingresa a tu perfil en http://www.YourPassionweb.com/<br/>Favor de no responder este Email, nosotros no revisamos esta casilla.</p><hr/><img height="40" width="150" src="http://www.yourpassionweb.com/assets/images/YP-logo_full-black.png"<img/>';

						
						$this->email->initialize($configmail);
						$this->email->from('no-reply@yourpassionweb.com');
						$this->email->to($email); 
						$this->email->subject('Invitación para unirte a un grupo');
						$this->email->message($text);
						$this->email->send();

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
	
	public function confInvitacion()
	{
		$this->load->model('group_model');
		$this->load->model('enc_model');
		$this->load->model('usr_model');
		$this->load->model('enc_model');
		$usu = $this->input->post('one');
		$id_entrada = $this->input->post('two');
		$id_grupo = $this->input->post('three');
		$confirmacion = $this->input->post('submit');
		$id_usu = $this->enc_model->decdata($usu);
		$emailarray = $this->usr_model->getEmail($id_usu);
		foreach($emailarray->result() as $email_usu) {
                $emaildecrypt = $email_usu->usu_mail;
                $email = $this->enc_model->encdata($emaildecrypt);
            }

		$check = $this->group_model->checkExistenciaInv($id_usu,$id_entrada, $id_grupo);
		if($check == true){
			if($confirmacion == 1){
				$aceptar = $this->group_model->aceptarInv($id_entrada);
				$data['estado'] = '<h1 class="title">Has pasado a formar parte de un grupo</h1>
		                        <p>Ya podrás participar en los eventos que organizados por o para este grupo.
		                        <br/>
		                        <h2><a href="'.site_url("profile/perfil_usuario?up=$email").'"><u>Mi perfil</u></a></h2>
		                        <br/>
		                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
		                        </p>';

			
					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
			}elseif($confirmacion == 2){
				$rechazar = $this->group_model->aceptarInv($id_entrada);
				header("Location: " . site_url("profile/perfil_usuario?up=$email"));
			}
		}else{
			header("Location: " . site_url("profile/perfil_usuario?up=$email"));
		}
	}


}
