<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
  <?php if (isset($_SESSION['admin'])) : ?>
    <div id='' class='row'>
      <div id='' class='col-lg-8 offset-lg-2'>
        <form class="" action='<?= base_url ?>pedido/estado' method="post" enctype="multipart/form-data" method="post" name="">
          <input type='hidden' value='<?= $pedido->id; ?>' name='pedido_id' id='' />
          <div class="form-group">
            <label for="estado">Cambiar estado del pedido</label>
            <select class='' name='estado' id=''>
              <option value='confirmed' <?= $pedido->estado == 'Pendiente de pago' ? 'selected' : ''; ?>>Pendiente de pago</option>
              <option value='confirmed' <?= $pedido->estado == 'Confirmado' ? 'selected' : ''; ?>>Confirmado</option>
              <option value='preparation' <?= $pedido->estado == 'En preparación' ? 'selected' : ''; ?>>En preparación</option>
              <option value='ready' <?= $pedido->estado == 'Preparado para enviar' ? 'selected' : ''; ?>>Preparado para enviar</option>
              <option value='sended' <?= $pedido->estado == 'Enviado' ? 'selected' : ''; ?>>Enviado</option>
              <option value='sended' <?= $pedido->estado == 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Cambiar estado</button>
        </form>
      </div>
    </div>


    <br />
  <?php endif; ?>
  <h3>Dirección de envío</h3>
  <p>
    Provincia: <?= $pedido->provincia; ?>
  </p>
  <p>
    Ciudad: <?= $pedido->localidad; ?>
  </p>
  <p>
    Dirección: <?= $pedido->direccion; ?>
  </p>
  <br />

  <h3>Datos del pedido</h3>
  <br>

  <p>
    Estado: <?= $pedido->estado ?>
    <!-- Estado: <?= Utils::showStatus($pedido->estado) ?> -->
  </p>
  <p>
    Número de pedido: <?= $pedido->id; ?>
  </p>
  <p>
    Total: <?= $pedido->coste; ?> €
  </p>
  <p>
    Productos:
  </p>

  <div class="table-responsive-md">
    <table class="table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Unidades</th>
        </tr>
      </thead>
      <?php while ($producto = $productos->fetch_object()) : ?>
        <tr>
          <td class="">
            <?php if ($producto->imagen != null) : ?>
              <img class="img-max-height-90px" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="producto wallet">
            <?php else : ?>
              <img class="img-max-height-90px" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet">
            <?php endif; ?>
          </td>
          <td class="">
            <a href='<?= base_url ?>producto/ver&id=<?= $producto->id ?>' class=''><?= $producto->nombre ?></a>
          </td>
          <td class="">
            <?= $producto->precio ?>
          </td>
          <td class="">
            <?= $producto->unidades; ?>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
<?php endif; ?>
