<head>
    <meta charset="utf-8">
    <title>Bienvenido <?php echo $administrador['nombres'] ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
	<div class="card bg-secondary mx-auto border border-primary border-3 rounded" style="width: 25rem;">
        <div class="bg-secondary">
          <h3 class="text-white bg-primary"><?php echo  $administrador['nombres']." ". $administrador['apellidos']; ?></h3>
          <p class="text-white bg-primary">
			Correo: <?php echo  $administrador['correo'] ?>
          </p>
          <p class="text-white bg-primary">
			Edad: <?php echo  $administrador['edad'] ?>
          </p>
		  <p class="text-white bg-primary">
			Tipo de cuenta: Administrador
          </p>
        </div>
     </div>
</body>