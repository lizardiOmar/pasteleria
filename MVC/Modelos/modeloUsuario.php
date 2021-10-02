<?php
	class ModeloUsuario extends CI_Model{
		//Cargar las librerias de la base de datos en el constructor de esta clase 
		public function __construct() {
			$this->load->database();
		}
		//Función para recuperar el usuario por la contraseña
		public function getUsuarioByCorreo($correo){
			if ($correo!=FALSE){
				$query = $this->db->get_where('usuarios', array('correo' => $correo));
				return $query->row_array();
			}else {
				return FALSE;
			}
		}
	}
?>