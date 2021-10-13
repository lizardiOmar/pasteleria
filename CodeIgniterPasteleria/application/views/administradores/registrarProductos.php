<head>
   <meta charset="utf-8">
   <title>Registrar producto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<?php
		//si los datos enviados pasaron las reglas de validación, utilizará la biblioteca form validation para hacerlo
		echo validation_errors();
		//El ayudante form helper y representa al elemento de formulario y agrega funcionalidad adicional
		echo form_open('agregarProductos/'.$administrador['ID']);
?>
<body class="bg-secondary">
		<div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
		<div class="form-text fw-bold text-white text-center form-group">
			<div id="formRegistroTitle" class="form-text fs-1 fw-bold text-white-50 text-center">Registrar Productos</div>
			<div class="row">
					<div class="col">
						<label for="inputRegistrarProducto" class="form-label text-white fs-2 fw-bolder  user-select-none ">Nombre de producto</label>
						<input class="form-control" placeholder="Nombre del Producto" name="nombre" type="text" required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="inputDescripcion" class="form-label text-white fs-2 fw-bolder  user-select-none ">Descripcion</label>
						<input class="form-control" placeholder="descripcion" name="descripcion" type="text" required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="inputPrecio" class="form-label text-white fs-2 fw-bolder  user-select-none ">Precio</label>
						<input class="form-control" placeholder="0.00" name="precio" type="number" required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="inputCantidadProductos" class="form-label text-white fs-2 fw-bolder  user-select-none ">Cantidad de Productos</label>
						<input class="form-control" placeholder="0" name="cantidad" type="number" required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="inputCantidadMinProductos" class="form-label text-white fs-2 fw-bolder  user-select-none ">Cantidad de Productos Minima</label>
						<input class="form-control" placeholder="3" name="cantidad_minima" type="number" required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="inputTipoDeProductos" class="form-label text-white fs-2 fw-bolder  user-select-none ">Tipo de productos</label>
						<select class="form-control" name="tipo" autofocus required>
							<?php foreach ($tipoProductos as $tipoproducto):?>
							<option value=<?php echo $tipoproducto['ID']; ?>><?php echo $tipoproducto['Nombre']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="row align-items-center">
				<button type="reset" class="btn btn-primary btn-lg fs-4 fw-bold text-white col">Cancelar</button>
				<button type="submit" name="submit" value="registrar Producto" class="btn btn-secondary btn-lg fs-4 fw-bold text-white col">Registrar</button>
			  </div>	
		</div>
	</div>
</body>
