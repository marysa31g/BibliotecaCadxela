<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buscarlibro extends CI_Model
{

	public function mostrar($data){
		return $this->db->get('libros');
	}

	public function mostrardato($name=''){
		$this->db->query("SELECT * FROM libros WHERE libros= '".$name."'LIMIT 1");
		return $result->row();

	}

	public function buscarporNombre($nombre){
		$this->db->select('*');
		$this->db->from('libros');
		$this->db->join('autores_libro a1', 'a1.idlibro = libros.idlibro', 'left');
		$this->db->join('autores', 'autores.idautor = a1.idautor', 'left');
		$this->db->like('libros.titulo', $nombre);
		$this->db->like('titulo', $nombre);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return null;
		}	
	}

}