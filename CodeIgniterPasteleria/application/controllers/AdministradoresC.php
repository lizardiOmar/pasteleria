<?php
class AdministradoresC extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Cargar las librerias requeridas
		$this->load->helper('form');
		$this->load->library('form_validation');
		//Importar modelo de usuarios
		$this->load->model('usuariosM');
		//Importar modelo de productos
		$this->load->model('productosM');
		//helper para strings
		$this->load->helper('url_helper');
		
		
	}
	public function perfil($id){
		if (!file_exists(APPPATH.'views/administradores/perfil.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$administrador=$this->usuariosM->getUsuarioById($id);
		if($administrador === false){
			//Cargar vista de redireccion al login
		}else{
			if($administrador['tipo'] === '1'){
				//cargar la plantilla de perfil del sitio
				$datos['administrador']=$administrador;
				$this->load->view('administradores/cabecera', $datos);
				$this->load->view('administradores/perfil', $datos);
			}else{
				echo "Vaya ".$administrador['nombres'].$administrador['apellidos'].", parece que no tienes un perfil de administrador registrado.";
			}
		}
	}
	public function verProductosEditables($id){
		if (!file_exists(APPPATH.'views/administradores/productosEditables.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$administrador=$this->usuariosM->getUsuarioById($id);
		if($administrador === false){
			//Cargar vista de redireccion al login
		}else{
			if($administrador['tipo'] === '1'){
				//cargar la plantilla de catalogo del sitio de los clientes
				$datos['administrador']=$administrador;
				$this->load->model('productosM');
				$datos['productos'] = $this->productosM->getProductos();
				$this->load->view('administradores/cabecera', $datos);
				$this->load->view('administradores/productosEditables', $datos);
			}else{
				echo "Vaya ".$administrador['nombres'].$administrador['apellidos'].", parece que no eres administrador, así que no puedes editar productos.";
			}
		}
	}
	public function editar($idAdministrador, $idProducto){
		if (!file_exists(APPPATH.'views/administradores/editarProductoForm.php')){
			show_404();
			//echo 'Cáspita ... no tenemos una pagina para esto!';
		}
		$administrador=$this->usuariosM->getUsuarioById($idAdministrador);
		if($administrador === false){
			//Cargar vista de redireccion al login
		}else{
			if($administrador['tipo'] === '1'){
				//Importar modelo de usuarios
				$producto=$this->productosM->getProductoById($idProducto);
				if($producto === FALSE){
					show_404();
				}else{
					//echo json_encode($producto).'<br>';
					//echo json_encode($administrador);
					$datos['producto']=$producto;
					$datos['administrador']=$administrador;
					$this->load->view('administradores/editarProductoForm', $datos);
				}
				
			}else{
				echo "Vaya ".$administrador['nombres'].$administrador['apellidos'].", parece que no eres administrador, así que no puedes editar esto.";
			}
		}
	}
}