<html>

<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<div class="container-fluid">
				<a class="  mx-autofs-2 navbar-brand border border-ligth border-3 rounded-pill text-center p-1 fw-bolder user-select-none p-3 text-white">Pastelería</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Productos Existentes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="#">Registrar Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Actualizar Productos</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</body>

    <head>
        <title>Actualizacion</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div>
			<form class="bg-primary w-50 p-3 rounded mx-auto bg-gradient">
			<div id="formNumberID" class="form-text fs-1 fw-bold text-white-50 text-center">Actualizacion De Productos</div>

			  <div class="mb-3">
				<label for="inputProd" class="form-label text-white fs-2 fw-bolder  user-select-none">Producto</label>
				<input type="text" class="form-control fs-4 fw-bold" id="inputProd">
			  </div>

			  <div class="mb-3">
				<label for="inputDesc" class="form-label text-white fs-2 fw-bolder  user-select-none">Descripcion</label>
				<input type="text" class="form-control fs-4 fw-bold" id="inputDesc">
			  </div>

			  <div class="mb-3">
				<label for="inputPrecio" class="form-label text-white fs-2 fw-bolder  user-select-none">Precio</label>
				<input type="number" class="form-control fs-4 fw-bold" id="inputPrecio">
			  </div>

			  <div class="mb-3">
				<label for="inputCant" class="form-label text-white fs-2 fw-bolder  user-select-none">Cantidad</label>
				<input type="number" class="form-control fs-4 fw-bold" id="inputCant">
			  </div>

			  <div class="mb-3">
				<label for="inputCantMin" class="form-label text-white fs-2 fw-bolder  user-select-none">Cantidad Minima</label>
				<input type="number" class="form-control fs-4 fw-bold" id="inputCantMin">
			  </div>

			  <div class="mb-3">
				<label for="inputTipo" class="form-label text-white fs-2 fw-bolder  user-select-none">Tipo</label>
				<input type="number" class="form-control fs-4 fw-bold" id="inputTipo">
			  </div>

			  <div class="row align-items-center">
				<button type="button" class="btn btn-secondary btn-lg fs-4 fw-bold text-white col" disabled>Cancelar</button>
				<button type="submit" class="btn btn-primary btn-lg fs-4 fw-bold text-white col">Guardar</button>
			  </div>

			  </form>
		</div>
	</body>
</html>