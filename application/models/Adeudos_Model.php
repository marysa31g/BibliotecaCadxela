<?php
class Prestamos_Model extends CI_Model{

	public function mostrar($data){
		return $this->db->get('adeudos');
	}

	public function mostrardato($name=''){
		$this->db->query("SELECT * FROM adeudos WHERE adeudos= '".$name."'LIMIT 1");
		return $result->row();

	}
		public function obtenerAdeudos(){
		$result=$this->db->query('SELECT * FROM libros,estudiante,adeudos WHERE adeudos.matricula=estudiante.matricula and adeudos.idlibro=libros.idlibro;');
		$librosAdeudos = $result->result_array();
		return $librosAdeudos;
	}


	/*metodo para insertar un adeudo
	public function insertarPrestamo(){
		if($this->input->post()){
			$prestamos=array(
				'idprestamo'=>$this->input->post('idprestamo'),
				'matricula'=>$this->input->post('matricula'),
				'fechaprestamo'=>$this->input->post('fechaprestamo'),
				'fechalimite'=>$this->input->post('fechalimite'),
				'fechadevolucion'=>=>$this->input->post('fechadevolucion'),
				'idlibro'=>$this->input->post('idlibro')
			);
			$resultado = $this->db->insert('prestamo',$prestamos);
			if($resultado)
				return true;
		}
		return false;
	}
	
	/*metodo para insertar un adeudo
	public function insertarAdeudo(){
		if($this->input->post()){
			$adeudos=array(
				'idadeudo'=>$this->input->post('idadeudo'),
				'matricula'=>$this->input->post('matricula'),
				'descripcionadeudo'=>$this->input->post('descripcionadeudo'),
				'fechaadeudo'=>$this->input->post('fechaadeudo'),
				'fechareposicion'=>=>$this->input->post('fechareposicion'),
				'idlibro'=>$this->input->post('idlibro')
			);
			$result = $this->db->insert('adeudos',$adeudos);
			if($result)
				return true;
		}
		return false;
	}
}