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
	
}
