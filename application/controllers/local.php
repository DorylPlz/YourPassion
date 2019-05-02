<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class local extends CI_Controller {

    public function perfil_local($id="", $nombre="")
    {
        if($id != null){
            if($nombre != null){

                $this->load->model('local_model');
                $this->load->model('evento_model');
                $this->load->model('essentials_model');
                $this->load->model('enc_model');

                $reviews = $this->essentials_model->getReviews($id, 2);
                $calificacion = $this->essentials_model->getReviewsSum($id, 2);
                $usuId = $this->enc_model->decdata($this->session->userdata('id_usu2'));
                $idImg = 'C-'.$id.'';
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

                $data['imgPerfil'] = $this->essentials_model->getImgPerfil($idImg);
                $data['galeria'] = $this->essentials_model->getGaleria($idImg);
                $data['eventos'] = $this->evento_model->getEventosList($id, 2);
                $data['CheckAdm'] = $this->essentials_model->CheckAdm($usuId, $id, 2);
                $data['promedio'] = $promedio;
                $data['reviews'] = $reviews;
                $data['localData'] = $this->local_model->getLocal($id);
                $data['calificacion'] = $porcentaje;

                $this->load->view('header');
                $this->load->view('/perfiles/local_perfil',$data);
                $this->load->view('footer');

            }else{
                header('Location: ' . base_url(""));
            }
        }else{
            header('Location: ' . base_url(""));
        }
    
    }

    public function mod_local($id="", $nombre="")
	{
		$this->load->helper('form');
		$this->load->model('local_model');
		$this->load->model('essentials_model');
		$usuId = $this->session->userdata('id_usu');
		$idImg = 'C-'.$id.'';
		$data['local'] = $this->local_model->getLocal($id);
		$check = $this->essentials_model->CheckAdm($usuId, $id, 2);
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['comunas'] = $this->essentials_model->getComuna();
		$data['imgPerfil'] = $this->essentials_model->getImgPerfil($idImg);
		if($check != 'false'){
	
			$this->load->view('header');
			$this->load->view('perfiles/modLocal',$data);
			$this->load->view('footer');

		}else{
			header("Location: " . site_url("local/perfil_local/$id/$nombre"));
		}

    }
    
    public function cambio_img(){
		$this->load->database();
        $this->load->model('local_model');
        $this->load->model('essentials_model');
		$id = $this->input->post('local');
		$idUsu = $this->session->userdata('id_usu');
		$this->load->helper('date_helper');
		$time = get_date_hour();
		$check = $this->essentials_model->CheckAdm($idUsu, $id, 2);

		if($check != 'false'){
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['upload_path'] = './assets/images/profile/local/';
			$config['file_name'] = ''.$id.'_'.$time.'.jpg';
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$this->db->query("UPDATE galeria SET img_tipo = 1 WHERE fk_id_usu_img = 'C-".$id."' LIMIT 1");
				$this->db->query("INSERT INTO galeria(img_ruta, img_tipo, fk_id_usu_img) VALUES ('".$id."_".$time.".jpg' , 2 , 'C-".$id."')");
				header("Location: mod_grupo?profile=".$id."");
			}else{
				echo 1;
			}
		}else{
			header("Location: perfil_grupo?profile=".$id."");
        }
    }
        
}
        