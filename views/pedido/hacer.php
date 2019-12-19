<?php if (isset($_SESSION['identity'])) : ?>
  <h1>Hacer pedido</h1>
  <a href='<?= base_url ?>carrito/index' class=''>Ver el carrito</a>
  <br>
  <p class="p-20px">Dirección para el envío</p>

  <div id='' class='row'>
    <div id='' class='col-8 offset-2'>
      <form class="" action='<?= base_url ?>pedido/add' method='post'>
        <div class="form-group">
          <label for="provincia">Provincia</label>
          <input type='text' name='provincia' class="form-control" id='' value='' placeholder='' required autofocus>
        </div>

        <div class="form-group">
        <label for="localidad">Ciudad</label>
    <input type='text' name='localidad' class="form-control" id='' value='' placeholder='' required>
        </div>

        <div class="form-group">
        <label for="direccion">Dirección</label>
    <input type='text' name='direccion' class="form-control" id='' value='' placeholder='' required>
        </div>

        <div class="form-group">
          <label for="zipcode">Código postal</label>
          <input type="text" class="form-control" id="" name="zipcode"  required>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-primary white-letters" >Confirmar pedido</button>
        </div>
      </form>
    </div>
  </div>

<?php else : ?>
  <h1>Necesitas estar identificado</h1>
  <div id='' class='row centrado'>
    <div class="alert alert-secondary" role="alert">
      <p>Necesitas <span><a href='<?= base_url ?>usuario/entrar' class=''> iniciar sesión</a></span> para poder realizar tu pedido</p>
    </div>
  </div>
  <div id='' class='row '>
    <div class="col-lg-12 centrado mt-lg-5">
      <p>Si todavía no tienes una cuenta regístrate <span><a href='<?= base_url ?>usuario/registro' class=''> aquí</a></span></p>
    </div>
  </div>
<?php endif; ?>