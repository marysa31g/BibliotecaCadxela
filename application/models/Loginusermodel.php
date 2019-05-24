<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Loginusermodel extends CI_Model {
            // declare private variable
            private $_userID;
            private $_name;
            private $_userName;
            private $_email;
            private $_password;
            private $_rol;
            private $_status;
            
            public function setUserID($userID) {
                $this->_userID = $userID;
            } 
            public function setRol($rol) {
                $this->_rol = $rol;
            }  
            public function setEmail($email) {
                $this->_email = $email;
            }
            public function setPassword($password) {
                $this->_password = $password;
            }  
            
            public function getUserInfo() {
                $this->db->select(array('u.idusuario', 'u.nombre', 'u.email','u.tiporol'));
                $this->db->from('usuarios as u');
                $this->db->where('u.idusuario', $this->_userID);
                $query = $this->db->get();
                return $query->row_array();
              } 

              //Buscar el usuario en la base de datos
              function login() {
                $this -> db -> select('*');
                $this -> db -> from('usuarios');
                $this -> db -> where('email', $this->_email);
                $this -> db -> where('password', $this->_password);
                $this -> db -> limit(1);
                $query = $this -> db -> get();
                if($query -> num_rows() == 1) {
                  return $query->result();
                } else {
                  return false;
                }
              }  
    }

?>