<?php
session_start();
require_once 'autoload.php';

function show_error(){
  $error = new errorController();
  $error->index();
}

