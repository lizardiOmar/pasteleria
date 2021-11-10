<?php
class CajerosC extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Cargar las librerias requeridas
		$this->load->helper('form');
		$this->load->library('form_validation');
		//Importar modelo de usuarios
		$this->load->model('usuariosM');
		//Importar modelo de productos
		$this->load->model('productosM');
		$this->load->model('PedidosM');
		$this->load->model('PedidosProductosM');
		//Importar modelo de tipos de producto
		//helper para strings
		$this->load->helper('url_helper');
	}
	public function abrirVenta($id){
		if (!file_exists(APPPATH.'views/cajeros/CrearVenta.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cajero=$this->usuariosM->getUsuarioById($id);
		
		$idPedido=$this->PedidosM->iniciarPedidoCaja($id);
		//echo $idPedido;
		if($cajero === false){
			//Cargar vista de redireccion al login
			
		}else{
			if($cajero['tipo'] === '5'){
				//cargar la plantilla de edministación del punto de venta
				$datos['cajero']=$cajero;
				$datos['idPedido']=$idPedido;
				$this->load->view('cajeros/caja.php', $datos);
				$this->load->view('cajeros/CrearVenta.php', $datos);
			}else{
				echo "Vaya ".$cajero['nombres'].$cajero['apellidos'].", parece que no tienes un perfil de cajero registrado.";
			}
		}
	}
	public function caja($idCajero, $idPedido){
		if (!file_exists(APPPATH.'views/cajeros/caja.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$cajero=$this->usuariosM->getUsuarioById($idCajero);
		if($cajero === false){
			//Cargar vista de redireccion al login
		}else{
			if($cajero['tipo'] === '5'){
				//cargar la plantilla de edministación del punto de venta
				$datos['cajero']=$cajero;
				$datos['idPedido']=$idPedido;
				$datos['pedido']= $this->PedidosM->getPedidoById($idPedido);
				$this->load->model('productosM');
				$datos['productos'] = $this->productosM->getProductos();
				
				$this->load->view('cajeros/cabecera.php', $datos);
				$this->load->view('cajeros/caja.php', $datos);
				$this->load->view('cajeros/productosDisponibles.php', $datos);
				//$this->load->view('cajeros/pie.php', $datos);
			}else{
				echo "Vaya ".$cajero['nombres'].$cajero['apellidos'].", parece que no tienes un perfil de cajero registrado.";
			}
		}
	}
	public function agregarAlCarro($idPedido, $idCajero, $idProducto){
		if (!file_exists(APPPATH.'views/cajeros/agregarAlCarrito.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$producto=$this->productosM->getProductoById($idProducto);
		$datos['msg_1'] = "";
		$datos['cajeroID']=$idCajero;
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
			$this->load->view('cajeros/agregarAlCarrito.php', $datos);
		}else{
			$cantidad=$this->input->post('cantidad');
			$subtotal=$cantidad*$producto['precio'];
			$datos['idPedidoProducto']=$this->PedidosProductosM->agregarProductoAlPedido($idProducto, $idPedido, $cantidad, $subtotal);
			$this->load->view('cajeros/pie.php', $datos);
		}
		
	}
}