<h1>Algunos de nuestros productos</h1>

<div id='' class='row'>
  <?php while ($product = $productos->fetch_object()) : ?>
    <div id='' class='col-lg-4 mb-4'>
      <div class="card">
        <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">

          <?php if ($product->imagen != null) : ?>
            <figure>
              <img class="card-img-top" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto wallet">
            </figure>
          <?php else : ?>
            <figure>
              <img class="card-img-top" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet no disponible">
            </figure>
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