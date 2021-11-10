<head>
    <meta charset="utf-8">
    <title>Cliente registrado exitosamente.</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
		<div class="form-text fs-1 fw-bold text-white text-center form-group">
			<div class="h-25 form-text fs-1 fw-bold text-white-50 text-center">Cuenta creada con éxito</div>
			<div class="row fs-3">
				Todo esta listo <?php echo $nuevo_cliente['nombres']; ?>,
				<br>tú cuenta fué creada éxitosamente.
				<br>Has clic en el botón de abajo para iniciar sesión.
			</div>
			<div class="row align-items-center bg-primary">
				<a class="nav-link text-white" href="http://localhost/CodeigniterPasteleria/index.php/acceso">Acceder</a>
			</div>
		</div>
	</div>
</body>