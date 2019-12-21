<?php if (isset($gestion)) : ?>
  <h1>Gestionar pedidos</h1>

<?php else : ?>
  <h1>Mis pedidos</h1>

<?php endif; ?>
<div class="table-responsive-md">
  <table class='table'>
    <tr>
      <th>Nº Pedido</th>
      <th>Total</th>
      <th>Fecha</th>
      <th>Estado</th>
    </tr>

      <?php foreach($pedidos['DATA'] as $key => $pedido): ?>
      <tr>
        <td>
          <a href='<?= base_url ?>pedido/detalle&id=<?= $pedido['id']; ?>' class=''><?= $pedido['id']; ?></a>
        </td>
        <td>
          <?= $pedido['coste']; ?> €
        </td>
        <td>
          <?= $pedido['fecha']; ?>
        </td>
        <td>
        <?= $pedido['estado'] ?>
          <!-- <?= Utils::showStatus($pedido['estado']) ?> -->
        </td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>