<head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
		<div class="form-text fs-1 fw-bold text-white text-center form-group">
			<div class="h-25 form-text fs-3 fw-bold text-white-50 text-center">Producto guardado con éxito</div>
			<div class="row fs-5">
				Producto: <?php	echo $producto['nombre'];?> <?php	echo '$'.$producto['precio'];?>
			</div>
			<div class="row fs-5">
				<?php	echo 'Cantidad: '.$producto_pedido['cantidad'];?>
			</div>
			<div class="row fs-5">
				<?php	echo ' Subtotal: $'.$producto_pedido['subtotal'];?>
			</div>
			<div class="row fs-5">
				<?php	echo ' Total acumulado: $'.$pedido['subtotal'];?>
			</div>
			<div class="col">
					<a class="text-white nav-link btn btn-danger btn-lg" href="http://localhost/CodeigniterPasteleria/index.php/compra/<?php echo $clienteID.'/'.$pedido['ID'];?>">Continuar</a>
			</div>
		</div>
	</div>
</body>