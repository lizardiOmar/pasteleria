<html>
    <head>
        <title>Acceso</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div>
			<form class="bg-primary w-50 p-3 rounded mx-auto bg-gradient">
			<div id="formTextCorreo" class="form-text fs-1 fw-bold text-white-50 text-center">Inicio de sesión</div>
			  <div class="mb-3">
				<label for="inputCorreo" class="form-label text-white fs-2 fw-bolder  user-select-none ">Correo electrónico:</label>
				<input type="email" class="form-control fs-4 fw-bold" id="inputCorreo" aria-describedby="formTextCorreo">
				<div id="formTextCorreo" class="form-text fs-4 fw-bold text-white-50">Por ejemplo: miCorreo@pasteles.com</div>
			  </div>
			  <div class="mb-3">
				<label for="inputClave" class="form-label text-white fs-2 fw-bolder  user-select-none">Clave</label>
				<input type="password" class="form-control fs-4 fw-bold" id="inputClave">
			  </div>
			  <div class="mb-3 form-check ">
				<input type="checkbox" class="form-check-input fs-4 fw-bold" id="checkMantenerSesion">
				<label class="form-check-label fs-4 fw-bold text-white" for="checkMantenerSesion">Mantener mi sesión en este navegador.</label>
			  </div>
			  <div class="row align-items-center">
				<button type="submit" class="btn btn-primary btn-lg fs-4 fw-bold text-white col">Acceder</button>
				<button type="button" class="btn btn-secondary btn-lg fs-4 fw-bold text-white col" disabled>Crear una cuenta</button>
			  </div>
			  </form>
		</div>
	</body>
</html>