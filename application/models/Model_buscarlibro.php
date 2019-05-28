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

	public function verlibro($busqueda)
	{
		return $this->db->query("SELECT * FROM (SELECT libros.titulo,libros.ISBN,libros.paginas,libros.numeroejemplar, libros.editorial,autores.nombre, autores.apellido from autores INNER JOIN autores_libro ON autores.idautor=autores_libro.idautor INNER JOIN libros on libros.idlibro=autores_libro.idlibro) as busqueda WHERE busqueda.titulo='{$busqueda}' or  busqueda.nombre='{$busqueda}'")->result();
		if ($busqueda->num_rows()>0) {
			return $busqueda->result();
		}else{
			return false;
		}
	}

	
	/*

	SELECT libros.titulo,estudiante.nombre,adeudos.matricula,adeudos.fechareposicion from adeudos INNER JOIN estudiante ON estudiante.matricula=adeudos.matricula INNER JOIN libros ON libros.idlibro=adeudos.idlibro;
	*/


}