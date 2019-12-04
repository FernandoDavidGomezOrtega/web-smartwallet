<?php if (isset($categoria)) : ?>
  <h1><?= $categoria->nombre ?></h1>
  <?php if ($productos->num_rows == 0) : ?>
    <p>No hay productos para mostrar</p>
  <?php else : ?>
    <div id='' class='row'>
      <?php while ($product = $productos->fetch_object()) : ?>
        <div id='' class='col-lg-4 offset-lg-0 mb-4 col-md-8 offset-md-2 col-sm-8 offset-sm-2'>
          <div class="card">
            <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">

              <?php if ($product->imagen != null) : ?>
                <img class="card-img-top" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto wallet">
              <?php else : ?>
                <img class="card-img-top" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet">
              <?php endif; ?>

            </a>

            <div class="card-body">
              <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">

              </a>
              <h5 class="card-title text-center"><?= $product->nombre ?></h5>
              <span class="badge badge-primary"><?= $product->precio ?> €</span>
              <p class="card-text"><?= $product->descripcion ?></p>

              <div id='' class='row centrado'>

                <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-primary white-letters">Comprar</a>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  <?php endif; ?>
<?php else : ?>
  <h1>La categoría no existe</h1>
<?php endif; ?>