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

    <?php
    while ($ped = $pedidos->fetch_object()) :
      ?>
      <tr>
        <td>
          <a href='<?= base_url ?>pedido/detalle&id=<?= $ped->id; ?>' class=''><?= $ped->id; ?></a>
        </td>
        <td>
          <?= $ped->coste; ?> €
        </td>
        <td>
          <?= $ped->fecha; ?>
        </td>
        <td>
        <?= $ped->estado; ?>
          <!-- <?= Utils::showStatus($ped->estado) ?> -->
        </td>
      </tr>
    <?php endwhile; ?>

  </table>
</div>