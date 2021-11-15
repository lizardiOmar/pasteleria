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
	
	public function abrirPedidos($id){
		if (!file_exists(APPPATH.'views/clientes/CrearVenta.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cliente=$this->usuariosM->getUsuarioById($id);
		$idPedido=$this->PedidosM->iniciarPedidoCaja($id);
		if($cliente === false){
			//Cargar vista de redireccion al login
		}else{
			if($cliente['tipo'] === '6'){
				//cargar la plantilla de edministación del punto de venta
				$datos['cliente']=$cliente;
				$datos['idPedido']=$idPedido;
				$this->load->view('clientes/cabecera', $datos);
				//$this->load->view('clientes/caja.php', $datos);
				$this->load->view('clientes/CrearVenta.php', $datos);
			}else{
				echo "Vaya ".$cliente['nombres'].$cliente['apellidos'].", parece que no tienes un perfil de cliente registrado.";
			}
				
		}
	}

	public function carrito($idCliente, $idPedido){
		if (!file_exists(APPPATH.'views/clientes/caja.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cliente=$this->usuariosM->getUsuarioById($idCliente);
		if($cliente === false){
			//Cargar vista de redireccion al login
		}else{
			if($cliente['tipo'] === '6'){
				//cargar la plantilla de edministación del punto de venta
				$datos['cliente']=$cliente;
				$datos['idPedido']=$idPedido;
				$datos['pedido']= $this->PedidosM->getPedidoById($idPedido);
				$this->load->model('productosM');
				$datos['productos'] = $this->productosM->getProductos();
				
				$this->load->view('clientes/cabecera.php', $datos);
				$this->load->view('clientes/cabeceraCarrito.php', $datos);
				$this->load->view('clientes/caja.php', $datos);
				$this->load->view('Clientes/catalogoPedido.php', $datos);
				//$this->load->view('cajeros/pie.php', $datos);
			}else{
				echo "Vaya ".$cliente['nombres'].$cliente['apellidos'].", parece que no tienes un perfil de cajero registrado.";
			}
		}
	}


	public function agregarAlCarritoCliente($idPedido, $idCliente, $idProducto){
		if (!file_exists(APPPATH.'views/clientes/agregarAlCarrito.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$producto=$this->productosM->getProductoById($idProducto);
		$datos['msg_1'] = "";
		$datos['clienteID']=$idCliente;
		$datos['idPedido']=$idPedido;
		$datos['producto']=$producto;
		$datos['pedido']= $this->PedidosM->getPedidoById($idPedido);
		$this->form_validation->set_rules(
			'cantidad',//nombre del imput del formulario
			'cantidad',//etiqueta para mensajes de salida
			'min_length[1]|max_length[3]|numeric|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar la %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar la %s son 3.',
				'numeric' => 'Solo se permiten numeros para la %s'
			)
		);
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('clientes/agregarAlCarrito.php', $datos);
		}else{
			$cantidad=$this->input->post('cantidad');
			$subtotal=$cantidad*$producto['precio'];
			$datos['idPedidoProducto']=$this->PedidosProductosM->agregarProductoAlPedido($idProducto, $idPedido, $cantidad, $subtotal);
			$this->load->view('clientes/resultadoCarrito.php', $datos);
		}
	}
}
