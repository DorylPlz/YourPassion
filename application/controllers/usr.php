<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usr extends CI_Controller {


	public function login()
	{
		$this->load->library('session');
		$this->load->model('usr_model');

		$class = 'yp_class_palta12';
		$method = 'aes128';
		$type = 'yp_login_type_91068176121';

		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$passencrypt = openssl_encrypt($pass, $method, $type, false, $class);
		$fila = $this->usr_model->getUser($email);
		

		if($fila != null){
			if($fila->usu_contraseña == $passencrypt){
				if($fila->usu_estado != 0 && 3){
					
					$emailencrypt = openssl_encrypt($email, $method, $type, false, $class);
					$type1encrypt = openssl_encrypt(1, $method, $type, false, $class);
					$type2encrypt = openssl_encrypt(2, $method, $type, false, $class);
					$idencrypt = openssl_encrypt($fila->id_usu, $method, $type, false, $class);
					$id = $fila->id_usu;

					if($fila->usu_tipo == 2){
						$data = array(
							'email' => $emailencrypt,
							'usu_tipo' => $type2encrypt,
							'id_usu' => $id,
							'id_usu2' => $idencrypt,
							'login' => true
						);
					}else{
						$data = array(
							'email' => $emailencrypt,
							'usu_tipo' => $type1encrypt,
							'id_usu' => $id,
							'id_usu2' => $idencrypt,
							'login' => true
						);

					}
						$this->session->set_userdata($data);

						
						header("Location: " . site_url("profile/perfil_usuario?up=$emailencrypt"));
				}else{

					header("Location: " . site_url("main/login"));

				}
			}else{
				header("Location: " . site_url("main/login"));
			}
		}else{
			header("Location: " . site_url("main/login"));
		}
	}
	
	public function logOut()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		header('Location: ' . site_url("main/index"));

	}

	public function sign_up()
	{
		$this->load->model('usr_model');
		$this->load->helper('date_helper');
		$nombre = $this->input->post('nombre');
		$nacimiento = $this->input->post('nacimiento');
		$email = $this->input->post('email');
		$tel = $this->input->post('telefono');
		$pass = $this->input->post('pass1');
		$time = get_date();



		$fila = $this->usr_model->getUser($email);

		if($fila != null){

			$data['estado'] = '<h1 class="title">Actualmente ya estas registrado en YourPassion</h1>
                        <p>Para iniciar sesión, <a href=""><u>Entra aquí</u></a>.
                        <br /><br />
                        Si olvidaste tu contraseña, intenta <a href=""><u>Reestablecer tu contraseña</u></a>.
                        <br/>
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';
                

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');

		}else{

				//enc & ingreso
				$class = 'yp_class_palta12';
				$method = 'aes128';
				$type = 'yp_login_type_91068176121';

				$passencrypt = openssl_encrypt($pass, $method, $type, false, $class);
				$emailencrypt = openssl_encrypt($email, $method, $type, false, $class);

				$registro = array(
		 			'usu_nombre' => $nombre,
		 			'usu_contraseña' => $passencrypt,
		 			'usu_nacimiento' => $nacimiento,
		 			'usu_tipo' => '1',
		 			'usu_mail' => $email,
		 			'usu_tel' => $tel,
		 			'usu_estado' => '0',
		 			'usu_desc' => '',
		 			'usu_creacion' => $time,
		 			'id_usu_img' => 'A-0'
		 			);

			if($this->usr_model->new_user($registro) != false){

				//Email
				$this->load->library("email");		
				$configmail = array(
					'protocol' => 'smtp',
					'validation'=> TRUE,
					'smtp_host' => 'ssl://mail.yourpassionweb.com',
					'smtp_port' => 465, //
					'smtp_user' => 'no-reply@yourpassionweb.com',
					'smtp_pass' => 'Calocha123',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				); 
				$text='Tu cuenta está casi lista, solo debes ingresar al siguiente enlace para confirmar tu cuenta:<br/><br/> <a href="http://www.yourpassionweb.com/index.php/usr/conf_usu?nu='.$emailencrypt.'">Valida tu cuenta aquí</a><br/><br/>Favor de no responder este Email, nosotros no revisamos esta casilla.';

				
				$this->email->initialize($configmail);
				$this->email->from('no-reply@yourpassionweb.com');
				$this->email->to($email); 
				$this->email->subject('Confirma tu cuenta en Your Passion');
				$this->email->message($text);
				$this->email->send();
				

				$data['estado'] = '<h1 class="title">Tu registro está casi completo</h1>
                        <p>Te hemos enviado un email para poder confirmar tu cuenta.
                        <br /><br />
                        Cuando lo hayas confirmado ya serás parte de esta gran red.
                        <br/>
                        Si no encuentras el correo, revisa en tu bandeja de spam.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');

			}else{
				$data['estado'] = '<h1 class="title">Hubo un error en tu registro</h1>
                        <p>Intentalo nuevamente.
                        <br /><br />
                        Si el problema persiste, no duden en contactarte con nosotros.
                        <br/>
                        contacto@yourpassionweb.com.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
			}

		}


	}

	public function conf_usu()
	{
		$email = $this->input->get('nu');
		$this->load->model('usr_model');
				$class = 'yp_class_palta12';
				$method = 'aes128';
				$type = 'yp_login_type_91068176121';
		$email2 = preg_replace('/\s+/', '+', $email);

		$emaildecrypt = openssl_decrypt($email2, $method, $type, false, $class);
		

		if($this->usr_model->conf_new_usr($emaildecrypt) != 0){
			$data['estado'] = '<h1 class="title">Su registro se ha completado</h1>
                        <p>Para iniciar sesión, <a href=""><u>Entra aquí</u></a>.
                        <br /><br />
                        Si olvidaste tu contraseña, intenta <a href=""><u>Reestablecer tu contraseña</u></a>.
                        <br/>
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
		}else{
			$data['estado'] = '<h1 class="title">Hubo un error en su validación</h1>
                        <p>Intentelo nuevamente.
                        <br /><br />
                        Si el problema persiste, no dudes en contactarte con nosotros.
                        <br/>
                        contacto@yourpassionweb.com.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
		}
		


	}

	public function recpass()
	{
		$email = $this->input->post('email');
		$this->load->model('usr_model');

		$new_token = $this->usr_model->newToken($email);

		if($new_token != 'falso'){
			$this->load->library("email");		
				$configmail = array(
					'protocol' => 'smtp',
					'validation'=> TRUE,
					'smtp_host' => 'ssl://mail.yourpassionweb.com',
					'smtp_port' => 465, //
					'smtp_user' => 'no-reply@yourpassionweb.com',
					'smtp_pass' => 'Calocha123',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				); 
				$text='Hemos recibido la solicitud para restablecer tu contraseña, si fuiste tu, ingresa al siguiente enlace:<br/><br/> <a href="http://www.yourpassionweb.com/index.php/usr/cambiopass?token='.$new_token.'">Restablece tu contraseña aquí</a><br/>En caso de que no fueras tu el que solicito este cambio, favor de ingresar <a href="http://www.yourpassionweb.com/index.php/usr/cancelarcambiopass?token='.$new_token.'">aquí</a><br/>
				<br/>Favor de no responder este Email, nosotros no revisamos esta casilla.';

				
				$this->email->initialize($configmail);
				$this->email->from('no-reply@yourpassionweb.com');
				$this->email->to($email); 
				$this->email->subject('Solicitud de cambio de contraseña YourPassion');
				$this->email->message($text);
				$this->email->send();

				$data['estado'] = '<h1 class="title">Hemos enviado un correo con las instrucciones para el cambio de contraseña</h1>
                        <p>Porfavor revise su correo.
                        <br /><br />
                        Si no encuentras el correo, revise su casilla de spam.
                        <br/>
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
		}else{
			$data['estado'] = '<h1 class="title">Hemos enviado un correo con las instrucciones para el cambio de contraseña</h1>
                        <p>Porfavor revise su correo.
                        <br /><br />
                        Si no encuentras el correo, revise su casilla de spam.
                        <br/>
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
		}
		


	}

	public function cambiopass()
	{
		$token = $this->input->get('token');
		$token2 = preg_replace('/\s+/', '+', $token);

		$data['token'] = $token2;
			$this->load->view('header');
			$this->load->view('new_pass',$data);
			$this->load->view('footer');


	}

	public function confpass()
	{
		$tokenrecibir = $this->input->post('token');
		$pass = $this->input->post('newpass1');
		$pass2 = $this->input->post('newpass2');
		$this->load->model('usr_model');

		if($pass == $pass2){
				$class = 'yp_class_palta12';
				$method = 'aes128';
				$type = 'yp_login_type_91068176121';

			$passencrypt = openssl_encrypt($pass, $method, $type, false, $class);

			$ingresopass = $this->usr_model->new_pass($passencrypt,$tokenrecibir);

			if($ingresopass == 'true'){
				$data['estado'] = '<h1 class="title">Su contraseña ha cambiado satisfactoriamente </h1>
                        <br />
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');
			}else{
				$data['estado'] = '<h1 class="title">Esta solicitud de cambio de contraseña ya ha expirado</h1>
                        <p>Porfavor intentelo nuevamente.
                        <br /><br />
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

				$this->load->view('header');
				$this->load->view('confirm_newusu',$data);
				$this->load->view('footer');
			}

		}else{
			$data['estado'] = '<h1 class="title">Hubo un error validando su contraseña</h1>
                        <p>Porfavor intentelo nuevamente.
                        <br /><br />
                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
                        </p>';

			$this->load->view('header');
			$this->load->view('confirm_newusu',$data);
			$this->load->view('footer');

		}

	}

	public function cancelarcambiopass()
	{
		$token = $this->input->get('token');
		$token2 = preg_replace('/\s+/', '+', $token);

		$this->load->model('usr_model');

		$cancelpass = $this->usr_model->cancelpass($token2);

		if($cancelpass == 'true'){

			$data['estado'] = '<h1 class="title">Se ha cancelado la solicitud de cambio de contraseña</h1>
	                        <p><br />
	                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
	                        </p>';

				$this->load->view('header');
				$this->load->view('confirm_newusu',$data);
				$this->load->view('footer');
		}else{
			$data['estado'] = '<h1 class="title">Hubo un error al intentar cancelar el cambio</h1>
	                        <p>Intentalo nuevamente<br/><br />
	                        Cualquier consulta, problema, sugerencia, no dudes en contactarnos.
	                        </p>';

				$this->load->view('header');
				$this->load->view('confirm_newusu',$data);
				$this->load->view('footer');
		}


	}


}
