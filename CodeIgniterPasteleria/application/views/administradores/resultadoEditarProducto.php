<head>
    <meta charset="utf-8">
    <title>Confirme los cambios.</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="bg-secondary-50 w-50 h-50 p-3 rounded mx-auto bg-gradient">
		<div class="form-text fs-1 fw-bold text-white text-center form-group">
			<div class="h-25 form-text fs-3 fw-bold text-white-50 text-center">Confirme los cambios del producto <?php echo $producto_new['id']; ?> </div>
			<div class="row fs-5">
				Nombre nuevo: <?php
									if($producto_new['nombre'] === ''){
										echo  'no';
									}else{
										echo $producto_new['nombre'];
									}	
								?>
			</div>
			<div class="row fs-5">
				Descripción nueva: <?php
									if($producto_new['descripcion'] === ''){
										echo  'no';
									}else{
										echo $producto_new['descripcion'];
									}	
								?>
			</div>
			<div class="row fs-5">
				Precio nuevo: 	<?php
									if($producto_new['precio'] === ''){
										echo  'no';
									}else{
										echo $producto_new['precio'];
									}		
								?>
			</div>
			<div class="row fs-5">
				Cantidad nueva: 	<?php
									if($producto_new['cantidad'] === ''){
										echo  'no';
									}else{
										echo $producto_new['cantidad'];
									}		
								?>
			</div>
			<div class="row fs-5">
				Cantidad miníma nueva: 	<?php
									if($producto_new['cantidad_minima'] === ''){
										echo  'no';
									}else{
										echo $producto_new['cantidad_minima'];
									}		
								?>
			</div>
			<div class="row fs-5">
				Tipo nuevo: 	<?php
									if($producto_new['tipo'] === ''){
										echo  'no';
									}else{
										echo $producto_new['tipo'];
									}		
								?>
			</div>
			<div class="row align-items-center btn btn-danger btn-lg">
				<a class="nav-link text-white" href="http://localhost/CodeigniterPasteleria/index.php/editar/<?php echo $administrador['ID']?>/<?php echo $producto['ID']?>">Cancelar</a>
			</div>
		</div>
	</div>
</body>