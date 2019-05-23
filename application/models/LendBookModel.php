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
			return $books->result();
		}
		public function addlend($data){
			$result=$this->db->insert('prestamo',$data);
			//Reducir el numero de ejemplares en stock
			/*

			*/
			return $result;
		}
		//obtiene la lista de prestamos de  un libro
		public function list_lend($id){
			//matriculas de los alumnos con idlibro 
			//Obtener sus nombres
			$where['idlibro']=$id;
			$query=$this->db->get_where("prestamo",$where);

			return $query->result();
		}
		public function countlend($id){
			$query=$this->db->where(['idlibro'=>$id])->from("prestamo")->count_all_results();
			return $query;
			
		}
		//obtiene las coicidencias de Nombres de Estudiantes
		public function getstudent($info){
			$this->db->like('nombre',$info);
			$query=$this->db->get("usuarios")->result();

			$this->db->select('nombre');
			$this->db->from('usuarios');
			$this->db->like('nombre',$info);
			//$this->db->or_like();
			$query=$this->db->get();
			return $query->result();

		}
		//Obtiene los datos de un estudiante
		/*public function get_student($id)
		{


		}*/
	}
?>