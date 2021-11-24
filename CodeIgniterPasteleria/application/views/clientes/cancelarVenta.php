<head>
    <meta charset="utf-8">
    <title>Cancelar Venta <?php echo $pedido['ID']; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
	    <div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
			<div class="form-text fs-1 fw-bold text-white text-center form-group">
				<h2 class="text-center fw-bolder user-select-none p-3 text-white">
							El pedido #<?php echo $pedido['ID']; ?> fué cancelado con éxito
				</h2>
				<h4 class="text-center fw-bolder user-select-none p-3 text-white">
							Cliente: <?php echo $cliente['nombres'].' '.$cliente['apellidos']; ?>
				</h4>
				<h4 class="text-center fw-bolder user-select-none p-3 text-white">
							SUBTOTAL: $<?php echo $pedido['subtotal']; ?>
				</h4>
				<div class="col align-items-center btn btn-danger btn-lg">
					<a class="nav-link text-white" href="http://localhost/CodeigniterPasteleria/index.php/ventaLista/<?php echo $cliente['ID']?>">Aceptar</a>
				</div>
			</div>
		</div>
		
</body>