<?php
               //extendemos CI_Model
class Libros_model extends CI_Model{
    public function __construct() {
        parent::__construct();
         
       
        $this->load->database();
    }
     
    /*public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM usuarios;");
         
 
        return $consulta->result();
    }*/
     
    public function add($titulo,$isbn,$numeroejemplar,$paginas,$editorial,$autor){
      $consulta=$this->db->query("INSERT INTO libros (titulo,ISBN,numeroejemplar,paginas,editorial) VALUES($titulo,$isbn,$numeroejemplar,$paginas,$editorial);");

      $consulta2=$this->db>query("SELECT MAX(idlibro) AS idlibro FROM libros");
      $idlibro = $consulta2->result_array(1);

      $consulta3=$this->db>query("SELECT idautor FROM autores WHERE autores.nombre = $autor ");
      $idautor = $consulta3->result_array(1);

      $consulta4=$this->db->query("INSERT INTO autores_libro (idlibro,idautor) VALUES($idlibro,$idautor);");
     


      //$consulta2->$this->db->query("INSERT INTO autores_libro (dlibro,idautor) VALUES($idlibro,$idlibro);");

        /*$consulta=$this->db->query("SELECT email FROM usuarios WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO usuarios(nombre,apellido,tiporol,email,password) VALUES('$nombre','$apellido','$tiporol','$email','$password');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }*/
    }
     
    /*public function mod($id_usuario,$modificar="NULL",$email="NULL",$password="NULL",$nombre="NULL",$apellido="NULL"){
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
    }*/
 
 
}
?>