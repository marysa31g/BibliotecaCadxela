<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LendBook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LendBookModel");
	}

	public function index(){
		$this->load->view("headerfoop/header");
		$this->load->view("LendBook");
		$this->load->view("headerfoop/foop");
	}
	public function array_books(){
		//$data['books']=$this->LendBookModel->getBooks();
		$result=$this->LendBookModel->getBooks();
		$aux=array();
		foreach ($result as $r){
			$cou=$this->LendBookModel->countlend($r->idlibro);
			$acciones=$this->acctions($r->idlibro,$r->titulo,$r->numeroejemplar,$cou);

			$array=array(
				"idlibro"=>$r->idlibro,
				"titulo"=>$r->titulo,
				"ISBN"=>$r->ISBN,
				"numeroejemplar"=>$r->numeroejemplar,
				"paginas"=>$r->paginas,
				"editorial"=>$r->editorial,
				"prestamos"=>$cou,
				"actions"=>$acciones
			);
			array_push($aux,$array);
		}

		/*$data['books']=$aux;
		$this->load->view("headerfoop/header");
		$this->load->view('test',$data);
		$this->load->view("headerfoop/foop");*/
		return $aux;

	}
	private function acctions($id,$title,$stock,$prestamos){
		//Buton mostrar prestamos
		$buttons="";
		if($prestamos>0){
			$buttons.="<button type='button' class='btn btn-outline-info' data-toggle='modal' data-id='".$id."' data-titlebook='".$title."' data-target='#viewlends' >Mostrar Prestamo</button>";
		}else{
			$buttons.="<button type='button' class='btn btn-outline-info' disabled>Mostrar Prestamo</button>";
		}
		//Button realizar prestamo
		if($stock>0){
			$buttons.="<button type='button' class='btn btn-outline-primary' data-toggle='modal' data-id='".$id."' data-titlebook='".$title."' data-target='#lend'>Prestar Libro</button>";
		}else{
			$buttons.="<button type='button' class='btn btn-outline-primary' disabled>Prestar Libro</button>";
		}
		
		

		return $buttons;
	}
	public function getList(){
		/*$data=array("data"=>$this->LendBookModel->getBooks());
		header('Content-type: application/json');
		echo json_encode($data);*/
		$data=array("data"=>$this->array_books());
		header('Content-type: application/json');
		echo json_encode($data);

	}
	public function saveLend(){
		$data=array(
			'matricula'=>$this->input->post('matricula'),
			'fechaprestamo'=>$this->input->post('inicio'),
			'fechalimite'=>$this->input->post('limite'),
			'idlibro'=>$this->input->post('idbook'),
		);

		$result=$this->LendBook->addLend($data);
	}

	public function autocomplete(){
		$info=$this->input->get('query');
		$res=$this->LendBookModel->getstudent($info);
		 echo json_encode($res);

	}


}
