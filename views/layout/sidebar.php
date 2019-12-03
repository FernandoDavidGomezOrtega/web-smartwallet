<?php
ob_start();
?>
<!-- ASIDE -->
<aside id="lateral" class="col-lg-3 d-none d-lg-block ml-3 mr-3 mt-3">

	<div id="carrito" class="block_aside ">
		<div class="alert alert-success text-align-center" role="alert">
			Mi carrito
		</div>

		<div class="list-group">

			<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
				<a href="">Productos </a>
				<a href=""><span class="badge badge-primary badge-pill"></span></a>
			</li>

			<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
				<a href="">Total </a>
				<a href=""><span class="badge badge-primary badge-pill"></span></a>
			</li>

			<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
				<a href="">Ver el carrito</a>
				<a href=""><span class="badge badge-primary badge-pill">></span></a>
			</li>
		</div>
		<hr>
	</div>

	<div id="login" class="block_aside">

	

			<div id='' class='row'>
				<div id='' class='col-lg-12 '>
					<form action="<?= base_url ?>usuario/login" method="post" name="form-login">

						<div class="form-group">
							<label for="email"></label>
							<input type="email" class="form-control form-control-sm" placeholder="Email"  name="email" aria-describedby="emailHelp" required>
						</div>

						<div class="form-group">
							<label for="password"></label>
							<input type="password" class="form-control form-control-sm" placeholder="Contraseña"  name="password" required>
						</div>
						<div class="row">
							<div class="col-lg-8 offset-2">
								<button type="submit" class="form-group btn btn-primary btn-block  btn-white-letters">Entrar</button>
							</div>
						</div>

					</form>
				</div>
			</div>

	

		<ul>

				<ul class="list-group list-group-flush">
					<li class="list-group-item"><a href="">Gestionar categorias</a></li>
					<li class="list-group-item"><a href="">Gestionar productos</a></li>
					<li class="list-group-item"><a href="">Gestionar pedidos</a></li>
					<li class="list-group-item"><a href="">Mis pedidos</a></li>
					<li class="list-group-item"><a href="">Cerrar sesión</a></li>
				</ul>


				<ul class="list-group list-group-flush">
					<li class="list-group-item"><a href="">Mis pedidos</a></li>
					<li class="list-group-item"><a href="">Cerrar sesión</a></li>
				</ul>
				<div class="row">
					<div class="alert alert-danger text-align-center col-lg-10 offset-lg-1" role="alert">
						Si no tienes una cuenta <a href="" class="red-letters">regístrate aquí</a>
					</div>
				</div>
		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="" class="col-lg-8 mt-3 ml-3 mr-3">
