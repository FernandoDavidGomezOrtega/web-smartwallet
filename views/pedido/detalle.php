<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
  <?php if (isset($_SESSION['admin'])) : ?>
    <div id='' class='row'>
      <div id='' class='col-lg-8 offset-lg-2'>
        <form class="" action='<?= base_url ?>pedido/estado' method="post" enctype="multipart/form-data" method="post" name="">
          <input type='hidden' value='<?= $pedido['DATA']['0']['id']; ?>' name='pedido_id' id='' />
<!--            --><?//= $pedido['DATA']['0']['id']; ?>
          <div class="form-group">
            <label for="estado">Cambiar estado del pedido</label>
            <select class='' name='estado' id=''>
              <option value='Pendiente de pago' <?= $pedido['DATA']['0']['estado'] == 'Pendiente de pago' ? 'selected' : ''; ?>>Pendiente de pago</option>
              <option value='Confirmado' <?= $pedido['DATA']['0']['estado'] == 'Confirmado' ? 'selected' : ''; ?>>Confirmado</option>
              <option value='En preparación' <?= $pedido['DATA']['0']['estado'] == 'En preparación' ? 'selected' : ''; ?>>En preparación</option>
              <option value='Preparado para enviar' <?= $pedido['DATA']['0']['estado'] == 'Preparado para enviar' ? 'selected' : ''; ?>>Preparado para enviar</option>
              <option value='Enviado' <?= $pedido['DATA']['0']['estado'] == 'Enviado' ? 'selected' : ''; ?>>Enviado</option>
              <option value='Entregado' <?= $pedido['DATA']['0']['estado'] == 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
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
    Provincia: <?= $pedido['DATA']['0']['provincia']; ?>
  </p>
  <p>
    Ciudad: <?= $pedido['DATA']['0']['localidad']; ?>
  </p>
  <p>
    Dirección: <?= $pedido['DATA']['0']['direccion']; ?>
  </p>
  <br />

  <h3>Datos del pedido</h3>
  <br>

  <p>
    Estado: <?= $pedido['DATA']['0']['estado'] ?>
    <!-- Estado: <?= Utils::showStatus($pedido['DATA']['0']['estado']) ?> -->
  </p>
  <p>
    Número de pedido: <?= $pedido['DATA']['0']['id']; ?>
  </p>
  <p>
    Total: <?= $pedido['DATA']['0']['coste']; ?> €
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
      <?php foreach($productos['DATA'] as $key => $product): ?>
        <tr>
          <td class="">
            <?php if ($product['imagen'] != null) : ?>
              <img class="img-max-height-90px" src="<?= base_url ?>uploads/images/<?= $product['imagen'] ?>" alt="producto wallet">
            <?php else : ?>
              <img class="img-max-height-90px" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet">
            <?php endif; ?>
          </td>
          <td class="">
            <a href='<?= base_url ?>producto/ver&id=<?= $product['id'] ?>' class=''><?= $product['nombre'] ?></a>
          </td>
          <td class="">
            <?= $product['precio'] ?>
          </td>
          <td class="">
            <?= $product['unidades']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>
