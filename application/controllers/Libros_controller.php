<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Libros_model");
	}

	public function index(){
		$this->load->view("headerfoop/header");
		$this->load->view("libros_view");
		$this->load->view("headerfoop/foop");
	}

	public function add(){
         

        if($this->input->post("submit")){
        $add=$this->Libros_model->add($this->input->post("titulo"),$this->input->post("ISBN"),$this->input->post("numeroejemplar"),$this->input->post("paginas"), $this->input->post("editorial"), $this->input->post("autor"));
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

    public function mod($idlibro){
        if(is_numeric($idlibro)){
          $datos["mod"]=$this->Libros_model->mod($idlibro);
          $this->load->view("modificar_libro",$datos);
          if($this->input->post("submit")){
                $mod=$this->Libros_model->mod(
                        $idlibro,
                        $this->input->post("submit"),
                        $this->input->post("titulo"),
                        $this->input->post("ISBN"),
                        $this->input->post("numeroejemplar"),
                        $this->input->post("paginas"),
                        $this->input->post("editorial"),
                        $this->input->post("nombre"),
                        $this->input->post("apellido"),
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Libro modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Libro no modificado');
                }
                redirect(Verlibros_controller);
            }
        }else{
            redirect(Verlibros_controller);
        }
    }

    

    public function eliminar($idlibro){
        if(is_numeric($idlibro)){
          $eliminar=$this->Libros_model->eliminar($idlibro);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Libro eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Libro no eliminaodo');
          }
          redirect(Verlibros_controller);
        }else{
          redirect(Verlibros_controller);
        }
    }


}