<?php
	
	class VistaHomeCliente{
		var $usuario;
	
		public function __construct($usuario){
			$this->usuario=$usuario;
			
		}
		
		
	}
	
?>
<head>
    <meta charset="utf-8">
    <title>Bienvenido <?php echo  json_encode($usuario->getNombres()); ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<div class="container-fluid">
				<a class="  mx-autofs-2 navbar-brand border border-ligth border-3 rounded-pill text-center p-1 fw-bolder user-select-none p-3 text-white"><?php echo $usuario->tipo_string ?></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#" disabled>Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/API_pasteles/VistaLoginRegistro.html">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/API_pasteles/VistaLoginRegistro.html">Productos</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="card mx-auto">
        <div class="card-body bg-secondary">
          <h1><?php echo $usuario->getNombres()." ".$usuario->getApellidos(); ?></h1>
          <p class="card-text">
			Correo: <?php echo $usuario->getCorreo() ?>
          </p><br>
          <p class="card-text">
			Edad: <?php echo $usuario->getEdad() ?>
          </p><br>
        </div>
      </div>
    </div>
