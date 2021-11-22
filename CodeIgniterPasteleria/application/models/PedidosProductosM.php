<?php
class PedidosProductosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	public function agregarProductoAlPedido($idProducto, $idPedido, $cantidad, $subtotal){
		$datos = array(
			'ID' => 0 ,
			'ID_Producto' => $idProducto,
			'ID_Pedido' => $idPedido,
			'cantidad' => $cantidad,
			'subtotal' => $subtotal
		);
		$this->db->insert('pedidos_productos', $datos);
		return $this->db->insert_id();
	}
	public function getPedidoProductoById($id){
	$consulta = $this->db->query("SELECT * FROM pedidos_productos WHERE id='{$id}'");
		$pedidos_productos = $consulta->row_array();
		if($pedidos_productos === null){
			return false;
		}else{
			return $pedidos_productos;
		}
	}
	public function getProductosbyPedido($idPedido){
		$this->db->select('*');
		$this->db->from('vw_productosVentas');
    	$this->db->where('idPedido', $idPedido );
		$query = $this->db->get();
		    if($query->result_array() == null){
		    	return false;
		    }else{
		    	return $query->result_array(); 
		    }
	}
}