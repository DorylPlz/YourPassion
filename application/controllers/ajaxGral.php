<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxGral extends CI_Controller {

	public function setReview()
	{
        $this->load->helper('form');
        $this->load->model('essentials_model');
        $this->load->helper('date_helper');
        $id = $this->input->post('id');
        $entity = $this->input->post('tipo');
        $titulo = $this->input->post('titulo');
        $desc = $this->input->post('desc');
        $cal = $this->input->post('cal');
        $fecha = get_date();
        $hora = get_hour();
        $idUsu = $this->session->userdata('id_usu');
        $respuesta = $this->essentials_model->insertReview($id,$entity,$titulo,$desc,$cal,$idUsu,$fecha,$hora);

        echo $respuesta;
    }
}