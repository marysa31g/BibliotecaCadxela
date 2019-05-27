<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Libros_Model");
	}

	public function index(){
		$this->load->view("headerfoop/header");
		$this->load->view("libros_view");
		$this->load->view("headerfoop/foop");
	}

	public function add(){
         

        if($this->input->post("submit")){
        $add=$this->Libros_Model->add($this->input->post("titulo"),$this->input->post("ISBN"),$this->input->post("numeroejemplar"),$this->input->post("paginas"), $this->input->post("editorial"), $this->input->post("autor"));
        }
        if($add==true){
            //Sesion de una sola ejecución
            redirect(Verlibros_controller);
        }else{
            redirect(Libros_controller);
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }


}