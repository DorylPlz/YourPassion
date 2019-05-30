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

	public function compraEntrada($id="",$nombre="")
	{
		if($this->session->userdata('login')){
			if($id != null){
				if($nombre != null){
	
					
					$this->load->model('evento_model');
					$this->load->model('essentials_model');
					$usuId = $this->session->userdata('id_usu');
					$data['evento'] = $this->evento_model->getEvento($id);
					$this->load->view('header');
					$this->load->view('compra/compra',$data);
					$this->load->view('footer');
				}else{
					header('Location: ' . base_url(""));
				}
			}else{
				header('Location: ' . base_url(""));
			}
		}else{
			header('Location: ' . base_url("main/login"));
		}
		
	}

	public function compra()
	{
		if($this->session->userdata('login')){
			$this->load->helper('form');
			$this->load->model('evento_model');
			$this->load->model('enc_model');
			$this->load->model('essentials_model');
			$ideve = $this->input->post('eve');
			$idusu = $this->session->userdata('id_usu');
			$this->load->helper('date_helper');
			$time = get_date();
			$getval = $this->evento_model->getVal($ideve);
			$array = array(
				'compra_fecha' => $time,
				'compra_descuento' => 0,
				'fk_id_evento' => $ideve,
				'fk_id_usu' => $idusu,
				'fk_id_valor' => $getval
			);
			$boleta = $this->enc_model->encdata($this->evento_model->compraexitosa($array,$ideve,$idusu));
			if($boleta != null){
				header('Location: ' . site_url("evento/recibo/$boleta"));
				
			}else{
				header('Location: ' . site_url("evento/errorcompra"));
				
			}

		}else{
			header('Location: ' . base_url("main/login"));
		}
		
	}
	public function recibo($boleta)
	{
		$this->load->model('enc_model');
		$id = $this->enc_model->decdata($boleta);
		$this->load->model('evento_model');
		$data['Boleta'] = $this->evento_model->getBoleta($id);
		$this->load->view('header');
		$this->load->view('compra/recibo',$data);
		$this->load->view('footer');
	}
	public function errorcompra()
	{

		$data['estado'] = '<h1 class="title">Ha ocurrido un error al procesar su compra</h1>
		<p>Se ha notificado a nuestro equipo del error.
		Intente contactarnos lo antes posible
		<br />contacto@yourpassionweb.com<br />
		</p>';
		$this->load->view('header');
		$this->load->view('confirm_newusu',$data);
		$this->load->view('footer');
		
	}

	public function Perfil($id="",$nombre="")
	{
		if($id != null){
            if($nombre != null){

				$this->load->helper('form');
				$this->load->model('evento_model');
				$this->load->model('essentials_model');
				$usuId = $this->session->userdata('id_usu');
				$idImg = 'E-'.$id.'';
				$reviews = $this->essentials_model->getReviews($id, 3);
				$calificacion = $this->essentials_model->getReviewsSum($id, 3);
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
				$data['eventoPerfil'] = $this->evento_model->getEvento($id);
				$data['GruposEve'] = $this->evento_model->getInvitados($id);
				$data['galeria'] = $this->essentials_model->getGaleria($idImg);
				$data['CheckAdm'] = $this->evento_model->CheckAdm($usuId, $id);
				$data['checkcompra'] = $this->evento_model->CheckCompra($usuId, $id);
				$this->load->view('header');
				$this->load->view('perfiles/evento_perfil',$data);
				$this->load->view('footer');
			}else{
                header('Location: ' . base_url(""));
            }
        }else{
            header('Location: ' . base_url(""));
        }
	}

	public function subirGaleria()
	{
 		$this->load->model('evento_model');
		$this->load->database();
		$this->load->helper('date_helper');
		$time = get_date_hour_s();
		$eveId = $this->input->post('evento');
		$idUsu = $this->session->userdata('id_usu');
		$nombre = $this->evento_model->getNombre($eveId);
		$check = $this->evento_model->CheckAdm($idUsu, $eveId);

		if($check != 0){
			if($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0){
				$cantidad = count($_FILES['multipleFiles']['name']);
				$files = $_FILES;
				for ($i=0; $i < $cantidad; $i++){
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['upload_path'] = './assets/images/evento/galeria/';
					$config['remove_spaces'] = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = ''.$eveId.'_'.$time.'_'.$i.'.jpg';
					$this->load->library('upload');
					$_FILES['multipleFiles']['name']= $files['multipleFiles']['name'][$i];
					$_FILES['multipleFiles']['type']= $files['multipleFiles']['type'][$i];
					$_FILES['multipleFiles']['tmp_name']= $files['multipleFiles']['tmp_name'][$i];
					$_FILES['multipleFiles']['error']= $files['multipleFiles']['error'][$i];
					$_FILES['multipleFiles']['size']= $files['multipleFiles']['size'][$i];    
					$this->upload->initialize($config);
					if($this->upload->do_upload('multipleFiles')){
						$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$eveId."_".$time."_".$i.".jpg' , 1 , 'E-".$eveId."')");
					}
					header("Location: " . site_url("evento/Perfil/$eveId/$nombre"));
				}
			}else{
				header("Location: " . site_url("evento/Perfil/$eveId/$nombre"));
			}
		}else{
			echo "nononono";
		}
			
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

		$this->load->helper('date_helper');
		$time = get_date_hour();
		$id_usu = $this->enc_model->decdata($this->session->userdata('id_usu2'));

		try{
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
			'fk_id_localizacion' => $localizacion,
			'eve_numero' => $num_eve,
			'eve_mail' => $email_eve,
			'fk_id_adm' => $id_usu

			);

			$id_evento = $this->evento_model->new_evento($n_eve);

			$val_eve = array(
				'val_costo' => $precio,
				'val_fecha' => $frealizar,
				'fk_id_evento' => $id_evento,
				'fk_id_usu' => $publicacion
	
				);

			$addprecio = $this->evento_model->valor_evento($val_eve);


			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['upload_path'] = './assets/images/evento/';
			$config['file_name'] = ''.$id_evento.'_'.$time.'.jpg';
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$id_evento."_".$time.".jpg' , 2 , 'E-".$id_evento."')");
			}else{
				echo 1;
			}
			header("Location: " . site_url("evento/Perfil/$id_evento/$nombre_eve"));
		}catch(Exception $e){
			echo "Ha ocurrido un error";
		}


	}
	public function mod_eve()
	{
		$this->load->helper('form');
		$this->load->model('evento_model');
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$ideve = $this->input->get('profile');
		$usuId = $this->session->userdata('id_usu');
		$idImg = 'E-'.$ideve.'';
		$nombre = $this->evento_model->getNombre($ideve);
		$data['evento'] = $this->evento_model->getEvento($ideve);
		$check = $this->evento_model->CheckAdm($usuId, $ideve);
		$data['tipogrupo'] = $this->group_model->getTipo();
		$data['generosgrupo'] = $this->group_model->getGeneros();
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['comunas'] = $this->essentials_model->getComuna();
		$data['imgPerfil'] = $this->essentials_model->getImgPerfil($idImg);
		if($check != 0){
	
			$this->load->view('header');
			$this->load->view('perfiles/modEve',$data);
			$this->load->view('footer');

		}else{
			header("Location: " . site_url("evento/Perfil/$ideve/$nombre"));
		}

	}

	public function cambio_img(){
		$this->load->database();
		$this->load->model('evento_model');
		$id = $this->input->post('ideve');
		$nombre = $this->evento_model->getNombre($id);
		$idUsu = $this->session->userdata('id_usu');
		$this->load->helper('date_helper');
		$time = get_date_hour();
		$check = $this->evento_model->CheckAdm($idUsu, $id);

		if($check != 'false'){
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['upload_path'] = './assets/images/evento/';
			$config['file_name'] = ''.$id.'_'.$time.'.jpg';
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$this->db->query("UPDATE galeria SET img_tipo = 1 WHERE fk_id_usu_img = 'E-".$id."' LIMIT 1");
				$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$id."_".$time.".jpg' , 2 , 'E-".$id."')");
				header("Location: mod_eve?profile=".$id."");
			}else{
				echo 1;
			}
		}else{
			header("Location: Perfil/$id/$nombre");
		}
		
		//header("Location: modificar_Perfil?nick=$nick&profile=$id");
	}
	
	public function invEvento()
	{
		$this->load->helper('form');
		$this->load->model('evento_model');
		$this->load->model('group_model');
		$this->load->model('essentials_model');
		$invitado = $this->input->post('invitado');
		$evento = $this->input->post('evento');
		$comentario = $this->input->post('comentario');
		$usuId = $this->session->userdata('id_usu');

		$checkAdm = $this->evento_model->CheckAdm($usuId, $evento);
		if($checkAdm == 1){
			$invitacion = array(
				'fk_id_grupo' => $invitado,
				'fk_id_evento' => $evento,
				'comentario' => $comentario,
				'estado' => 0,
				'fk_id_usu' => $usuId
			);
			$registro = $this->evento_model->registroInvitación($invitacion);
			if($registro == 'false'){
				$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
				<p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
				<br /><br />
				contacto@yourpassionweb.com
				</p>';
			}else if($registro == 'true'){
				$data['estado'] = '<h1 class="title">Ya hay una invitación pendiente</h1>
				<p>Se te notificará cuando el grupo haya respondido a la invitación
				<br /><br />
				</p>';
			}else{
				try{
					$this->load->model('enc_model');
					$gru_mail = $this->group_model->getEmail($invitado);
					$idinv = $this->enc_model->encdata($registro);
					$this->load->library("email");		
					$configmail = $this->essentials_model->configEmail();
					$text='<h1>Han invitado a tu grupo a un evento</h1><br/> <p>Para poder confirmar la asistencia, debes seguir el siguiente vinculo<br/><br/> <a href="http://www.yourpassionweb.com/index.php/evento/conf_asistencia/1/'.$idinv.'">Confirmar asistencia</a><br/>En caso de no poder asistir, selecciona el siguiente vinculo: <a href="http://www.yourpassionweb.com/index.php/evento/conf_asistencia/0/'.$idinv.'">Rechazar asistencia</a><hr/>Favor de no responder este Email, nosotros no revisamos esta casilla.</p><hr/><img height="40" width="150" src="http://www.yourpassionweb.com/assets/images/YP-logo_full-black.png"<img/>';
					
 					$this->email->initialize($configmail);
					$this->email->from('no-reply@yourpassionweb.com');
					$this->email->to($gru_mail); 
					$this->email->subject('Invitación a evento');
					$this->email->message($text);
					$this->email->send(); 
				}catch(Exception $e){
				}
				
				$data['estado'] = '<h1 class="title">La invitación se ha enviado</h1>
				<p>Se notificará a los integrantes del grupo sobre su invitación
				<br /><br />
				Cuando hayan confirmado se mostrará el grupo en el perfil del evento
				</p>';
			}

		}else{
			$data['estado'] = '<h1 class="title">Usted no tiene autorización para realizar esta accion</h1>
				<p>Contactese con el administrador de este evento.
				<br /><br />
				</p>';
		}
		$this->load->view('header');
		$this->load->view('confirm_newusu',$data);
		$this->load->view('footer');

	}

	public function conf_asistencia($conf="",$id="")
	{
		if($conf != null){
			if($id != null){
				if($this->session->userdata('login')){
					$this->load->model('enc_model');
					$this->load->model('evento_model');
					$this->load->model('group_model');
					$idUsu = $this->session->userdata('id_usu');
					$idinv = $this->enc_model->decdata($id);
					$invitacion = $this->evento_model->getInvitacion($idinv);
					foreach($invitacion->result() as $inv){
						$idgru = $inv->fk_id_grupo;
						$idEve = $inv->fk_id_evento;
					}
					$checkAdmGru = $this->group_model->CheckAdm($idUsu, $idgru);
					if($checkAdmGru == 'true'){
						$cambioEstado = $this->evento_model->confInv($idinv,$conf);

						if($cambioEstado == 1){
							$nombreEve = $this->evento_model->getNombre($idEve);
							$data['estado'] = '<h1 class="title">Has confirmado la asistencia</h1>
							<p>Ahora ya se mostrará tu grupo en el perfil del evento.

							<br />
							Para ir al evento, pincha <a href="http://www.yourpassionweb.com/index.php/evento/Perfil/'.$idEve.'/'.$nombreEve.'">aquí</a>
							<br />
							</p>';
						}else{
							$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
							<p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
							<br /><br />
							contacto@yourpassionweb.com
							</p>';
						}

					}else{
						$data['estado'] = '<h1 class="title">No tienes permisos para realizar esta accion</h1>
							<p>Contactate con el administrador de este grupo.
							<br /><br />
							</p>';
					}
						
				}else{
					header("Location: " . site_url("../main/login/"));
				}

			}else{
				$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
				<p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
				<br /><br />
				contacto@yourpassionweb.com
				</p>';
			}
				
		}else{
			$data['estado'] = '<h1 class="title">Ha ocurrido un error</h1>
			<p>Intentalo nuevamente, si el problema persiste, no dudes en contactarnos
			<br /><br />
			contacto@yourpassionweb.com
			</p>';
		}
		$this->load->view('header');
		$this->load->view('confirm_newusu',$data);
		$this->load->view('footer');
			
	
	}

	public function cambio_estado(){
		$this->load->model('evento_model');
		$this->load->model('essentials_model');
		$id = $this->input->post('ideve');
		$nombre = $this->evento_model->getNombre($id);
		$idUsu = $this->session->userdata('id_usu');
		$this->load->helper('date_helper');
		$time = get_date_hour();
		$check = $this->evento_model->CheckAdm($idUsu, $id);
		$estado = $this->input->post('estado_eve');
		if($check != 'false'){
			if($estado == 3){
				try{
					$usuarios = $this->evento_model->getAsistentes($id);
					if($usuarios != null){
						foreach($usuarios as $usus){
							$this->load->library("email");		
							$configmail = $this->essentials_model->configEmail();
							$text='<h1>Uno de los eventos a los que ibas a asistir ha sido cancelado</h1><br/> <p>El evento <b>"'.$nombre.'"</b> ha sido cancelado, para más información contactate con los organizadores de este evento.<hr/>Favor de no responder este Email, nosotros no revisamos esta casilla.</p><hr/><img height="40" width="150" src="http://www.yourpassionweb.com/assets/images/YP-logo_full-black.png"<img/>';
							
							$this->email->initialize($configmail);
							$this->email->from('no-reply@yourpassionweb.com');
							$this->email->to($usus->usu_mail); 
							$this->email->subject('Evento "'.$nombre.'" cancelado');
							$this->email->message($text);
							$this->email->send(); 
						}
					}else{

					}
				}catch(Exception $e){	}

				$cambio = $this->evento_model->cambio_estado($id,$estado);
				header("Location: Perfil/$id/$nombre");
			}else{
				$cambio = $this->evento_model->cambio_estado($id,$estado);
				header("Location: Perfil/$id/$nombre");
			}

		}else{
			header("Location: Perfil/$id/$nombre");
		}

		
		
		//header("Location: modificar_Perfil?nick=$nick&profile=$id");
	}

}
