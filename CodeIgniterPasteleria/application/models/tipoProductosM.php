<?php
class tipoProductosM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	//La clase database esté disponible a través del objeto $this->db
	public function getTipoProductos($idProducto = FALSE){
		if ($idProducto === FALSE){
			$query = $this->db->get('tipos_de_producto');
			return $query->result_array();
		}
		return $query->row_array();
	}
}