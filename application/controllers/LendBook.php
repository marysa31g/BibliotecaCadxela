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
	//Obtiene la lista de libros
	public function getList(){
		$data=array("data"=>$this->array_books());
		header('Content-type: application/json');
		echo json_encode($data);
	}
	//obtiene la lista de prestamos de un libro
	public function get_lends(){
		$idb=$this->input->post('idb');
		$data=array("data"=>$this->array_lends($idb));
		header('Content-type: application/json');
		echo json_encode($data);

	}
	public function array_lends($id){
		
		$result=$this->LendBookModel->list_lend($id);
		$aux=array();
		foreach ($result as $r){
			//$acciones=$this->acctions($r->idlibro,$r->titulo,$r->numeroejemplar,$cou);

			$array=array(
				"matricula"=>$r->matricula,
				"nombre"=>$r->nombre,
				"apellido"=>$r->apellido,
				"inicio"=>$r->fechaprestamo,
				"fin"=>$r->fechalimite
				//"actions"=>$acciones
			);
			array_push($aux,$array);
		}
		
		return $aux;

	}
	public function saveLend(){
		//Generar las fechas de inicio y fin de prestamos
		$matricula=$this->input->post('matricula');
		$idbook=$this->input->post('idbook');
		$inicio=date("Y-m-d");
		$date=new Datetime($inicio);
		$date->modify("+3 day");
		$limite=$date->format("Y-m-d");

		$data=array(
			'matricula'=>$matricula,
			'fechaprestamo'=>$inicio,
			'fechalimite'=>$limite,
			'fechadevolucion'=>'',
			'idlibro'=>$idbook
		);
		

		$result=$this->LendBookModel->addLend($data);
		
		echo $result;
	}

	public function autocomplete(){
		$info=$this->input->post('query');
		//Verificar si coincide con algun usuario válido
		$x=$this->LendBookModel->getstudent($info);
		$result="";
		if(count($x)>0){
			$result="1";
		}else{//Mostrar sugerencias
			$res=$this->LendBookModel->getstudent_like($info);
			//crear resultado del datalist de sugerencias
			
			if(count($res)>0){	
				foreach($res as $r){
						$result.="<option value='".$r->matricula."' data-listuser='".$r->matricula."'>".$r->nombre." ".$r->apellido. "</option>";
				}	
			}
			

		}
		echo $result;
	}


}
