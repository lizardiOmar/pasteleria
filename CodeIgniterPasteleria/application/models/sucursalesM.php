<?php
class sucursalesM extends CI_Model {
	// crea un nuevo modelo al extender CI_Model y carga la biblioteca de Base de datos  a través del objeto $this->db
	public function __construct(){
		$this->load->database();
	}
	//La clase database esté disponible a través del objeto $this->db
	public function getSucursales($idSucursal = FALSE){
		if ($idSucursal === FALSE){
			$query = $this->db->get('sucursales');
			return $query->result_array();
		}
		return $query->row_array();
	}
}
