<?php
class usuariosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		
		$this->load->database();
		$this->load->helper('url');
	}
	//La clase database esté disponible a través del objeto $this->db
	public function crearCuentaCliente(){
		
		//$this->load->library('input');
		$datos = array(
			'ID' => 0,
			'nombres' => $this->input->post('nombres'),
			'apellidos' => $this->input->post('apellidos'),
			'edad' => $this->input->post('edad'),
			'correo' => $this->input->post('correo'),
			'clave' => $this->input->post('clave'),
			'tipo' => 6
		);
		$this->db->insert('usuarios', $datos);
		return $datos;
	}
	public function validarCorreo($correo){
	$consulta = $this->db->query("SELECT * FROM usuarios WHERE correo='{$correo}'");
		$usuario = $consulta->row_array();
		if($usuario === null){
			return false;
		}else{
			return $usuario;
		}
	}
	public function getUsuarioById($id){
	$consulta = $this->db->query("SELECT * FROM usuarios WHERE id='{$id}'");
		$usuario = $consulta->row_array();
		if($usuario === null){
			return false;
		}else{
			return $usuario;
		}
	}
}