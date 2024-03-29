<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupo extends CI_Controller {

	
	public function perfil_grupo($id="",$nombre="")
	{
		if($id != null){
            if($nombre != null){

				$this->load->helper('form');
				$this->load->model('group_model');
				$this->load->model('evento_model');
				$this->load->model('essentials_model');
				$usuId = $this->session->userdata('id_usu');
				$idImg = 'B-'.$id.'';
				$reviews = $this->essentials_model->getReviews($id, 1);
				$calificacion = $this->essentials_model->getReviewsSum($id, 1);
				if($calificacion != null){
                    $x = $calificacion/5;
                    $porcentaje = $x * 100;
                    $numrows = $reviews->num_rows();
                    if($numrows != 0){
                        $promedio = $calificacion/$numrows;
                    }else{
                        $promedio = 2.5;
                    }
                }else{
                    $porcentaje = 50;
                    $promedio = 2.5;
				}
				
                $data['calificacion'] = $porcentaje;
				$data['promedio'] = $promedio;
                $data['reviews'] = $reviews;
				$data['grupo'] = $this->group_model->getGrupo($id);
				$data['publicaciones'] = $this->group_model->getPublicaciones($id);
				$data['CheckAdm'] = $this->group_model->CheckAdm($usuId, $id);
				$data['eveUsu'] = $this->evento_model->eveUsu($usuId);
				$data['galeria'] = $this->essentials_model->getGaleria($idImg);
				$data['integrantes'] = $this->group_model->getintegrantes($id);
				$data['seguido'] = $this->group_model->seguidoUsuGru($id,$usuId);

				$data['imgPerfil'] = $this->essentials_model->getImgPerfil($idImg);
				$this->load->view('header');
				$this->load->view('perfiles/grupo_perfil',$data);
				$this->load->view('footer');
			}else{
                header('Location: ' . base_url(""));
            }
        }else{
            header('Location: ' . base_url(""));
        }
	}

	public function mod_grupo()
	{
		$this->load->helper('form');
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$id = $this->input->get('profile');
		$usuId = $this->session->userdata('id_usu');
		$idImg = 'B-'.$id.'';
		$nombre = $this->group_model->grupoNombre($id);
		$data['grupo'] = $this->group_model->getGrupo($id);
		$check = $this->group_model->CheckAdm($usuId, $id);
		$data['tipogrupo'] = $this->group_model->getTipo();
		$data['generosgrupo'] = $this->group_model->getGeneros();
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['comunas'] = $this->essentials_model->getComuna();
		$data['imgPerfil'] = $this->essentials_model->getImgPerfil($idImg);
		if($check != 'false'){
	
			$this->load->view('header');
			$this->load->view('perfiles/modGrupo',$data);
			$this->load->view('footer');

		}else{
			header("Location: " . site_url("grupo/perfil_grupo/$id/$nombre"));
		}

	}

	public function subirGaleria()
	{
 		$this->load->model('group_model');
		$this->load->database();
		$this->load->helper('date_helper');
		$time = get_date_hour_s();
		$gruId = $this->input->post('grupo');
		$idUsu = $this->session->userdata('id_usu');
		$nombre = $this->group_model->grupoNombre($gruId);
		$check = $this->group_model->CheckAdm($idUsu, $gruId);

		if($check != 'false'){
			if($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0){
				$cantidad = count($_FILES['multipleFiles']['name']);
				$files = $_FILES;
				for ($i=0; $i < $cantidad; $i++){
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['upload_path'] = './assets/images/galeria/';
					$config['remove_spaces'] = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = ''.$gruId.'_'.$time.'_'.$i.'.jpg';
					$this->load->library('upload');
					$_FILES['multipleFiles']['name']= $files['multipleFiles']['name'][$i];
					$_FILES['multipleFiles']['type']= $files['multipleFiles']['type'][$i];
					$_FILES['multipleFiles']['tmp_name']= $files['multipleFiles']['tmp_name'][$i];
					$_FILES['multipleFiles']['error']= $files['multipleFiles']['error'][$i];
					$_FILES['multipleFiles']['size']= $files['multipleFiles']['size'][$i];    
					$this->upload->initialize($config);
					if($this->upload->do_upload('multipleFiles')){
						$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$gruId."_".$time."_".$i.".jpg' , 1 , 'B-".$gruId."')");
					}
					header("Location: " . site_url("grupo/perfil_grupo/$gruId/$nombre"));
				}
			}else{
				echo 'error';
			}
		}else{
			echo "nononono";
		}
			
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
		$nombre = $this->group_model->grupoNombre($grupo);
		if($CheckAdm == 'true'){
			$publicacion = array(
				'Titulo' => $titulo,
				'texto' => $texto,
				'fecha' => get_date(),
				'fk_id_grupo' => $grupo
			);

			$ingreso = $this->group_model->npublicacion($publicacion);
			if($ingreso == 'true'){
				header("Location: " . site_url("grupo/perfil_grupo/$grupo/$nombre"));
			}else{
				header("Location: " . site_url('grupo/perfil_grupo'));
			}
			
		}else{
			header("Location: " . site_url('grupo/perfil_grupo'));
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
						$this->email->from('yourpassion-noreply@yourpassionweb.com');
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
	public function cambio_img(){
		$this->load->database();
		$this->load->model('group_model');
		$id = $this->input->post('grupo');
		$idUsu = $this->session->userdata('id_usu');
		$this->load->helper('date_helper');
		$time = get_date_hour();
		$check = $this->group_model->CheckAdm($idUsu, $id);

		if($check != 'false'){
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['upload_path'] = './assets/images/profile/';
			$config['file_name'] = ''.$id.'_'.$time.'.jpg';
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$this->db->query("UPDATE galeria SET img_tipo = 1 WHERE fk_id_usu_img = 'B-".$id."' LIMIT 1");
				$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$id."_".$time.".jpg' , 2 , 'B-".$id."')");
				header("Location: mod_grupo?profile=".$id."");
			}else{
				echo 1;
			}
		}else{
			header("Location: perfil_grupo?profile=".$id."");
		}
		
		//header("Location: modificar_Perfil?nick=$nick&profile=$id");
	}

	public function filtro_grupo(){

		$this->load->model('group_model');
		$estilo = $this->input->post('estilo');
		$tipo = $this->input->post('tipo');
		$region = $this->input->post('region');
		$cal = $this->input->post("cal");
		

		$data['filtrogrupos'] = $this->group_model->filtro_grupo($estilo, $tipo, $region, $cal);

		$this->load->view('header');
		$this->load->view('busqueda/lista_grupos',$data);
		$this->load->view('footer');


	}


}
