<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamos extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		/*Cargando modelo de prestamos*/
		$this->load->model('prestamos_Model', 'Presta', true);
	}

	public function index(){
		$result=$this->db->get('prestamo');
		$data = array('consulta'=>$result);
		$this->load->view('headerfoop/header');
		$this->load->view('view_prestamos',$data);
		$this->load->view('headerfoop/foop');
	}



	public function insertarPrestamo(){
		$res=$this->Presta->insertarPrestamo();
		$Info['mensaje']=($res)?"Prestamo Registrado":"Hubo un error en insertar el prestamo del libro";
		$Info['Prestamos']=$this->Presta->obtenerPrestamos();

		$this->load->view('view_prestamos',$Info);
	}
}