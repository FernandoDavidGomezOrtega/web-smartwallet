<?php
require_once 'models/usuario.php';

class usuarioController
{
    public function index()
    {
        echo 'Controlador Usuarios, Acción index';
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function entrar()
    {
        require_once 'views/usuario/entrar.php';
    }

    public function confirmed()
    {
        require_once 'views/usuario/registerConfirmed.php';
    }

    public function redirectLogin()
    {
        if (isset($_SESSION['identity']) && isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            header('Location: ' . base_url . 'pedido/hacer');
        } elseif (isset($_SESSION['identity']) && !isset($_SESSION['carrito']) && count($_SESSION['carrito']) == 0) {
            header('Location: ' . base_url);
        } elseif (!isset($_SESSION['identity']) && isset($_SESSION['error_login'])) {

          // var_dump($_SESSION['error_login']);
          // die();

          header('Location: ' . base_url . 'usuario/entrar');
        } else header('Location: ' . base_url);
        // header('Location: ' . base_url);
      }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                // var_dump($save);
                // die();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        // if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {

        //   // $_SESSION['registerConfirmed'] = 'complete';

        //   header('Location: ' . base_url . 'usuario/confirmed');
        // } elseif (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0 ){
        //   // $_SESSION['registerConfirmed'] = 'complete';

        //   header('Location: ' . base_url . 'usuario/confirmed');
        // } else header('Location: ' . base_url);
        header('Location: ' . base_url . 'usuario/confirmed');
    }

    public function login()
    {
        if (isset($_POST)) {
            //identificar usuario
            //consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();
            //crear una sesion
            if (is_array($identity['DATA'])) {
                $_SESSION['identity'] = $identity['DATA'][0];


                /////////   DEBUGG    ////////////////////////
                // echo '';
                // var_dump($_SESSION['identity']);
                // echo '';
                // die();

                if ($_SESSION['identity']['role'] == 'admin') {
//                    var_dump($_SESSION['identity']['role'] ); return;

                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'identificación fallida !!';
            }
        }
        // if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
        //   header('Location: ' . base_url . 'pedido/hacer');
        // } else header('Location: ' . base_url);
        header('Location: ' . base_url . 'usuario/redirectLogin');
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        // unset($_SESSION['']);
        // session_destroy();

        header('Location: ' . base_url);
    }
} //fin clase
