<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
  public function index(){
    Utils::isAdmin();
    $categoria = new Categoria();
    $categorias = $categoria->getAll();

    require_once 'views/categoria/index.php';
  }

  public function ver() {
    if (isset($_GET['id'])) {
      $id = ($_GET['id']);

      //conseguir categoria
      $categoria = new Categoria();
      $categoria->setId($id);
      $categoria = $categoria->getOne();

      //conseguir productos
      $producto = new Producto();
      $producto->setCategoriaId($id);
      $productos = $producto->getAllFromCategory();
    }

    require_once 'views/categoria/ver.php';
  }

  public function crear(){
    Utils::isAdmin();
    require_once 'views/categoria/crear.php';
  }

  public function save(){
    Utils::isAdmin();

    //guardar la categoria en db
    if(isset($_POST) && isset($_POST['nombre'])){
      $categoria = new Categoria();
      $categoria->setNombre($_POST['nombre']);
      $save = $categoria->save();
    }
    header('Location: ' . base_url . 'categoria/index');
  }

}
