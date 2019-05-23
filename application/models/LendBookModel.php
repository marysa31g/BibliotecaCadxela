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
			$this->db->select('numeroejemplar');
			$where['idlibro']=$data['idlibro'];
			$stock=$this->db->get_where('libros',$where)->result();
			
			$this->db->set('numeroejemplar',$stock[0]->numeroejemplar-1);
			$this->db->where('idlibro',$data['idlibro']);
			$result=$this->db->update('libros');
			
			return $result;
		}
		//obtiene la lista de prestamos de  un libro
		public function list_lend($id){
			//matriculas de los alumnos con idlibro 
			//Obtener sus nombres
			$this->db->select('*');
			$this->db->from('prestamo');
			$this->db->join('estudiante','estudiante.matricula = prestamo.matricula');
			$this->db->where('prestamo.idlibro',$id);
			$query=$this->db->get();

			return $query->result();
		}

		//Obtiene  el numero de prestamos de un libro
		public function countlend($id){
			$query=$this->db->where(['idlibro'=>$id])->from("prestamo")->count_all_results();
			return $query;	
		}

		//obtiene las coicidencias de Nombres de Estudiantes
		public function getstudent_like($info){
			$this->db->like('nombre',$info,'after');
			$query=$this->db->get("usuarios")->result();
			return $query;
		}
		public function getstudent($info){
			$where['nombre']=$info;
			$query=$this->db->get_where("usuarios",$where);
			return $query->result();
		}
	}
?>