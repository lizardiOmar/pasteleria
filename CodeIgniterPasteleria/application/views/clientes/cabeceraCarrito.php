<header class="">
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<div class="container-sm">
				<a class="mx-autofs-2 navbar-brand text-center fw-bolder user-select-none text-white">
					Carrito de: <?php echo $cliente['nombres']; ?>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item btn btn-danger mx-autofs-2 text-center fw-bolder user-select-none p-3 text-white">
							<a class="nav-link text-white" href="http://localhost/CodeigniterPasteleria/index.php/CancelarPedido/<?php echo $cliente['ID'].'/'.$pedido['ID']; ?>">
								<h3 >
								Cancelar Compra
								</h3>
							</a>
							
						</li>
						
						<h4 class="mx-autofs-2 border border-ligth border-5 text-center p-1 fw-bolder user-select-none p-2 text-white">
							SUBTOTAL: $<?php echo $pedido['subtotal']; ?>"
						</h4>
				
						<li class="nav-item btn btn-success mx-autofs-2 text-center p-1 fw-bolder user-select-none p-3 text-white">
							<a class="nav-link text-white" href="http://localhost/CodeigniterPasteleria/index.php/pagarPedido/<?php echo $cliente['ID'].'/'.$idPedido; ?>">
								<h3>
								Comprar
								</h3>
							</a>
							
						</li>
					</ul>
				</div>
			</div>
		</nav>
</header>