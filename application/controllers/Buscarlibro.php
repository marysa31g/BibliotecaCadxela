<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscarlibro extends CI_Controller {


	public function index()
	{
		$result=$this->db->get('libros');
		$data = array('consulta'=>$result);
		
		$this->load->view('headerfoop/header');
		$this->load->view('Contenido/buscar_libro',$data);
		$this->load->view('headerfoop/foop');
	}

}
