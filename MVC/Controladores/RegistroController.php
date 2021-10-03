<?php
	class RegistroController extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('modeloUsuario');
		}
		public function vistaRegistro ($page='VistaRegistro_Login'){
			if ( ! file_exists(APPPATH.'views/paginas/'.$page.'.php')){
				// Whoops, we don't have a page for that!
				show_404();
			}
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('elementos/VistaEncabezado_Login', $data);
			$this->load->view('paginas/'.$page, $data);
		}
		public function nuevoUsuario(){
			$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|xss_clean');
			$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean');
			$this->form_validation->set_rules('edad', 'Edad', 'trim|required|xss_clean');
			$this->form_validation->set_rules('correo', 'Correo', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('clave_1', 'Clave', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				vistaRegistro();
			}else{
				$data = array(
					'id' =>0,
					'nombres' => $this->input->post('nombres'),
					'apellidos' => $this->input->post('apellidos'),
					'edad' => $this->input->post('edad'),
					'correo' => $this->input->post('correo'),
					'clave' => $this->input->post('clave'),
					'tipo' => 6
				);
				$hashed_password = password_hash($data['clave'], PASSWORD_DEFAULT);
				$data['clave'] = $hashed_password;
				$result = $this->modeloUsuario->registrar_cliente($data);
				if ($result == TRUE){
					$data['RESULTADO'] = 'Registration Successfully !';
					redirect('http://localhost/codeIgniter/pasteleria/CodeIgniter-3.1.11/index.php/acceso', 'refresh'); 
				}else {
					$data['message_display'] = 'Username or Email already exist!';
					vistaRegistro();
				}
			}
			
		}
	}