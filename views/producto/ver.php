<?php if (isset($product)) : ?>
  <h1><?= $product->nombre ?></h1>
  <div id="detail-product">
    <div id='' class='row'>
      <div class="col-md-4 offset-md-2 col-sm-8 offset-sm-2 mr-md-5">
        <?php if ($product->imagen != null) : ?>
          <img class="img-max-width-100" src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="producto wallet">
        <?php else : ?>
          <img class="" src="<?= base_url ?>assets/img/wallet-azul.jpg" alt="producto wallet">
        <?php endif; ?>
      </div>
      <div class="col-md-5 col-sm-8 offset-sm-2 offset-md-0 pl-md-5 mt-3 mt-lg-1">
        <p><?= $product->descripcion ?></p>
        <p><?= $product->precio ?> €</p>
        <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-success pl-lg-4 pr-lg-4 white-letters">Comprar</a>
      </div>
    </div>
  </div>
<?php else : ?>
  <h1>El producto no existe</h1>
<?php endif; ?>