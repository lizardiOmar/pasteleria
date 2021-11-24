<?php
class direcciones_UsuarioM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	//La clase database esté disponible a través del objeto $this->db
	public function getUsuarioDireccionesById($id){
		$query = $this->db->select('*')
						  ->from('usuarios_direcciones')
						  //->join('direcciones')
						  ->where('ID_usuario',$id)
						  ->get();
		$usuario = $query->row_array();
		if($usuario === null){
			return false;
		}else{
			return $usuario;
		}
	}
}