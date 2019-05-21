<?php
defined('BASEPATH') OR exit('No direct scrript acces allowed') ;

	class LendBookModel extends CI_Model
	{
		
		public function __construct()
		{
			# code...
		}
		public function getBooks(){
			$books=$this->db->get('libros');
			return $books;
		}
		public function addlend($data){
			$result=$this->db->insert('prestamo',$data);
			//Reducir el numero de ejemplares en stock
			/*

			*/
			return $result;
		}
		//Obtiene el stock de un libro
		public function getstock($id)
		{

		}
		public function countlend($id){
			//SELECT COUNT(idlibro) FROM prestamo where idlibro=4
		}
		//Obtiene los datos de un estudiante
		/*public function get_student($id)
		{


		}*/
	}
?>