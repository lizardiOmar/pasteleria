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
	public function registrarProductos($id){
		if (!file_exists(APPPATH.'views/administradores/registrarProductos.php')){
			// Cáspita ... no tenemos una pagina para esto!
			show_404();
		}
		$administrador=$this->usuariosM->getUsuarioById($id);
		if($administrador === false){
			//Cargar vista de redireccion al login
		}else{
			//cargar la plantilla de catalogo del sitio de los clientes
			$this->form_validation->set_rules('nombre','nombre','min_length[5]|max_length[30]|is_unique[productos.nombre]');
			$datos['administrador']=$administrador;
			$this->load->model('tipoProductosM');
			$datos['tipoProductos'] = $this->tipoProductosM->getTipoProductos();
			if($this->form_validation->run() === FALSE){
				$this->load->view('administradores/cabecera', $datos);
				$this->load->view('administradores/registrarProductos', $datos);
			}else{
				//echo "si entro";
				$this->load->model('productosM');
				$datos['nuevo_Producto']=$this->productosM->setProductos();
				$this->load->view('administradores/resultadoRegistroProducto', $datos);
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
		$datos['msg_1'] = "";
		$administrador=$this->usuariosM->getUsuarioById($idAdministrador);
		$producto=$this->productosM->getProductoById($idProducto);
		$datos['administrador']=$administrador;
		$datos['producto']=$producto;
		$this->form_validation->set_rules(
			'nombre',//nombre del imput del formulario
			'nombre',//etiqueta para mensajes de salida
			'min_length[5]|max_length[30]|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar el %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar el %s son 30.',
				'is_unique' => 'El %s no puede ser igual a alguno ya almacenado.'
			)
		);
		$this->form_validation->set_rules(
			'descripcion',//nombre del imput del formulario
			'descripción',//etiqueta para mensajes de salida
			'min_length[20]|max_length[90]|trim|is_unique[productos.nombre]',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar la %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar la %s son 90.',
				'is_unique' => 'La %s no puede ser igual a alguno ya almacenado.'
			)
		);
		$this->form_validation->set_rules(
			'precio',//nombre del imput del formulario
			'precio',//etiqueta para mensajes de salida
			'min_length[2]|max_length[3]|numeric|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar el %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar el %s son 3.',
				'numeric' => 'Solo se permiten numeros y letras para el %s'
			)
		);
		$this->form_validation->set_rules(
			'cantidad',//nombre del imput del formulario
			'cantidad',//etiqueta para mensajes de salida
			'min_length[1]|max_length[3]|numeric|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar la %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar la %s son 3.',
				'numeric' => 'Solo se permiten numeros y letras para la %s'
			)
		);
		$this->form_validation->set_rules(
			'cantidad_minima',//nombre del imput del formulario
			'cantidad minima',//etiqueta para mensajes de salida
			'min_length[1]|max_length[3]|numeric|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'min_length' => 'El minímo de caracteres para modificar la %s son 2.',
				'max_length' => 'El máximo de caracteres para modificar la %s son 3.',
				'numeric' => 'Solo se permiten numeros y letras para la %s'
			)
		);
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('administradores/editarProductoForm', $datos);
		}else{
			$producto_new['id']=$idProducto;
			$producto_new['nombre']=$this->input->post('nombre');
			$producto_new['descripcion']=$this->input->post('descripcion');
			$producto_new['precio']=$this->input->post('precio');
			$producto_new['cantidad']=$this->input->post('cantidad');
			$producto_new['cantidad_minima']=$this->input->post('cantidad_minima');
			$producto_new['tipo']=$this->input->post('tipo');
			$formValido=false;
			
			if($producto_new['nombre'] == $producto['nombre']){
				$datos['msg_1'] = "No puedes escribir el mismo nombre que ya existe en la base de datos.";
				//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
				//$this->load->view('administradores/editarProductoForm', $datos);
			}else{
				$datosU;
				if($producto_new['nombre'] != null){
					
					$this->db->set('nombre', $producto_new['nombre']);
					$this->db->where('id', $producto_new['id']);
					$this->db->update('productos'); 
					$formValido=true;
				}
				if($producto_new['descripcion'] == $producto['descripcion']){
					$datos['msg_1'] = "No puedes escribir la misma descripcion que ya existe en la base de datos.";
					//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
					//$this->load->view('administradores/editarProductoForm', $datos);
				}else{
					if($producto_new['descripcion'] != null){
						$this->db->set('descripcion', $producto_new['descripcion']);
						$this->db->where('id', $producto_new['id']);
						$this->db->update('productos');
						$formValido=true;
					}
					if($producto_new['precio'] == $producto['precio']){
						$datos['msg_1'] = "No puedes escribir el mismo precio que ya existe en la base de datos.";
						//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
						//$this->load->view('administradores/editarProductoForm', $datos);
					}else{
						if($producto_new['precio'] != null){
							$this->db->set('precio', $producto_new['precio']);
							$this->db->where('id', $producto_new['id']);
							$this->db->update('productos');
							$formValido=true;
						}
						if($producto_new['cantidad'] == $producto['cantidad']){
							$datos['msg_1'] = "No puedes escribirla misma cantidad que ya existe en la base de datos.";
							//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
							//$this->load->view('administradores/editarProductoForm', $datos);
						}else{
							if($producto_new['cantidad'] != null){
								$this->db->set('cantidad', $producto_new['cantidad']);
								$this->db->where('id', $producto_new['id']);
								$this->db->update('productos');
								$formValido=true;
							}
							if($producto_new['cantidad_minima'] == $producto['cantidad_minima']){
								$datos['msg_1'] = "No puedes escribirla misma cantidad miníma que ya existe en la base de datos.";
								//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
								//$this->load->view('administradores/editarProductoForm', $datos);
							}else{
								if($producto_new['cantidad_minima'] != null){
									$this->db->set('cantidad_minima', $producto_new['cantidad_minima']);
									$this->db->where('id', $producto_new['id']);
									$this->db->update('productos');
									$formValido=true;
								}
							}
						}
					}
				}
			}
			
			if($formValido === false){
				//$datos['msg_1'] = "No hay ningún cambio detectado.";
				//$producto_new['nombre'][strlen($producto_new['nombre'])-1]='.';
				$this->load->view('administradores/editarProductoForm', $datos);
			}else{
				$datos['msg_1'] = "";
				//$producto_new['nombre'][strlen($producto_new['nombre'])]='.';
				$datos['producto_new']=$producto_new;
				$this->load->view('administradores/resultadoEditarProducto', $datos);
			}
		}
	}
}
