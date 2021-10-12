<head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<div class="row">
	<?php foreach ($sucursales as $sucursal):?>
	<div class="card bg-secondary mx-auto border border-primary border-3 rounded" style="width: 18rem;">
		<h4 class="card-title text-white mx-auto">Pastelería "<?php echo $sucursal['Nombre']; ?>"</h4>
		<div class="card-body bg-primary border border-secondary border-3 rounded">
			<p class="card-subtitle text-muted">
				Teléfono:
			</p>
			<p class="card-text text-white">
				<?php echo $sucursal['Telefono']; ?>
			</p>
			<p class="card-subtitle text-muted">
				Dirección:
			</p>
			<p class="card-text text-white">
				<?php echo $sucursal['Ciudad']; ?>, Col. <?php echo $sucursal['Colonia']; ?><br>
				Calle <?php echo $sucursal['Calle']; ?> # <?php echo $sucursal['Numero']; ?>
			</p>
			<p class="card-subtitle text-muted">
				Correo electrónico:
			</p>
			<p class="card-text text-white">
				<?php echo $sucursal['Correo']; ?>
			</p>
			<p class="card-subtitle text-muted">
				Horario de atención:
			</p>
			<p class="card-text text-white"> 
				<?php echo $sucursal['HoraApertura']; ?> hrs. a <?php echo $sucursal['HoraCierre']; ?> hrs.
			</p>
		</div>
	</div>
	<?php endforeach; ?>
</div>