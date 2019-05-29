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
     
    public function add($titulo,$ISBN,$numeroejemplar,$paginas,$editorial,$autor){
      $consulta=$this->db->query("INSERT INTO libros (titulo,ISBN,numeroejemplar,paginas,editorial) VALUES('$titulo','$ISBN','$numeroejemplar','$paginas','$editorial');");

      $consulta2=$this->db->query("SELECT MAX(idlibro) AS idlibro FROM libros");
      foreach ($consulta2->result_array() as $row) { $idlibro = $row['idlibro'];} 
      //$idlibro = $consulta2->result_array();

      //$consulta3=$this->db->query("SELECT idautor FROM autores WHERE autores.nombre = '$autor' ");
      //$idautor = $consulta3->result_array(1);

      $consulta3=$this->db->query("INSERT INTO autores_libro (idlibro,idautor) VALUES('$idlibro','$autor');");
      if($consulta == true and $consulta2==true and $consulta3==true){
        return true;
      }else{
        return false;
      }
     
    }

    public function mod($idlibro,$modificar="NULL",$titulo="NULL",$ISBN="NULL",$numeroejemplar="NULL",$paginas="NULL",$editorial="NULL",$nombre="NULL",$apellido="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT libros.idlibro, libros.titulo, libros.ISBN, libros.numeroejemplar, libros.paginas,libros.editorial, autores.nombre, autores.apellido FROM libros, autores_libro, autores WHERE libros.idlibro = autores_libro.idlibro AND autores_libro.idautor = autores.idautor AND libros.idlibro=$idlibro");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE libros SET titulo='$titulo', ISBN='$ISBN', numeroejemplar='$numeroejemplar', paginas='$paginas', editorial = '$paginas' WHERE idlibro=$idlibro;
                  ");
          $consulta2=$this->db->query("SELECT autores.idautor FROM libros, autores_libro, autores WHERE libros.idlibro = autores_libro.idlibro AND autores_libro.idautor = autores.idautor AND libros.idlibro=$idlibro");
          foreach ($consulta2->result_array() as $row) { $idautor = $row['idautor'];} 


          $consulta3=$this->db->query("
              UPDATE autores SET nombre='$nombre', apellido='$apellido' WHERE idautor = $idautor;
                  ");
          if($consulta==true and $consulta2==true and $consulta3==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
 
 public function eliminar($idlibro){
        $consulta=$this->db->query("DELETE FROM autores_libro WHERE idlibro=$idlibro");
       $consulta2=$this->db->query("DELETE FROM libros WHERE idlibro=$idlibro");
       if($consulta==true and $consulta2){
           return true;
       }else{
           return false;
       }
    }
}
?>