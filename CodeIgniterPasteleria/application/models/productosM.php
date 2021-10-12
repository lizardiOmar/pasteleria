<?php
class productosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	//La clase database esté disponible a través del objeto $this->db
	public function getProductos($idProducto = FALSE){
		if ($idProducto === FALSE){
			$query = $this->db->get('productos_clientes_catalogo');
			return $query->result_array();
		}
		return $query->row_array();
	}
	public function getProductoById($id){
	$consulta = $this->db->query("SELECT * FROM productos WHERE id='{$id}'");
		$usuario = $consulta->row_array();
		if($usuario === null){
			return false;
		}else{
			return $usuario;
		}
	}
}