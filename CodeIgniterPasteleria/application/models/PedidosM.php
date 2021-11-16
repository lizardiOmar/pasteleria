<?php
class PedidosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	public function iniciarPedidoCaja($idCajero){
		
		$datos = array(
			'ID' => 0 ,
			'total' => 0,
			'descuento' => 0,
			'total' => 0,
			'tipo' => 1,
			'estado' => 1,
			'usuario' => $idCajero
		);
		
		$this->db->insert('pedidos', $datos);
		return $this->db->insert_id();;

	}
	
	public function getPedidoById($id){
	$consulta = $this->db->query("SELECT * FROM pedidos WHERE id='{$id}'");
		$producto = $consulta->row_array();
		if($producto === null){
			return false;
		}else{
			return $producto;
		}
	}
	public function updateSubtotal($idPedido, $subtotal){
		$this->db->set('subtotal',$subtotal);
		$this->db->where('id', $idPedido);
		$this->db->update('pedidos'); 
		
	}
}