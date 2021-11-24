<head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
<div class="table bg-primary">
	<div class="row bg-secondary mx-auto border border-primary border-3 rounded">
		<h3 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			PRODUCTO
		</h3>
		<h3 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			PRECIO
		</h3>
		<h3 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			CANTIDAD
		</h3>
		<h3 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			SUBTOTAL
		</h3>
		<h3 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			
		</h3>
	</div>
	<?php foreach ($productos as $producto):?>
	<div class="row bg-secondary mx-auto border border-primary border-3 rounded">
		<h5 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			<?php echo $producto['producto']; ?>
		</h5>
		<h5 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			$<?php echo $producto['precio']; ?>
		</h5>
		<h5 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			<?php echo $producto['cantidad']; ?>
		</h5>
		<h5 class="col mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white">
			<?php echo $producto['subtotal']; ?>
		</h5>
		
		<a class="nav-item btn btn-danger mx-autofs-2 text-center p-1 fw-bolder user-select-none text-white col"  href="">
			<h5>
				ELIMINAR
			</h5>
		</a>
	</div>
	<?php endforeach;?>
</div>