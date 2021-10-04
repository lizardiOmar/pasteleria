<?php
	include 'ModeloProducto.php';
	//echo "El metodo utilizado es: " . $_SERVER['REQUEST_METHOD'];
	switch ($_SERVER['REQUEST_METHOD']) {
		//Crear producto POST
		case 'POST':
			if (
			isset($_POST['nombreProducto']) &&
			isset($_POST['descripcion']) &&
			isset($_POST['precio']) &&
			isset($_POST['cantidad']) &&
			isset($_POST['cantidadMin']) &&
			isset($_POST['tipo'])
			){
				$producto_aux =  new ModeloProducto(0, $_POST['nombreProducto'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad'], $_POST['cantidadMin'],$_POST['tipo']);
				$producto_aux->guardarProducto();
			}else{
				echo "no hay data";
			}
			if (isset($_POST['id'])&&isset($_POST['dato'])&&isset($_POST['index_columna'])) {
				$id=$_POST['id'];
				$dato=$_POST['dato'];
				$index=$_POST['index_columna'];
				ModeloProducto::actualizarProducto($id, $dato, $index);
			}
			
		break;
		//Leer producto o producto GET
		case 'GET':
			
		break;
		//Actualizar producto UPDATE
		case 'PUT':
			
		break;
		//Eliminar producto DELETE
		case 'DELETE':
				
		break;
	}
?>