<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class local extends CI_Controller {

    public function perfil_local($id, $nombre)
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
                    $numrows = $calificacion->num_rows();
                    if($numrows != 0){
                        $promedio = $calificacion/$numrows;
                    }else{
                        $promedio = 2.5;
                    }
                }else{
                    $porcentaje = 50;
                    $promedio = 2.5;
                }

                




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
        
}
        
    /* End of file  local.php */
        
                            