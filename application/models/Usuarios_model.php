<?php
               //extendemos CI_Model
class usuarios_model extends CI_Model{
    public function __construct() {
        parent::__construct();
         
       
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM usuarios;");
         
 
        return $consulta->result();
    }
     
    public function add($email,$password,$nombre,$apellido,$tiporol){
        $consulta=$this->db->query("SELECT email FROM usuarios WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO usuarios(nombre,apellido,tiporol,email,password) VALUES('$nombre','$apellido','$tiporol','$email','$password');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($id_usuario,$modificar="NULL",$email="NULL",$password="NULL",$nombre="NULL",$apellido="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM usuarios WHERE idusuario=$id_usuario");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', password='$password' WHERE idusuario=$id_usuario;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_usuario){
       $consulta=$this->db->query("DELETE FROM usuarios WHERE idusuario=$id_usuario");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>
