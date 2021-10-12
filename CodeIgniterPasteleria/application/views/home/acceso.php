<head>
	<meta charset="utf-8">
    <title>Iniciar Sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
	<?php
		//si los datos enviados pasaron las reglas de validación, utilizará la biblioteca form validation para hacerlo
		echo validation_errors();
		//El ayudante form helper y representa al elemento de formulario y agrega funcionalidad adicional
		echo form_open('acceso');
	?>
		<div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
			<div class="form-text fs-1 fw-bold text-white text-center form-group">
				<div id="formTextCorreo" class=" h-25 form-text fs-1 fw-bold text-white-50 text-center">Inicio de sesión</div>
				<div class="row ">
					<input class="form-control fs-3" placeholder="Correo electrónico" name="correo" type="email" value="<?php echo set_value('correo'); ?> "autofocus>
				</div>
				<div class="row ">
					<input class="form-control fs-3" placeholder="Clave" name="clave" type="password" value="<?php echo set_value('clave'); ?> "autofocus>
				</div>
				<div class="row align-items-center ">
					<input type="submit" name="submit" value="Acceder a mi cuenta" class="btn btn-primary btn-lg"/>
				</div>
				<p class="text-red fs-4"><?php echo $msg_1; ?></p>
			</div>
		</div> 	
	</form>
</body>