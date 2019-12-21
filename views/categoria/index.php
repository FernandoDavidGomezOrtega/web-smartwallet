<h1>Gestionar Categorías</h1>

<a href="<?=base_url?>categoria/crear" class="btn btn-success mb-5 white-letters">
  Crear categoría
</a>

<table >
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
  </tr>

    <?php  foreach($categorias['DATA'] as $key => $categoria): ?>

    <tr>
      <td><?=$categoria['id'];?></td>
      <td><?=$categoria['nombre'];?></td>
    </tr>
  <?php endforeach; ?>
</table>

