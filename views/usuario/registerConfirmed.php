<div id="login" class=" ">

  <?php if (!isset($_SESSION['identity']) && isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
    <div class="row mt-3 mt-lg-5">
      <div class="alert alert-success text-align-center col-10  offset-1 col-md-8 offset-md-2" role="alert">
        Tu cuenta ha sido creada con éxito. Ya puedes iniciar sesión
      </div>

    </div>

    <form action="<?= base_url ?>usuario/login" method="post" name="form-login">

      <div id='' class='row'>
        <div class="form-group col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <label for="email"></label>
          <input type="email" class="form-control form-control-sm" placeholder="Email" id="" name="email" aria-describedby="emailHelp" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <label for="password"></label>
          <input type="password" class="form-control form-control-sm" placeholder="Contraseña" id="" name="password" required>
        </div>
      </div>
      <div class="row">
        <div class="col-4 offset-4 col-md-2 offset-md-5">
          <button type="submit" class="btn btn-primary btn-block  white-letters">Entrar</button>
        </div>
      </div>

    </form>

  <?php elseif (!isset($_SESSION['identity']) && isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): header('Location: ' . base_url . 'usuario/registro');  ?>

  <?php else : header('Location: ' . base_url); ?>
  <?php endif; ?>

  
</div>