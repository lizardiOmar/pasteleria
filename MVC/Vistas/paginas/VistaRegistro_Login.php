<?php
	if (isset($this->session->userdata['logged_in'])) {
      header("location: http://localhost/login/index.php/acceso");
	}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<?php 
   if (null !== validation_errors() && strlen(validation_errors()) > 0) {
      echo "<div class='alert alert-warning'>";
      echo validation_errors();
      echo "</div>";
   }
   if (isset($message_display)) {
      echo "<div class='alert alert-danger'>";
      echo $message_display;
      echo "</div>";
   }
?>
<?php echo form_open('RegistroController/nuevoUsuario', array('role'=>'form')); ?>
    <body class="bg-secondary">
		<fieldset class="bg-secondary-50 w-75 p-3 rounded mx-auto bg-gradient">
			<div class="form-text fs-1 fw-bold text-white text-center form-group">
				<div id="formRegistroTitle" class="form-text fs-1 fw-bold text-white text-center">Crea una cuenta nueva</div>
				<div class="row">
					<div class="col">
						<input class="form-control" placeholder="Nombre(s)" name="nombres" type="text" autofocus required>
					</div>
					<div class="col">
						<input class="form-control" placeholder="Apellidos" name="apellidos" type="text" autofocus required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<input class="form-control" placeholder="Edad" name="edad" type="number" autofocus required>
					</div>
					<div class="col">
						<input class="form-control" placeholder="Correo electrónico" name="correo" type="email" autofocus required>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<input class="form-control" placeholder="Clave" name="clave_1" type="password" autofocus required>
					</div>
					<div class="col">
						<input class="form-control" placeholder="Clave" name="clave_2" type="password" autofocus required>
					</div>
				</div>
							<input type="checkbox" class="form-check-input fs-1 fw-bold" id="checkCondiciones" required>
							<label class="form-check-label fs-4 fw-bold text-white user-select-none" for="checkCondiciones">Acepto términos y condiciones.</label>
					<div class="row align-items-center">
						<button type="submit" class="btn btn-primary btn-lg fs-4 fw-bold text-white col">Crear una cuenta</button>
					</div>
			</div>
		</fieldset>
		
	</body>