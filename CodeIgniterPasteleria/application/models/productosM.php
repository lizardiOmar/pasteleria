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
		$producto = $consulta->row_array();
		if($producto === null){
			return false;
		}else{
			return $producto;
		}
	}
	
	
	public function getProductoByTipo($tipoProducto){
		    $this->db->select('*');
		    $this->db->from('productos');
    		$this->db->where('tipo', $tipoProducto );
		    $query = $this->db->get();
		    if($query->result_array() == null){
		    	return false;
		    }else{
		    	return $query->result_array(); 
		    }
		    
	}
	
	
	
	public function setProductos(){
		$datos = array(
			'ID' => 0,
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'precio' => $this->input->post('precio'),
			'cantidad' => $this->input->post('cantidad'),
			'cantidad_minima' => $this->input->post('cantidad_minima'),
			'tipo' => $this->input->post('tipo')
		);
		$this->db->insert('productos', $datos);
		return $datos;
	}
}
