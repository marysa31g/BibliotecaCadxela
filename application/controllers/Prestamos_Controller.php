<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prestamos_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		/*Cargando modelo de prestamos*/
		$this->load->model('Prestamos_Model', 'Presta', true);
	}

	public function index(){
		$this->load->view('view_prestamos');
	}

	public function insertarPrestamo(){
		$res=$this->Presta->insertarPrestamo();
		$Info['mensaje']=($res)?"Prestamo Registrado":"Hubo un error en insertar el prestamo del libro";
		$Info['Prestamos']=$this->Presta->obtenerPrestamos();

		$this->load->view('view_prestamos',$Info);

	}
}