<h1>Carrito de la compra</h1>


<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
  <div class="table-responsive-md">
    <table class="table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Unidades</th>
          <th>Eliminar</th>
        </tr>
      </thead>

      <?php
      foreach ($carrito as $indice => $elemento) :
        $producto = $elemento['producto'];
        ?>

        <tbody>
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
              <?= $elemento['unidades'] ?>
              <div id='' class=''>
                <a href="<?= base_url ?>carrito/down&index=<?= $indice; ?>" class="badge badge-primary mr-lg-3 pl-lg-3 pr-lg-3 white-letters">-</a>
                <a href="<?= base_url ?>carrito/up&index=<?= $indice; ?>" class="badge badge-primary pl-lg-3 pr-lg-3 white-letters">+</a>
              </div>
            </td>
            <td class="align-middle">
              <a href='<?= base_url ?>carrito/delete&index=<?= $indice; ?>' class='btn btn-danger white-letters'>Quitar producto</a>
            </td>
          </tr>
        </tbody>


      <?php endforeach; ?>
    </table>
  </div>

  <br>
  <div id='' class='row '>
    <div class='col-lg-4 col-md-4 col-sm-12 col-12 mb-2  d-none d-md-block'   id=''>
      <div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2 col-sm-4 offset-sm-4 col-8 offset-2 " >
        <a href='<?= base_url ?>carrito/delete_all' class='btn btn-block btn-danger white-letters'>Vaciar carrito</a>

      </div>
    </div>

    <div class='col-lg-4  col-md-4 mb-2' >
      <?php $stats = Utils::statsCarrito(); ?>
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1" >
      <h3>Precio total: <?= $stats['total']; ?> €</h3>

        </div>
    </div>
    <div id='' class='col-lg-4 col-md-4 mb-2'  >
      <div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2 col-sm-4 offset-sm-4 col-8 offset-2"  >
      <a href='<?= base_url ?>pedido/hacer' class='btn btn-block btn-success white-letters'>Hacer pedido</a>

      </div>
    </div>

    <div class='col-lg-4 col-md-4 col-sm-12 col-12 mb-2  d-md-none'   id=''>
      <div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2 col-sm-4 offset-sm-4 col-8 offset-2" >
        <a href='<?= base_url ?>carrito/delete_all' class='btn btn-block btn-danger white-letters'>Vaciar carrito</a>

      </div>
    </div>
  </div>
<?php else : ?>
  <div id='' class='row centrado'>
    <div class="alert alert-secondary" role="alert">
      <a class="text-decoration-none btn-black-letters" href="<?= base_url ?>">
        El carrito está vacío, añade algún producto
      </a>
    </div>
  </div>
<?php endif; ?>