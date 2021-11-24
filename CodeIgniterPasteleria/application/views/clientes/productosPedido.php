<head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<div class="row">
	<?php foreach ($productosPedido as $producto):?>
		<div class="card bg-secondary mx-auto border border-primary border-3 rounded" style="width: 18rem;">
		<h4 class="card-title text-white mx-auto">"<?php echo $producto['nombre']; ?>"</h4>
		<div class="card-body bg-primary border border-secondary border-3 rounded">
			<p class="card-subtitle text-muted">
				Cantidad:
			</p>
			<p class="card-text text-white">
				<?php echo $producto['cantidadCompra']; ?>
			</p>
			<p class="card-subtitle text-muted">
				subtotal:
			</p>
			<h5 class="card-text text-white">
				$<?php echo $producto['subtotal']; ?>
			</h5>
		</div>		
	</div>
	<?php endforeach;?>