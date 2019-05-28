<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adeudos extends CI_Controller{

	public function index(){
		$result=$this->db->get('adeudos');
		$data = array('consulta'=>$result);
		$this->load->view('headerfoop/header');
		$this->load->view('view_adeudos',$data);
		$this->load->view('headerfoop/foop');
	}
	
	public function verAdeudo(){
		$result=$this->db->get('adeudos');
		$data = array('consu'=>$res);
	}



}