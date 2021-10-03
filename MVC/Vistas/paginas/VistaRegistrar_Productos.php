<html>
    <head>
        <title>Registrar Productos</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div>
			<form class="bg-primary w-50 p-3 rounded mx-auto bg-gradient">
			<div id="formTextProfucto" class="form-text fs-1 fw-bold text-white-50 text-center">Registrar Producto</div>
			  <div class="mb-3">
				<label for="inputRegistrarProducto" class="form-label text-white fs-2 fw-bolder  user-select-none ">nombre de producto</label>
				<input type="text" class="form-control fs-4 fw-bold" id="inputProducto" aria-describedby="formTextproducto">
			  </div>
			  <div class="mb-3">
				<label for="inputDescripcion" class="form-label text-white fs-2 fw-bolder  user-select-none">Descripcion</label>
				<input type="text" class="form-control fs-4 fw-bold" id="inputDescripcion">
			  </div>
			  <div class="mb-3">
				<label for="inputPrecio" class="form-label text-white fs-2 fw-bolder  user-select-none">Precio</label>
				<input type="number" min="0.00" step="0.10" data-number-to-fixed = 2 data-number-stepfactor="100" class="form-control fs-4 fw-bold" id="inputPrecio">
			  </div>
			  <div class="mb-3">
				<label for="inputCantidad" class="form-label text-white fs-2 fw-bolder  user-select-none">Cantidad</label>
				<input type="number" min="1" max="5" class="form-control fs-4 fw-bold" id="inputCantidad">
			  </div>
			  <div class="mb-3">
				<label for="inputCantidad" class="form-label text-white fs-2 fw-bolder  user-select-none">Cantidad minima</label>
				<input type="number" min="1" max="5" class="form-control fs-4 fw-bold" id="inputCantidad">
			  </div>
			  <div class= "mb-3">
			  	<label for="inputTipo" class="form-label text-white fs-2 fw-bolder user-select-none">Tipo</label>
			  	<input type="number" class="form-control fs-4 fw-bold" id="inputTipo">
			  </div>
			  <div class="row align-items-center">
				<button type="reset" class="btn btn-primary btn-lg fs-4 fw-bold text-white col">Cancelar</button>
				<button type="button" class="btn btn-secondary btn-lg fs-4 fw-bold text-white col">Registrar</button>
			  </div>
			  </form>
		</div>
	</body>
</html>