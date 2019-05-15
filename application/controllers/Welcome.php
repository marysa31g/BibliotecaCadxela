<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('Contenido/Index');
		$this->load->view('headerfoop/header');
		$this->load->view('headerfoop/foop');
		
	}
}
