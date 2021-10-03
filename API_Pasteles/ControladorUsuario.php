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
				$usuario_aux =  new ModeloUsuario(0, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['edad'], $_POST['clave'], 6);
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
				ModeloUsuario::isLogin($_GET['correo'], $_GET['clave']);
			}else{
				ModeloUsuario::allUsuarios();
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