<?php if (isset($product)) : ?>
  <div class="col-lg-10 offset-lg-1 mb-4">
      <div class="card pub_image h-100 no-border card-body">


          <div>
            <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">

              <?php if ($product->imagen != null) : ?>
                <figure>
                  <img class="card-img-top width-50" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto wallet">
                </figure>
              <?php else : ?>
                <figure>
                  <img class="card-img-top width-50" src="<?= base_url ?>assets/img/no-image-available.jpg" alt="producto wallet no disponible">
                </figure>
              <?php endif; ?>

            </a>
          </div>

          <div>
          <h5 class="card-title text-center"><?= $product->nombre ?></h5>
            <span class="badge badge-success"><?= $product->precio ?> €</span>
            <div class="comments mt-3">
            <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-sm btn-primary  white-letters">Comprar</a>
          </div>
          </div>

      

          <div class="description height-100">

            <p>
              <?= $product->descripcion ?>
            </p>
          </div>

          <div class="row justify-content-center">
          <div class="comments">
            <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-sm btn-primary  white-letters">Comprar</a>
          </div>
          </div>
      </div>
    </div>
<?php else : ?>
  <h1>El producto no existe</h1>
<?php endif; ?>