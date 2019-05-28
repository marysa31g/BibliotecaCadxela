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
		$this->db->query("SELECT count (*) FROM adeudos WHERE adeudos= '".$name."'LIMIT 1");
		return $res->row();

	}
}