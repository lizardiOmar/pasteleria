<?php
	class LoginController extends CI_Controller{
		public function vistaAcceso ($page='VistaAcceso_Login'){
			if ( ! file_exists(APPPATH.'views/paginas/'.$page.'.php')){
                // Whoops, we don't have a page for that!
                show_404();
			}
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('elementos/VistaEncabezado_Login', $data);
			$this->load->view('paginas/'.$page, $data);
		}
		private function login($correo, $clave, $mantenerSesion){
			$this->load->model('modeloUsuario');
			if($this->modeloUsuario->getUsuarioByCorreo($correo) != False){
				$usuario=$this->modeloUsuario->getUsuarioByCorreo($correo);
				if($usuario['correo'] != null){
					if($usuario['clave']==$clave){
						switch ($usuario['tipo']) {
							case 1:
								echo "Administrador";
								
								break;
							case 2:
								echo "Elaboración de productos";
								
								break;
							case 3:
								echo "Repartidor";
								
								break;
							case 4:
								echo "Almacén";
								
								break;
							case 5:
								echo "Cajero";
								
								break;
							case 6:
								echo "Cliente";
								
								break;
						}
					}else{
						//La contraseña no coincide
					}
				}else{
					//El usuario no existe
				}
			}
			
		}
	}
	
?>