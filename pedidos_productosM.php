<?php
class pedidos_productosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
		$this->load->model('productoM');
	}
	public function setPedidoProductoDef($idproduto,$idpedido,$cantidad){
		$producto = $this->getProductoById($idproduto);
		$precio = $cantidad*$producto['precio']
		$datos => array(
			'ID' => 0 ,
			'ID_Producto' => $idproduto,
			'ID_Pedido' => $idpedido,
			'cantidad' => $cantidad,
			'subtotal' => $precio,
			 );
		$this->db->insert('pedidos', $datos);
		return $datos;

	}
}
