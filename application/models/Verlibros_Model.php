<?php
defined('BASEPATH') OR exit('No direct scrript acces allowed') ;

	class Verlibros_Model extends CI_Model
	{
		
		public function __construct()
		{
			# code...
		}

		public function ver(){
        //Hacemos una consulta
        	$consulta=$this->db->query("SELECT libros.idlibro, libros.titulo, libros.ISBN, libros.numeroejemplar, libros.paginas,libros.editorial, autores.nombre, autores.apellido FROM libros, autores_libro, autores WHERE libros.idlibro = autores_libro.idlibro AND autores_libro.idautor = autores.idautor;");
         
        	return $consulta->result();
    	}
		
	}
?>