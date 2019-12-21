<h1>Gestión de productos</h1>

<a href="<?= base_url ?>producto/crear" class="btn btn-success white-letters mb-5">
  Crear producto
</a>

<?php if (isset($_SESSION['complete'])) : ?>
  <div class="alert alert-success" role="alert">
    <?= $_SESSION['complete'] ?>
  </div>
  

<?php elseif (isset($_SESSION['failed'])) : ?>
  <div class="alert alert-success" role="alert">
    <?= $_SESSION['failed'] ?>
  </div>
<?php endif; ?>

<?php
if (isset($_SESSION['complete'])) {
  Utils::deleteSession('complete');
} elseif (isset($_SESSION['failed'])) {
  Utils::deleteSession('failed');
}
?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
  <div class="alert alert-success" role="alert">
    El producto se ha eliminado correctamente
  </div>

<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed') : ?>
  <div class="alert alert-danger" role="alert">
    El producto NO se ha eliminado correctamente porque existe una línea de pedido que lo incluye!
  </div>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th colspan="2">Editar / Eliminar</th>
      </tr>
    </thead>
      <?php foreach($productos['DATA'] as $key => $pro): ?>

<!--      --><?php //while ($pro = $productos) : ?>
      <tbody>
        <tr>
          <td><?= $pro['id']; ?></td>
          <td><?= $pro['nombre']; ?></td>
          <td><?= $pro['precio']; ?></td>
          <td><?= $pro['stock']; ?></td>
          <td>
            <a href="<?= base_url ?>producto/editar&id=<?= $pro['id']; ?>" class="badge badge-primary mr-lg-3 pl-lg-3 pr-lg-3 white-letters">Editar</a>
          </td>
          <td>
            <a href="<?= base_url ?>producto/eliminar&id=<?= $pro['id']; ?>" class="badge badge-danger mr-lg-3 pl-lg-3 pr-lg-3 white-letters">Eliminar</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</div>