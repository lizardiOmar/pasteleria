<?php
class HomeC extends CI_Controller {
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
	//Funcion HomeC/contacto
	public function contacto($pagina = 'contacto'){
		if (!file_exists(APPPATH.'views/home/'.$pagina.'.php')){
			// Cáspita ... no tenemos una pagina para esto!
			show_404();
		}
		//Importar modelo de sucursales
		$this->load->model('sucursalesM');
		$datos['título'] = ucfirst($pagina); // Capitaliza la primera letra
		$this->load->view('home/cabeceraHome', $datos);
		//Consulta a la bd mediante el modelo de Sucursales con el método getSucursales == 'select * from sucursales'
		$datos['sucursales'] = $this->sucursalesM->getSucursales();
		//Carga la pagina, con los datos obtenidos en la consulta
		$this->load->view('sucursales/sucursalesCards', $datos);
		$this->load->view('home/'.$pagina, $datos);
	}
	//Funcion HomeC/acceder
	public function acceder($pagina = 'acceso'){
		if (!file_exists(APPPATH.'views/home/'.$pagina.'.php')){
			// Cáspita ... no tenemos una pagina para esto!
			show_404();
		}
		$datos['título'] = ucfirst($pagina); // Capitaliza la primera letra
		
		$this->form_validation->set_rules(
			'correo',//nombre del imput del formulario
			'correo',//etiqueta para mensajes de salida
			'required|min_length[5]|max_length[30]|valid_email|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'required' => 'No ha proporcionado %s.',//Mensaje de salida de la válidacion de campo obligatorio
			)
		);
		$this->form_validation->set_rules(
			'clave',//nombre del imput del formulario
			'clave',//etiqueta para mensajes de salida
			'required|min_length[5]|max_length[30]|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'required' => 'No ha proporcionado %s.',//Mensaje de salida de la válidacion de campo obligatorio
			)
		);
		if($this->form_validation->run() === FALSE){
			$datos['msg_1'] = "";
			$this->load->view('home/cabeceraHome', $datos);
			$this->load->view('home/'.$pagina, $datos);
		}else{
			$correo_aux=$this->input->post('correo');
			$usuario_aux=$this->usuariosM->validarCorreo($correo_aux);
			if($usuario_aux === false){
				$datos['msg_1'] = "No existe el correo.";
				$this->load->view('home/cabeceraHome', $datos);
				$this->load->view('home/'.$pagina, $datos);
			}else{
				//$nombres=$usuario_aux['nombres'];
				//echo $nombres;
				//echo "Correo válido.";
				$clave_aux=$this->input->post('clave');
				
				if($clave_aux === $usuario_aux['clave']){
					//echo "Clave válida.";
					$datos['usuario']=$usuario_aux;
					switch ($usuario_aux['tipo']) {
						case 1:
							//echo "Administrador, Sección en desarrollo";
							$this->load->view('administradores/resultadoAcceso', $datos);
							break;
							break;
						case 2:
							echo "Elaboración de productos, Sección en desarrollo";
								
							break;
						case 3:
							echo "Repartidor, Sección en desarrollo";
								
							break;
						case 4:
							echo "Almacén, Sección en desarrollo";
								
							break;
						case 5:
							echo "Cajero, Sección en desarrollo";
								
							break;
						case 6:
							//echo "Cliente";
							$this->load->view('clientes/resultadoAcceso', $datos);
							break;
					}
						
					
					
				}else{
					$datos['msg_1'] = "No coincide la clave.";
					$this->load->view('home/cabeceraHome', $datos);
					$this->load->view('home/'.$pagina, $datos);
				}
			}
		}
		
	}
	
	//Funcion HomeC/registrarme
	public function registrarme($pagina = 'registrarme'){
		if (!file_exists(APPPATH.'views/home/'.$pagina.'.php')){
			// Cáspita ... no tenemos una pagina para esto!
			show_404();
		}
		$datos['título'] = ucfirst($pagina); // Capitaliza la primera letra
		//el método set_rules() toma tres argumentos; el nombre del campo de entrada, el nombre que se utilizará en los mensajes de error y la regla
		$this->form_validation->set_rules('nombres','nombres','required|trim|min_length[2]|max_length[30]|alpha_numeric_spaces',
			array(
				'required' => 'Debes escribir un nombre.',
				'min_length' => 'Los nombres deben tener al menos dos carácteres.',
				'alpha_numeric_spaces' => 'No se permiten nombres con simbolos.'
			)
		);
		$this->form_validation->set_rules('apellidos','Apellidos','required|trim|min_length[2]|max_length[30]|alpha_numeric_spaces',
			array(
				'required' => 'Debes escribir un apellidos.',
				'min_length' => 'Los apellidos deben tener al menos dos carácteres.',
				'alpha_numeric_spaces' => 'No se permiten apellidos con simbolos.'
			)
		);
		$this->form_validation->set_rules('edad','Edad','required|greater_than_equal_to[18]|integer|exact_length[2]',
			array(
				'required' => 'No ha proporcionado %s.',//Mensaje de salida de la válidacion de campo obligatorio
				'greater_than_equal_to' => 'Lo siento, parece que no eres mayor de edad.',//Mensaje de salida si el correo ya existe
				'exact_length' => 'Vaya, parece que tienes más de 99 años.'
			)
		);
		$this->form_validation->set_rules(
			'correo',//nombre del imput del formulario
			'correo',//etiqueta para mensajes de salida
			'required|min_length[5]|max_length[30]|is_unique[usuarios.correo]|valid_email|trim',//minimo 5 caracteres, maximo 30, correo electrónico único, correo electronico con formato válido 
			array(
				'required' => 'No ha proporcionado %s.',//Mensaje de salida de la válidacion de campo obligatorio
				'is_unique' => 'Ese %s ya está registrado.'//Mensaje de salida si el correo ya existe
			)
		);
		$this->form_validation->set_rules('clave','Clave','required');
		//Validación de los campos del formulario
		//validación del que el formulario se ejecutó correctamente, si no, se
		//muestra el formulario
		if ($this->form_validation->run() === FALSE){
			$this->load->view('home/cabeceraHome', $datos);
			$this->load->view('home/'.$pagina, $datos);
		}else{
			// si se envió y pasó todas las reglas, se llama al modelo, después de esto, se carga una vista para
			//mostrar un mensaje de éxito
			$datos['nuevo_cliente']=$this->usuariosM->crearCuentaCliente();
			$this->load->view('clientes/resultadoRegistro', $datos);
			/*$prefs = array(
				'start_day' => 'monday',
				'month_type' =>'long',
				'day_type' => 'short'
			);
			$this->load->library('calendar', $prefs);
			echo $this->calendar->generate();*/
			/*$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/ usr / sbin / sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$this->email->from('tu@ejemplo.com', 'Prueba de Codeigniter');
			$this->email->to('heandsheofi@gmail.com ');
			$this->email->subject('Email de prueba');
			$this->email->message('Prueba de la clase Email.');
			$this->email->send();*/
			
		}
		
	}
}