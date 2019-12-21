<?php if (isset($edit) && isset($pro) && is_array($pro)) : ?>
  <h1>Editar producto: <?= $pro['DATA'][0]['nombre'] ?></h1>
  <?php $url_action = base_url . 'producto/save&id=' . $pro['DATA'][0]['id']; ?>
<?php else : ?>
  <h1>Crear nuevo producto</h1>
  <?php $url_action = base_url . 'producto/save'; ?>
<?php endif; ?>

<div id='' class='row'>
  <div id='' class='col-sm-8 offset-sm-2'>
    <form class="" action="<?= $url_action ?>" method="post" enctype="multipart/form-data" method="post" name="">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="" value="<?= isset($pro) && is_array($pro) ? $pro['DATA'][0]['nombre'] : '' ?>" placeholder="" required autofocus>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" id="" value="" placeholder="" required><?= isset($pro) && is_array($pro) ? $pro['DATA'][0]['descripcion'] : ''; ?></textarea>
      </div>

      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" step="0.01" name="precio"  class="form-control" id="" value="<?= isset($pro) && is_array($pro) ? $pro['DATA'][0]['precio'] : '' ?>" placeholder="" required>
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" name="stock"  class="form-control" id="" value="<?= isset($pro) && is_array($pro) ? $pro['DATA'][0]['stock'] : '' ?>" placeholder="" required>
      </div>
      <div class="form-group">
        <label for="categoria">Categoría</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select class="" name="categoria"  class="form-control" id="" required>
          <option value="" readonly>Seleccione una categoría</option>

            <?php foreach($categorias['DATA'] as $key => $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= isset($pro) && is_array($pro) && $cat['id'] == $pro['DATA'][0]['categoria_id'] ? 'selected' : '' ?>>
              <?= $cat['nombre'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="imagen">Imagen</label>
        <?php if (isset($pro)  && is_array($pro) && !empty($pro->imagen)) : ?>
          <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" class="thumb" alt="foto producto">
        <?php endif; ?>
        <input type="file" name="imagen" id="" value="">
      </div>

      <button type="submit" class="btn btn-primary white-letters">Guardar</button>
    </form>
  </div>
</div>