<head>
    <meta charset="utf-8">
    <title>Editar <?php echo $producto['nombre']; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
	<?php
		//si los datos enviados pasaron las reglas de validación, utilizará la biblioteca form validation para hacerlo
		echo validation_errors();
		//El ayudante form helper y representa al elemento de formulario y agrega funcionalidad adicional
		echo form_open("agregarAlCarrito/{$idPedido}/{$cajeroID}/{$producto['ID']}");
	?>
	<div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
		<div class="form-text fw-bold text-white text-center form-group">
			<div id="formEditarTitle" class="form-text fs-1 fw-bold text-white text-center">Agregar '<?php echo $producto['nombre']; ?>'</div>
			
			<div class="row">
				<h5 >Descripción del producto:</h5>
				<p><?php echo $producto['descripcion']; ?></p>
			</div>
			<div class="row">
					<h4>Precio: $<?php echo $producto['precio'];?></h4>
			</div>
			<div class="row">
				<div class="col">
					<label for="cantidad">Cantidad de productos:</label>
				</div>
				<div class="col">
					<input class="form-control" placeholder="<?php echo $producto['cantidad']; ?>" name="cantidad" type="number" autofocus>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a class="text-white nav-link btn btn-danger btn-lg"href="http://localhost/CodeigniterPasteleria/index.php/venta/<?php echo $cajeroID.'/'.$idPedido;?>">Cancelar</a>
				</div>
				
					<input type="submit" name="submit" value="Agregar al carrito" class="text-white col mx-auto btn btn-primary btn-lg"/>
				
			</div>
			<p class="text-red fs-4"><?php echo $msg_1; ?></p>
		</div>
		
	</div>