<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



function show_error(){
  $error = new errorController();
  $error->index();
}



require_once 'views/layout/footer.php';

