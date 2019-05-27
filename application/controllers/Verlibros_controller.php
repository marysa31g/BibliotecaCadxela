<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verlibros_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Verlibros_Model");
	}

	public function index(){
		$this->load->view("headerfoop/header");
		$this->load->view("Verlibros_view");
		$this->load->view("headerfoop/foop");
	}
	public function array_books(){
		$result=$this->Verlibros_Model->ver();

		$aux=array();
		foreach ($result as $r){

			$array=array(
				"idlibro"=>$r->idlibro,
				"titulo"=>$r->titulo,
				"ISBN"=>$r->ISBN,
				"numeroejemplar"=>$r->numeroejemplar,
				"paginas"=>$r->paginas,
				"editorial"=>$r->editorial,
				"nombre"=>$r->nombre,
				"apellido"=>$r->apellido,
			);
			array_push($aux,$array);
		}

		return $aux;

	}
	
	public function getList(){
		$data=array("data"=>$this->array_books());
		header('Content-type: application/json');
		echo json_encode($data);

	}


}