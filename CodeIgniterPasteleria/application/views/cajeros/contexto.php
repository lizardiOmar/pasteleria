<div class="container">
	<div class="row">
		 <div class="col">
			<h6>Cajero: <?php echo $cajero['nombres'].' '.$cajero['apellidos'] ?></h6>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h6>
				Hora: 
				<?php 
					date_default_timezone_set('America/Mexico_City');
					echo  date(' h:i:s a', time()); 
				?>
			</h6>
		</div>
		<div class="col">
			<h6>Fecha: 
				<?php 
					date_default_timezone_set('America/Mexico_City');
					echo  date('d-m-Y', time()); 
				?>
			</h6>
		</div>
	</div>
</div>