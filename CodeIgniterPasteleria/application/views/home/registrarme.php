<head>
    <meta charset="utf-8">
    <title>Crear una cuenta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
	<?php
		//si los datos enviados pasaron las reglas de validación, utilizará la biblioteca form validation para hacerlo
		echo validation_errors();
		//El ayudante form helper y representa al elemento de formulario y agrega funcionalidad adicional
		echo form_open('registro');
	?>
		<div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
			<div class="form-text fw-bold text-white text-center form-group">
					<div id="formRegistroTitle" class="form-text fs-1 fw-bold text-white text-center">Crea una cuenta nueva</div>
					<div class="row">
						<div class="col">
							<input class="form-control" placeholder="Nombre(s)" name="nombres" type="text" value="<?php echo set_value('nombres'); ?> "autofocus >
						</div>
						<div class="col">
							<input class="form-control" placeholder="Apellidos" name="apellidos" type="text" value="<?php echo set_value('apellidos'); ?>" autofocus >
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input class="form-control" placeholder="Edad" name="edad" type="number" value="<?php echo set_value('edad'); ?>" autofocus >
						</div>
						<div class="col">
							<input class="form-control" placeholder="Correo electrónico" name="correo" type="email" value="<?php echo set_value('correo'); ?>" autofocus >
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input class="form-control" placeholder="Clave" name="clave" type="password" value="<?php echo set_value('clave'); ?>" autofocus>
						</div>
						<div class="col">
							<br>
						</div>
					</div>
						<input type="checkbox" class="form-check-input fs-6 fw-bold" id="checkCondiciones" required>
						<label class="form-check-label fw-bold text-white fs-6 user-select-none" for="checkCondiciones">Acepto términos y condiciones.</label>
						
						<div class="row align-items-center">
							<input type="submit" name="submit" value="Crear una nueva cuenta" class="btn btn-primary btn-lg"/>
						</div>
				</div>
		</div>	
	</form>
</body>