<h1>Algunos de nuestros productos</h1>

<div class="row">
    <?php foreach($productos['DATA'] as $key => $product): ?>

    <div class="col-12 col-sm-6 col-md-4 mb-4">
      <div class="card pub_image h-100 card-body">

          <div>
            <a href="<?= base_url ?>producto/ver&id=<?= $product['id'] ?>">

              <?php if ($product['imagen'] != null) : ?>
                <figure>
                  <img class="card-img-top" src="<?= base_url ?>uploads/images/<?= $product['imagen'] ?>" alt="producto wallet">
                </figure>
              <?php else : ?>
                <figure>
                  <img class="card-img-top" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet no disponible">
                </figure>
              <?php endif; ?>

            </a>
          </div>

          <div>
          <h5 class="card-title text-center"><?= $product['nombre'] ?></h5>
            <span class="badge badge-success"><?= $product['precio'] ?> €</span>
          </div>

          <div class="description">

            <p>
              <?= $product['descripcion'] ?>
            </p>
          </div>

          <div>
            <a href="<?= base_url ?>producto/ver&id=<?= $product['id'] ?>" class="btn btn-outline-primary btn-sm mb-3">Ver detalles</a>
          </div>

          <div class="row justify-content-center">
          <div class="comments">
            <a href="<?= base_url ?>carrito/add&id=<?= $product['id'] ?>" class="btn btn-sm btn-primary  white-letters">Comprar</a>
          </div>
          </div>
      </div>
    </div>
    <?php endforeach; ?>
<!--  </row>-->

