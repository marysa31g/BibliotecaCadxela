<?php
class Prestamos_Model extends CI_Model{

	public function mostrar($data){
		return $this->db->get('prestamo');
	}

	public function mostrardato($name=''){
		$this->db->query("SELECT * FROM prestamo WHERE prestamo= '".$name."'LIMIT 1");
		return $result->row();

	}
	/*metodo para obtener todos los estudiantes con prestamo
	public function obtenerEstudiante(){
		$result = $this->db->query('SELECT * FROM estudiante');
		$prestamoUsers = $result->result_array();
		return $prestamoUsers;
	}

	/*metodo para obtener todos los libros prestados
	public function obtenerLibrosPrestados(){
		$result=$this->db->query('SELECT * FROM libros,estudiante,prestamo WHERE prestamo.matricula=estudiante.matricula and prestamo.idlibro=libros.idlibro;');
		$librosPrestados = $result->result_array();
		return $librosPrestados;
	}

	

*/
}