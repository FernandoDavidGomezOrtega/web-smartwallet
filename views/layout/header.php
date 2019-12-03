<?php
ob_start();
?>
<!doctype html>
<html lang="es">

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url; ?>assets/css/styles.css">
  <link rel="shortout icon" type="image/ico" href="<?= base_url; ?>favicon.ico">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

<!-- Mis scripts -->
<!-- <script type="text/javaScript" src="js/main.js"></script> -->



  <title>Smart Wallet</title>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="74">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Header -->
  <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand title font-italic " href="<?= base_url ?>" title="Inicio">


        <img class="logo" id="logo" src="<?= base_url ?>assets/img/logo.jpg" alt="logo smart wallet">
        Smart Wallet
      </a>

      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
              <div class="dropdown show">
                <a class=" nav-link  color_nav_link_item green-letters mr-lg-3" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                </a>
              </div>
            </li>
            <li class="nav-item d-lg-none">
              <div class="dropdown show">
                <a class=" nav-link  color_nav_link_item" href="<?= base_url ?>usuario/entrar" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  <b class="categorias">Iniciar Sesión</b>
                </a>
              </div>
            </li>
            <li class="nav-item  d-lg-none">
              <div class="dropdown show">
                <a class=" nav-link dropdown-toggle color_nav_link_item" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b class="categorias">Gestionar</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                  <a class="dropdown-item" href="<?= base_url ?>categoria/index">Gestionar categorias</a>
                  <a class="dropdown-item" href="<?= base_url ?>producto/gestion">Gestionar productos</a>
                  <a class="dropdown-item" href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a>
                  <a class="dropdown-item" href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a>


                </div>
              </div>
            </li>
            <li class="nav-item  d-lg-none">
              <div class="dropdown show">
                <a class=" nav-link dropdown-toggle color_nav_link_item" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b class="categorias">Gestionar</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                  <a class="dropdown-item" href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a>


                </div>
              </div>
            </li>



          <li class="nav-item d-lg-none ">
            <div class="dropdown show">
              <a class=" nav-link  color_nav_link_item" href="<?= base_url ?>carrito/index" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <b class="categorias">Ver Carrito</b>
              </a>
            </div>
          </li>

          <li class="nav-item ">
            <div class="dropdown show">
              <a class=" nav-link dropdown-toggle color_nav_link_item" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b class="categorias">Categorías</b>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">




              </div>
            </div>
          </li>

          <li class="nav-item d-lg-none ">
            <div class="dropdown show">
              <a class=" nav-link  color_nav_link_item" href="<?= base_url ?>usuario/logout" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <b class="categorias">Cerrar Sesión</b>
              </a>
            </div>
          </li>



        </ul>
      </div>
    </div>
  </nav>
  <!-- /Header -->

  <!-- <div  id="content row"> -->
  <div id="content" class="row">
