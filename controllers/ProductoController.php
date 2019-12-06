<?php
require_once 'models/producto.php';

class productoController{
  public function index(){
    $producto = new Producto();
    $productos = $producto->getRandom(6);

    //renderizar vista
    require_once 'views/producto/destacados.php';
  }


}
