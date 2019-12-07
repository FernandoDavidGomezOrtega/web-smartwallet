<h1>Registrarse</h1>

<!-- <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') :  ?>
  <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
  <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?> -->

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') :  ?>
<div  class="alert alert-danger text-align-center col-10  offset-1" role="alert" id ="">
  <strong >No se ha podido crear la cuenta. Este email ya tiene una cuenta asociada</strong>    
</div>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<div id='' class='row'>
  <div id='' class='col-sm-8 offset-sm-2'>
    <form class="" action="<?=base_url?>usuario/save" method="post" name="" onSubmit="return validarPassword()">
      <div class="form-group">
        <label for="first_name">Nombre</label>
        <input type="text" class="form-control" id="first_name" name="nombre" required autofocus>
      </div>

      <div class="form-group">
        <label for="last_name">Apellidos</label>
        <input type="text" class="form-control" id="last_name" name="apellidos" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu e-mail con nadie más.</small>
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirmPassword">Confirma la contraseña</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
      </div>

      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>
</div>


          <script type="text/javascript">
                // función para validar el formato de nombre, password y confirmacion de password
                  function validarPassword(){



                    var userFirstName = document.getElementById("first_name").value;
                    var userLastName = document.getElementById("last_name").value;
                    var userEmail = document.getElementById("email").value;
                    var p1 = document.getElementById("password").value;
                    var p2 = document.getElementById("confirmPassword").value;
                    var htmlspecialchars1 = false;
                    var htmlspecialchars2 = false;
                    var htmlspecialchars3 = false;
                    var cont = 0;
                    var maxLenghtName = 50;
                    var maxLenghtPassword = 20;


                    var user1 = {
                      firstName: userFirstName,
                      lastName: userLastName,
          }

          var user2 = {
                      email: userEmail,
          }

          var user3 = {
            password: p1,
            confirmarLoginPassword: p2
          }

          Object.keys(user1).forEach(key => {
            cont = 0;
            console.log(user1[key])

              while (!htmlspecialchars1 && (cont < user1[key].length)) {
                if ( (user1[key].charAt(cont) == "/") || (user1[key].charAt(cont) == "\\")
                  || (user1[key].charAt(cont) == "{") || (user1[key].charAt(cont) == "}")  || (user1[key].charAt(cont) == "(")
                  || (user1[key].charAt(cont) == ")") || (user1[key].charAt(cont) == "<") || (user1[key].charAt(cont) == ">")
                  || (user1[key].charAt(cont) == "'")  || (user1[key].charAt(cont) == '"') || (user1[key].charAt(cont) == '[')
                  || (user1[key].charAt(cont) == '[') || (user1[key].charAt(cont) == ',') || (user1[key].charAt(cont) == '.')) {
                    htmlspecialchars1 = true;
                  }
                  console.log(user1[key]);
                cont++;
              }

          })
          if (htmlspecialchars1) {
              swal('', 'Los nombres o apellidos no pueden contener los siguentes caracteres: / \\ { } ( ) [ ] < > \' , . "', 'error');
              return false;
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

          // return false;

                    // Verificamos el formato de nombre y apellidos
                    if (maxLenghtName < userFirstName.length || maxLenghtName < userLastName.length) {
                      // alert ("El nombre debe tener 20 caracteres como máximo");
                      // document.getElementById("login").focus();
                      swal('', 'Los nombres y apellidos tener 50 caracteres como máximo" , .', 'error');

                      return false;
                    }

                    // Verificamos el formato de password
                    var cont = 0;

                    if (maxLenghtPassword < p1.length) {
                      // alert ("La contraseña debe tener 10 caracteres como máximo");
                      // document.getElementById("loginPassword").focus();
                      swal('', 'La contraseña debe tener 20 caracteres como máximo', 'error');

                      return false;
                    }

                    // Verificamos que coincidan las contraseñas
                    if (p1 != p2) {
                      // alert ("Las contraseñas no coinciden");
                      // document.getElementById("loginPassword").focus();
                      swal('', 'Las contraseñas no coinciden', 'error');

                      return false;
                    }
                  }
                </script>
