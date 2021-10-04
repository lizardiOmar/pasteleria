<?php
	include 'ModeloUsuario.php';
	//echo "El metodo utilizado es: " . $_SERVER['REQUEST_METHOD'];
	switch ($_SERVER['REQUEST_METHOD']) {
		//Crear cliente POST
		case 'POST':
			if (
			isset($_POST['nombres']) &&
			isset($_POST['apellidos']) &&
			isset($_POST['correo']) &&
			isset($_POST['edad']) &&
			isset($_POST['clave'])) {
				$usuario_aux =  new ModeloUsuario(0, $_POST['nombres'], $_POST['apellidos'], $_POST['edad'], $_POST['correo'],  $_POST['clave'], 6);
				$usuario_aux->guardarCliente();
			}
			if (isset($_POST['id'])&&isset($_POST['dato'])&&isset($_POST['index_columna'])) {
				$id=$_POST['id'];
				$dato=$_POST['dato'];
				$index=$_POST['index_columna'];
				ModeloUsuario::actualizarUsuario($id, $dato, $index);
			}
			
		break;
		//Leer clientes o cliente GET
		case 'GET':
			if (isset($_GET['correo'])&&isset($_GET['clave'])) {
				
				$usuario=ModeloUsuario::isLogin($_GET['correo'], $_GET['clave']);
				if($usuario!=null){
					$usuario->setTipoString(ModeloUsuario::tipoDeUsuario($_GET['correo']));
					echo "TIPO_DE_USUARIO: (".$usuario->correo.")".$usuario->tipo_string;
						switch ($usuario->tipo) {
							case 1:
								//echo "Administrador";
								
								break;
							case 2:
								//echo "Elaboración de productos";
								
								break;
							case 3:
								//echo "Repartidor";
								
								break;
							case 4:
								//echo "Almacén";
								
								break;
							case 5:
								//echo "Cajero";
								
								break;
							case 6:
								//echo "Cliente";
								
								break;
						}
				}
				
				
				
			}else{
				//ModeloUsuario::tipoDeUsuario('almacen@pasteles.com');
			}
		break;
		//Actualizar cliente UPDATE
		case 'PUT':
			
		break;
		//Eliminar cliente DELETE
		case 'DELETE':
			if(isset($_GET['correo'])){
			$correo=$_GET['correo'];
				Cliente::borrarCliente($correo);
			}		
		break;
	}
?>