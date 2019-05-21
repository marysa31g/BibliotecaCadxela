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
	public function getList(){
		$data=$this->LendBookModel->getBooks();
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


}
