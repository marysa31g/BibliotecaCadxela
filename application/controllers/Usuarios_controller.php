<?php
  
class Usuarios_controller extends CI_Controller{
    public function __construct() {

        parent::__construct();

        $this->load->helper("url"); 
         

        $this->load->model("usuarios_model");

        $this->load->library("session");
    }
     

    public function index(){
         
        $this->load->view('headerfoop/header');
        $usuarios["ver"]=$this->usuarios_model->ver();
        $this->load->view("usuarios_view",$usuarios);
    }
     

    public function add(){
         

        if($this->input->post("submit")){
        $add=$this->usuarios_model->add($this->input->post("email"),$this->input->post("password"),$this->input->post("nombre"),$this->input->post("apellido"), $this->input->post("tiporol"));
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }
     
    //controlador para modificar al que
    //le paso por la url un parametro
    public function mod($id_usuario){
        if(is_numeric($id_usuario)){
          $datos["mod"]=$this->usuarios_model->mod($id_usuario);
          $this->load->view("modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->usuarios_model->mod(
                        $id_usuario,
                        $this->input->post("submit"),
                        $this->input->post("email"),
                        $this->input->post("password"),
                        $this->input->post("nombre"),
                        $this->input->post("apellido"),
                        $this->input->post("tiporol")
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Usuario modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Usuario modificado correctamente');
                }
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }
     
    //Controlador para eliminar
    public function eliminar($idlibro){
        if(is_numeric($idlibro)){
          $eliminar=$this->Libros_model->eliminar($idlibro);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Libro eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Libro no eliminado');
          }
          redirect(Verlibros_controller);
        }else{
          redirect(Verlibros_controller);
        }
        redirect(Verlibros_controller);
    }
}
?>
