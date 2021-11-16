<?php
class ClientesC extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Cargar las librerias requeridas
		$this->load->helper('form');
		$this->load->library('form_validation');
		//Importar modelo de usuarios
		$this->load->model('usuariosM');
		//helper para strings
		$this->load->helper('url_helper');
		
		
	}
	public function perfil($id){
		if (!file_exists(APPPATH.'views/clientes/perfil.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cliente=$this->usuariosM->getUsuarioById($id);
		if($cliente === false){
			//Cargar vista de redireccion al login
		}else{
			//cargar la plantilla de perfil del sitio
			$datos['cliente']=$cliente;
			$this->load->view('clientes/cabecera', $datos);
			$this->load->view('clientes/perfil', $datos);
		}
	}
	public function verCatalogo($id){
		if (!file_exists(APPPATH.'views/clientes/catalogo.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cliente=$this->usuariosM->getUsuarioById($id);
		if($cliente === false){
			//Cargar vista de redireccion al login
		}else{
			//cargar la plantilla de catalogo del sitio de los clientes
			$datos['cliente']=$cliente;
			$this->load->model('productosM');
			$datos['productos'] = $this->productosM->getProductos();
			$this->load->view('clientes/cabecera', $datos);
			$this->load->view('clientes/catalogo', $datos);
		}
	}
	
	public function busquedaTipo($id, $tipoProducto){
		if (!file_exists(APPPATH.'views/clientes/cabecerabusqueda.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cliente=$this->usuariosM->getUsuarioById($id);
		if($cliente === false){
			//Cargar vista de redireccion al login
		}else{
			//cargar la plantilla de catalogo del sitio de los clientes
			$datos['cliente']=$cliente;
			$this->load->model('tipoProductosM');
			$datos['tipoProductos'] = $this->tipoProductosM->getTipoProductos();
			$this->load->model('productosM');
			$datos['productos'] = $this->productosM->getProductoByTipo($tipoProducto);
			$this->load->view('clientes/cabecera', $datos);
			$this->load->view('clientes/cabecerabusqueda', $datos);
			if($datos['productos']===false){
				$this->load->view('clientes/sinProducto', $datos);
			}else{
				$this->load->view('clientes/catalogo', $datos);
			}
			
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
	public function PagarPedido($idCliente,$idPedido){
		if (!file_exists(APPPATH.'views/clientes/PagarPedido.php')){
			show_404();
			echo 'Cáspita ... no tenemos una pagina para esto!';
		}

	}
	
}
