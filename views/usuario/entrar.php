<div id="login" class=" ">

<?php if (isset($_SESSION['error_login'])) : ?>
    <div class="row mt-3 mt-lg-5">
      <div class="alert alert-danger text-align-center col-10  offset-1 col-md-8 offset-md-2" role="alert">
        El email o la contraseña con incorrectos
      </div>

    </div>
<?php endif; ?>

<?php Utils::deleteSession('error_login'); ?>


  <?php if (!isset($_SESSION['identity']) ) : ?>
    <div class="row mt-3">
      <div class="alert alert-success text-align-center col-6  offset-3" role="alert">
        Iniciar Sesión
      </div>

    </div>

    <!-- <form action="#" method="post" name="form-login" onSubmit="return validarPassword()"> -->
    <form action="<?= base_url ?>usuario/login" method="post" name="form-login" onSubmit="return validarPassword()">

      <div id='' class='row'>
        <div class="form-group col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <label for="email"></label>
          <input type="email" class="form-control form-control-sm" placeholder="Email" id="email" name="email" aria-describedby="emailHelp" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <label for="password"></label>
          <input type="password" class="form-control form-control-sm" placeholder="Contraseña" id="password" name="password" required>
        </div>
      </div>
      <div class="row">
        <div class="col-4 offset-4 col-md-2 offset-md-5">
          <button type="submit" class="btn btn-primary btn-block  white-letters">Entrar</button>
        </div>
      </div>
      <hr>

    </form>

  <?php else : ?>
    <div class="alert alert-success text-align-center" role="alert">
      <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?>
    </div>
  <?php endif; ?>

  <ul>
    <?php if (isset($_SESSION['admin'])) : ?>

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
      </ul>
    <?php endif; ?>

    <?php if (isset($_SESSION['identity']) && !isset($_SESSION['admin'])) : ?>

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
        <li class="list-group-item"><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
      </ul>
    <?php elseif (!isset($_SESSION['identity'])) : ?>
      <div class="row">
        <div class="alert alert-danger text-align-center col-10 offset-1 col-md-6  offset-md-3" role="alert">
          Si no tienes una cuenta <a href="<?= base_url ?>usuario/registro" class="red-letters">registrate aqui</a>
        </div>
      </div>
    <?php endif; ?>
  </ul>
</div>


<script type="text/javascript">
                // función para validar el formato de nombre, password y confirmacion de password
                  function validarPassword(){

                    var userEmail = document.getElementById("email").value;
                    var p1 = document.getElementById("password").value;
                    var htmlspecialchars2 = false;
                    var htmlspecialchars3 = false;
                    var cont = 0;
                    var maxLenghtName = 50;
                    var maxLenghtPassword = 20;

          var user2 = {
                      email: userEmail,
          }

          var user3 = {
            password: p1,
          }

          Object.keys(user2).forEach(key => {
            cont = 0;
            console.log(user2[key])

              while (!htmlspecialchars2 && (cont < user2[key].length)) {
                if ((user2[key].charAt(cont) == " ") || (user2[key].charAt(cont) == "/") || (user2[key].charAt(cont) == "\\")
                  || (user2[key].charAt(cont) == "{") || (user2[key].charAt(cont) == "}")  || (user2[key].charAt(cont) == "(")
                  || (user2[key].charAt(cont) == ")") || (user2[key].charAt(cont) == "<") || (user2[key].charAt(cont) == ">")
                  || (user2[key].charAt(cont) == "'")  || (user2[key].charAt(cont) == '"') || (user2[key].charAt(cont) == '[')
                  || (user2[key].charAt(cont) == '[') || (user2[key].charAt(cont) == ',') ) {
                    htmlspecialchars2 = true;
                  }
                  console.log(user2[key]);
                cont++;
              }

          })
          if (htmlspecialchars2) {
              swal('', 'El email no puede contener los siguentes caracteres: / \\ { } ( ) [ ] < > \' , "', 'error');
              return false;
            }

          Object.keys(user3).forEach(key => {
            cont = 0;
            console.log(user3[key])

              while (!htmlspecialchars3 && (cont < user3[key].length)) {
                if ((user3[key].charAt(cont) == " ") || (user3[key].charAt(cont) == "/") || (user3[key].charAt(cont) == "\\")
                  || (user3[key].charAt(cont) == "{") || (user3[key].charAt(cont) == "}")  || (user3[key].charAt(cont) == "(")
                  || (user3[key].charAt(cont) == ")") || (user3[key].charAt(cont) == "<") || (user3[key].charAt(cont) == ">")
                  || (user3[key].charAt(cont) == "'")  || (user3[key].charAt(cont) == '"') || (user3[key].charAt(cont) == '[')
                  || (user3[key].charAt(cont) == '[') || (user3[key].charAt(cont) == ',') || (user3[key].charAt(cont) == '.')) {
                    htmlspecialchars3 = true;
                  }
                  console.log(user3[key]);
                cont++;
              }

          })
          // return false;

            if (htmlspecialchars3) {
              swal('', 'La contraseña no puede contener espacios en blanco,\nni los siguentes caracteres: / \\ { } ( ) [ ] < > \' , . "', 'error');
              return false;
            }

                  }
                </script>
