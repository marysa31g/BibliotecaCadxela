<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscarlibro extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_buscarlibro','BL',true);
	}

	public function index()
	{
		$result=$this->db->get('libros');
		$data = array('consulta'=>$result);
		$this->load->view('headerfoop/header');
		$this->load->view('Contenido/buscar_libro',$data);
		$this->load->view('headerfoop/foop');
	}


	public function buscar(){
		if ($_POST) {
			$libro=$this->input->post('inputLibro');
		}else{
			$libro='';
		}
		if ($libro!='') {
			$Datos=$this->BL->verlibro($libro);
			$this->load->view('headerfoop/header');
			$this->load->view('Contenido/busqueda',compact("Datos"));
		}else{
		}
	}

	
		


}
