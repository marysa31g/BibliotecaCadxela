<?php
defined('BASEPATH') OR exit('No direct scrript acces allowed') ;

	class Librosdis_Model extends CI_Model
	{
		
		public function __construct()
		{
			# code...
		}

		public function ver(){
        //Hacemos una consulta
        	$consulta=$this->db->query("SELECT lb.*, p.idprestamo,p.idlibro FROM libros as lb LEFT JOIN prestamo as p on lb.idlibro = p.idlibro WHERE p.idlibro IS null;");
         
        	return $consulta->result();
    	}
		
	}
?>