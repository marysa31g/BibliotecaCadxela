<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buscarlibro extends CI_Model
{

  public function mostrar($data)
  {
  return $this->db->get('libros');
  }

  public function mostrardato($name='')
  {
    $this->db->query("SELECT * FROM libros WHERE libros= '".$name."'LIMIT 1");
    return $result->row();
    
  }

}