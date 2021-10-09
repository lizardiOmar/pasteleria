<?php
	include 'ModeloCatalogo.php';
	switch ($_SERVER['REQUEST_METHOD']){
		case 'POST':
			if(
				isset($_POST['nombre']) &&
				isset($_POST['descripcion']) &&
				isset($_POST['imagen']) &&
			){
				$producto_aux = new ModeloCatalogo($_POST['nombre'], $_POST['descripcion'], $_POST['imagen']);
				$producto_aux->guardarCatalogo();
			}else{
				echo "no hay data";
			}
			if(isset($_POST['nombre'])&&isset($_POST['descripcion'])&&isset($_POST['imagen'])&&)){
				$nombre=$_POST['nombre'];
				$descripcion=$_POST['desciprcion'];
				$imagen=$_POST['imagen'];
				ModeloCatalogo::actualizarCatalogo($nombre, $descripcion, $imagen);
			}

		break;
		case 'GET':

		break;
		case 'PUT':
	}
?>