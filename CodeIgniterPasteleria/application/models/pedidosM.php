<?php
class pedidosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	public function setPedidoDef($idUsuario){
		$datos => array(
			'ID' => 0 ,
			'total' =>0,
			'descuento' => 0,
			'subtotal' => 0,
			'tipo' => 2,
			'estado'=> 1,
			'usuario'=>$idUsuario
			 );
		$this->db->insert('pedidos', $datos);
		return $datos;

	}
}
