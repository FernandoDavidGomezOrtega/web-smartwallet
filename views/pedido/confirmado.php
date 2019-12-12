<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
  <h1>Tu pedido se ha registrado</h1>
  <p>
    Tu pedido ha sido guardado con éxito, una vez que realices la transferencia bancaria a la cuenta:
    2342342342 con el coste del pedido será procesado y enviado.
  </p>
  <br>
  <?php if (isset($pedido)) : ?>
    <h3>Datos del pedido</h3>
    <br>

    <p>
      Número de pedido: <?= $pedido->id; ?>
    </p>
    <p>
      Total a pagar: <?= $pedido->coste; ?> €
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
            <td class="align-middle">
              <?php if ($producto->imagen != null) : ?>
                <img class="img-max-height-90px" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="producto wallet">
              <?php else : ?>
                <img class="img-max-height-90px" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet">
              <?php endif; ?>
            </td>
            <td class="align-middle">
              <a href='<?= base_url ?>producto/ver&id=<?= $producto->id ?>' class=''><?= $producto->nombre ?></a>
            </td>
            <td class="align-middle">
              <?= $producto->precio ?>
            </td>
            <td class="align-middle">
              <?= $producto->unidades; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>

  <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
  <h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>