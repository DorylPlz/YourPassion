<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


	public function index()
	{
		$this->load->model('essentials_model');
		$this->load->model('enc_model');
		$this->load->model('usr_model');
		$this->load->model('group_model');
		$this->load->model('evento_model');
		$data['regiones'] = $this->essentials_model->getRegion();
		$data['estilos'] = $this->group_model->getGeneros();
		$data['tipos'] = $this->group_model->getTipo();
		if($this->session->userdata('login')){
			$id = $this->enc_model->decdata($this->session->userdata('id_usu2'));
			$seguidos = $this->usr_model->get4seguidos($id);
			if($seguidos != null){
				$data['grupos'] = $seguidos; 
			}else{
				$data['grupos'] = $this->group_model->get4grupos();
			}
		}else{
			$data['grupos'] = $this->group_model->get4grupos();
		}
		$data['eventos'] = $this->evento_model->get4eventos();
		
		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
	
	public function politicas()
	{
		$this->load->view('header');
		$this->load->view('pages-travelo-policies');
		$this->load->view('footer');
	}	

	public function perfil_evento()
	{
		$this->load->view('header');
		$this->load->view('perfiles/evento_perfil');
		$this->load->view('footer');
	}


	public function perfil_local()
	{
		$this->load->view('header');
		$this->load->view('perfiles/local_perfil');
		$this->load->view('footer');
	}

	public function eventos()
	{
		$this->load->view('header');
		$this->load->view('busqueda/lista_eventos');
		$this->load->view('footer');
	}

	public function grupos()
	{
		$this->load->view('header');
		$this->load->view('busqueda/lista_grupos');
		$this->load->view('footer');
	}

	public function locales()
	{
		$this->load->view('header');
		$this->load->view('busqueda/lista_locales');
		$this->load->view('footer');
	}

	public function contactus()
	{
		$this->load->view('header');
		$this->load->view('pages-contactus1');
		$this->load->view('footer');
	}

	public function faq()
	{
		$this->load->view('header');
		$this->load->view('pages-faq1');
		$this->load->view('footer');
	}

	public function aboutus()
	{
		$this->load->view('header');
		$this->load->view('pages-aboutus1');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function gallery()
	{
		$this->load->view('header');
		$this->load->view('pages-photogallery-4column');
		$this->load->view('footer');
	}

	public function reccon()
	{
		$this->load->view('header');
		$this->load->view('reccon');
		$this->load->view('footer');
	}
//..............................................................................................................................


	public function blogsidebar()
	{
		$this->load->view('header');
		$this->load->view('pages-blog-leftsidebar');
		$this->load->view('footer');
	}

	public function blogread()
	{
		$this->load->view('header');
		$this->load->view('pages-blog-read');
		$this->load->view('footer');
	}


	public function search()
	{
		$this->load->view('search-style2'); //vista complementaria
	}

	public function enviar_email()
	{
		$this->load->view('header');
		$this->load->view('enviar_email');
		$this->load->view('footer');
	}

	public function ep_hotdeals()
	{
		$this->load->view('header');
		$this->load->view('extra-pages-hotdeals');
		$this->load->view('footer');
	}

	public function ep_things_todo1()
	{
		$this->load->view('header');
		$this->load->view('extra-pages-things-todo1');
		$this->load->view('footer');
	}

	public function ep_travel_stories()
	{
		$this->load->view('header');
		$this->load->view('extra-pages-travel-stories');
		$this->load->view('footer');
	}

	public function hotel_booking()
	{
		$this->load->view('header');
		$this->load->view('hotel-booking');
		$this->load->view('footer');
	}
	public function hotel_thankyou()
	{
		$this->load->view('header');
		$this->load->view('hotel-thankyou');
		$this->load->view('footer');
	}

}
