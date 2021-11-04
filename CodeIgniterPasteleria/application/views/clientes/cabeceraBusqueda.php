<head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<?php
		//si los datos enviados pasaron las reglas de validación, utilizará la biblioteca form validation para hacerlo
		echo validation_errors();
		//El ayudante form helper y representa al elemento de formulario y agrega funcionalidad adicional
		echo form_open('buscar/'.$cliente['ID'].'/');
?>
	<div class="row">
		<div class="col">
			<label for="inputTipo" class="form-label text-white fs-2 fw-bolder  user-select-none ">Busca tus productos:</label>
		</div>
		<div class="col">
			<select class="form-control" onChange="if (this.options[this.selectedIndex].value) window.location.href=this.options[this.selectedIndex].value" autofocus>
				<option value="0">Selecciona un tipo a buscar</option>
				<?php foreach ($tipoProductos as $tipoproducto):?>
					<option value=<?php echo $tipoproducto['ID']; ?>><?php echo $tipoproducto['Nombre']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
</form>