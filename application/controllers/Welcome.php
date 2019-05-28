<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Loginusermodel','user');
	}

	public function index(){
		if ($this->session->userdata('is_authenticated') == TRUE) {
			$this->user->setUserID($this->session->userdata('user_id'));
			$this->user->setRol($this->session->userdata('tiporol'));
			
        }
		$this->load->view('Contenido/Index');
		$this->load->view('headerfoop/header');
		$this->load->view('headerfoop/foop');
			
			
			
		
		
	
	}
	      
		// Login Action 
		function doLogin() {
			  
			$sessArray = array();
			//Field validation succeeded.  Validate against database
			$email = $this->input->post('username');
			$password = $this->input->post('password');
		
			$this->user->setEmail($email);
			//$this->user->setPassword(MD5($password));
			$this->user->setPassword($password);
		
			//query the database
			$result = $this->user->login();
			
			if($result) {
				foreach($result as $row) {
				$sessArray = array(
					'user_id' => $row->idusuario,
					'name' => $row->nombre,
					'tiporol' => $row->tiporol,
					'email' => $row->email,
					'is_authenticated' => TRUE
				);
				$this->session->set_userdata($sessArray);
				}
				//Redireccionar
				redirect('Welcome');
			} else {//No se encontró en la base de datos
				//redirect('welcome/login?msg=1');
				redirect('Welcome');
			} 
			
		}

	  // Logout
	  public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_authenticated');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('Welcome');
    }
	
}
