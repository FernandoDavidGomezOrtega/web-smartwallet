<?php
ob_start();
?>
<!-- ASIDE -->
<aside id="lateral" class="col-lg-3 d-none d-lg-block ml-3 mr-3 mt-3">

  <div id="carrito" class="block_aside ">
    <div class="alert alert-success text-align-center" role="alert">
      Mi carrito
    </div>
    <?php $stats = Utils::statsCarrito(); ?>

    <div class="list-group">

      <li
        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
        <a href="<?= base_url ?>carrito/index">Productos </a>
        <a href="<?= base_url ?>carrito/index"><span
            class="badge badge-primary badge-pill"><?= $stats['count'] ?></span></a>
      </li>

      <li
        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
        <a href="<?= base_url ?>carrito/index">Total </a>
        <a href="<?= base_url ?>carrito/index"><span class="badge badge-primary badge-pill"><?= $stats['total'] ?>
            €</span></a>
      </li>

      <li
        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
        <a href="<?= base_url ?>carrito/index">Ver el carrito</a>
        <a href="<?= base_url ?>carrito/index"><span class="badge badge-primary badge-pill">></span></a>
      </li>
    </div>
    <hr>
  </div>

  <div id="login" class="block_aside">

    <?php if (!isset($_SESSION['identity'])) : ?>
    <div class="alert alert-success text-align-center" role="alert">
      Iniciar Sesión
    </div>

    <div id='' class='row'>
      <div id='' class='col-lg-12 '>
        <form action="<?= base_url ?>usuario/login" method="post" name="form-login">

          <div class="form-group">
            <label for="email"></label>
            <input type="email" class="form-control form-control-sm" placeholder="Email" name="email"
              aria-describedby="emailHelp" required>
          </div>

          <div class="form-group">
            <label for="password"></label>
            <input type="password" class="form-control form-control-sm" placeholder="Contraseña" name="password"
              required>
          </div>
          <div class="row">
            <div class="col-lg-8 offset-2">
              <button type="submit" class="form-group btn btn-primary btn-block  btn-white-letters">Entrar</button>
            </div>
          </div>

        </form>
      </div>
    </div>

    <?php else : ?>
    <div class="alert alert-success text-align-center" role="alert">
      <?= $_SESSION['identity']['nombre'] ?> <?= $_SESSION['identity']['apellidos'] ?>
    </div>
    <?php endif; ?>

    <ul>
      <?php if (isset($_SESSION['admin'])) : ?>

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
      </ul>
      <?php endif; ?>

      <?php if (isset($_SESSION['identity']) && !isset($_SESSION['admin'])) : ?>

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
      </ul>
      <?php elseif (!isset($_SESSION['identity'])) : ?>
      <div class="row">
        <div class="alert alert-warning text-align-center col-lg-10 offset-lg-1" role="alert">
          Si no tienes una cuenta <a href="<?= base_url ?>usuario/registro" class="red-letters">regístrate aquí</a>
        </div>
      </div>
      <?php endif; ?>
    </ul>
  </div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div class="col-lg-8 mt-3 ml-3 mr-3">