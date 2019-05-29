<?php
	class Verlibros_controller extends CI_Controller{
    public function __construct() {

        parent::__construct();

        $this->load->helper("url"); 
         

        $this->load->model("Verlibros_Model");

        $this->load->library("session");
    }
     

    public function index(){
         
        $this->load->view('headerfoop/header');
        $libros["ver"]=$this->Verlibros_Model->ver();
        $this->load->view("Verlibros_view",$libros);
    }
     

   }
?>