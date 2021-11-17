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
	public function getProductosbyPedido($idPedido){
		$this->db->select('*');
		    $this->db->from('pedidos_productos');
    		$this->db->where('ID_Pedido', $idPedido );
		    $query = $this->db->get();
		    if($query->result_array() == null){
		    	return false;
		    }else{
		    	return $query->result_array(); 
		    }
	}
}
