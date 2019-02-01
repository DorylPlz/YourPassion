<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	public function get_usuario()
	{
		$id = $this->input->get("id");
		$this->load->model('usr_model');
		$email = $this->usr_model->getEmail($id);
		$class = 'yp_class_palta12';
        $method = 'aes128';
        $type = 'yp_login_type_91068176121';
		foreach($email->result() as $mail){
			$usu_email = $mail->usu_mail;
			$emailEncrypt = openssl_encrypt($usu_email, $method, $type, false, $class);
		}



		header('Location: ' . site_url("profile/perfil_usuario?up=$emailEncrypt"));

	}

	public function perfil_usuario()
	{
		$email = $this->input->get('up');

		$this->load->model('usr_model');
		$this->load->model('group_model');
		$this->load->model('local_model');
		$this->load->model('essentials_model');
				
		$class = 'yp_class_palta12';
		$method = 'aes128';
		$type = 'yp_login_type_91068176121';
		$email2 = preg_replace('/\s+/', '+', $email);

		$emaildecrypt = openssl_decrypt($email2, $method, $type, false, $class);

		//info básica del perfil
		$data['perfil'] = $this->usr_model->get_profile($emaildecrypt);
		$data['key'] = $this->input->get('up');

		//Get select para creacion de nuevo grupo
		$data['tipogrupo'] = $this->group_model->getTipo();
		$data['generosgrupo'] = $this->group_model->getGeneros();
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['comunas'] = $this->essentials_model->getComuna();
		

		//Obtener grupos seguidos, eventos asistidos o por asistir y opiniones realizadas
		$data['getSeguidos'] = $this->usr_model->getSeguidos($emaildecrypt);
		//$data['getEventos'] = $this->usr_model->getEventos($emaildecrypt);
		$data['getopiniones'] = $this->usr_model->getOpiniones($emaildecrypt);

		//grupos de usuario
		$data['getGruposUsu'] = $this->group_model->getGruposUsu($emaildecrypt);
		//locales de usuario
		$data['getLocalesUsu'] = $this->local_model->getLocalUsu($emaildecrypt);


		$this->load->view('header');
		$this->load->view('perfiles/usuario_perfil',$data);
		$this->load->view('footer');
	}

	public function modificar_perfil()
	{
		$this->load->library('session');
		$id1 = $this->input->post("key1");
		$id2 = $this->input->post("key2");
		$email = $this->input->post("key3");


		header('Location: ' . site_url("profile/perfil_usuario?up=$email"));

	}

	public function new_group()
	{
		$this->load->library('session');
		$this->load->model('essentials_model');
		$this->load->model('group_model');
		$this->load->helper('date_helper');

		$idencrypt = $this->input->post("key");
		$email = $this->input->post("key2");
		$nombre = $this->input->post("nombre_grupo");
		$fformacion = $this->input->post("fformacion");
		$tipo_grupo = $this->input->post("tipo_grupo");
		$genero_grupo = $this->input->post("genero_grupo");
		$new_genero = $this->input->post("new_genero");
		$region = $this->input->post("region");
		$comuna = $this->input->post("comuna");
		$email_grupo = $this->input->post("email_grupo");
		$n_grupo = $this->input->post("n_grupo");
		$date = get_date();

		$class = 'yp_class_palta12';
		$method = 'aes128';
		$type = 'yp_login_type_91068176121';

		$id_usu = openssl_decrypt($idencrypt, $method, $type, false, $class);

		if($genero_grupo == 0){
			
			$ngenero = $this->essentials_model->n_genero($new_genero,$id_usu);

			foreach($ngenero->result() as $generoarray){
				$genero = $generoarray->id_genero;
			}

		}else{
			
			$genero = $genero_grupo;
		}


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





		$n_group = array(
			'gru_nombre' => $nombre,
			'gru_email' => $email_grupo,
			'gru_estado' => 1,
			'gru_creacion' => $date,
			'gru_formacion' => $fformacion,
			'gru_likes' => 0,
			'gru_tel' => $n_grupo,
			'fk_estilo_id' => $tipo_grupo,
			'fk_genero_id' => $genero,
			'fk_id_localizacion' => $localizacion

			);

			$id_grupo = $this->group_model->new_group($n_group);
			$this->group_model->adm_grupo($id_grupo,$id_usu);

		


		header('Location: ' . site_url("profile/perfil_usuario?up=$email"));

	}

	public function new_local()
	{

		$this->load->library('session');
		$this->load->model('essentials_model');
		$this->load->model('local_model');
		$this->load->helper('date_helper');

		$idencrypt = $this->input->post("keyL");
		$email = $this->input->post("key2L");
		$nombre_local = $this->input->post("nombrelocal");
		$rut_local = $this->input->post("rutlocal");
		$nombre_dueño = $this->input->post("nombred");
		$rut_dueño = $this->input->post("rutd");
		$region = $this->input->post("regionlocal");
		$comuna = $this->input->post("comunalocal");
		$calle_local = $this->input->post("callelocal");
		$ndireccion_local = $this->input->post("ndireccionlocal");
		$codpostal_local = $this->input->post("codPostallocal");
		$email_local = $this->input->post("emaillocal");
		$numero_local = $this->input->post("numerolocal");
		$date = get_date();
		$time = get_date_hour();

		$class = 'yp_class_palta12';
		$method = 'aes128';
		$type = 'yp_login_type_91068176121';

		$id_usu = openssl_decrypt($idencrypt, $method, $type, false, $class);

		$direccion = array(
			'loc_calle' => $calle_local,
			'loc_numero' => $ndireccion_local,
			'loc_cod_postal' => $codpostal_local,
			'fk_id_comuna' => $comuna
		);

		$id_localizacion = $this->essentials_model->n_ubicacion($direccion);
		foreach($id_localizacion->result() as $localizacion_array){
			$localizacion = $localizacion_array->id_localizacion;
		}

		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
 		$config['upload_path'] = './assets/images/local_documentos/';
 		$config['file_name'] = ''.$rut_local.'_'.$time.'.jpg';
 		$config['remove_spaces'] = TRUE;
 		$config['overwrite'] = false;
 		$this->load->library('upload',$config);
		if($this->upload->do_upload('propiedadlocalfile')){
			if($this->upload->do_upload('carnetlocalfile')){

				$n_local = array(
					'local_email' => $email_local,
					'local_tel' => $numero_local,
					'local_nombre' => $nombre_local,
					'fk_id_localizacion' => $localizacion,
					'local_rut' => $rut_local,
					'local_dueño_nombre' => $nombre_dueño,
					'local_dueño_rut' => $rut_dueño,
					'local_creacion' => $date,
					'local_img_carnet' => ''.$rut_local.'_'.$time.'1.jpg',
					'local_img_propiedad' => ''.$rut_local.'_'.$time.'.jpg'

				);
				//$this->local_model->n_local($n_local);
				if($this->local_model->n_local($n_local,$rut_local,$id_usu) == TRUE){
					$data['estado'] = '<h1 class="title">El registro de tu local está siendo procesado</h1>
                        <p>En un plazo de 5 días habiles se revisarán los documentos recibidos y se te notificará cuando este periodo concluya.
                        <br /><br />
                        Mientras tanto, de igual forma podrás modificar tu local, publicar, etc, pero no saldrás listado como un local validado hasta entonces.
                        </p>';

					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
				}else{
					$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
                        <p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
                        <br /><br />
                        contacto@yourpassionweb.com
                        </p>';

					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
				}


			}
		}else{
			$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
                        <p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
                        <br /><br />
                        contacto@yourpassionweb.com
                        </p>';

					$this->load->view('header');
					$this->load->view('confirm_newusu',$data);
					$this->load->view('footer');
		}
 		





		//header('Location: ' . site_url("profile/perfil_usuario?up=$email"));

	}

}