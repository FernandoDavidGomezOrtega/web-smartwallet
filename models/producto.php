<?php

class Producto{
  private $id;
  private $categoria_id;
  private $nombre;
  private $descripcion;
  private $precio;
  private $stock;
  private $oferta;
  private $fecha;
  private $imagen;
  private $db;

  //conexión db
  public function __construct(){
    //Obtenemos la instancia de la BD
    $this->db = Database::getInstance();
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getCategoriaId() {
    return $this->categoria_id;
  }

  public function setCategoriaId($categoria_id) {
    $this->categoria_id = $categoria_id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public function setPrecio($precio) {
    $this->precio = $precio;
  }

  public function getStock() {
    return $this->stock;
  }

  public function setStock($stock) {
    $this->stock = $stock;
  }

  public function getOferta() {
    return $this->oferta;
  }

  public function setOferta($oferta) {
    $this->oferta = $oferta;
  }

  public function getFecha() {
    return $this->fecha;
  }

  public function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  public function getImagen() {
    return $this->imagen;
  }

  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  public function getAll() {
    $productos = $this->db->get_data("SELECT * FROM productos ORDER BY id DESC");
    return $productos;
  }

  public function getAllFromCategory($id) {
//    $sql = "SELECT p.*, c.nombre AS 'categoryname' FROM productos p "
//      . "INNER JOIN categorias c ON c.id = p.categoria_id "
//      . "WHERE p.categoria_id = 2 "
//      . "ORDER BY id DESC";
      $sql  = "SELECT * from productos p ";
      $sql .= "INNER JOIN categorias c ON c.id = p.categoria_id " ;
      $sql .= "WHERE p.categoria_id = ".$id." ";
      $sql .= "ORDER BY p.id DESC" ;



    $productos = $this->db->get_data($sql);


    return $productos;
  }

  public function getRandom($limit) {
    $productos = $this->db->get_data("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
    return $productos;
  }

  public function getOne() {
    $producto = $this->db->get_data("SELECT * FROM productos WHERE id = {$this->getId()}");
    return $producto;
  }

  public function save(){


      $sql = "INSERT INTO productos VALUES(NULL,  %s,'%s','%s',%s,%s,'no', CURDATE(),'%s'  )";

      $sqlWithParameters = sprintf($sql,
          $this->getCategoriaId(),
          $this->getNombre(),
          $this->getDescripcion(),
          $this->getPrecio(),
          $this->getStock(),
//          $this->getOferta(),
          $this->getImagen()
      );
//      die($sqlWithParameters);;return;
      $save = $this->db->exec($sqlWithParameters,true);
//      die($save);;return;

    $result = false;
      if ($save['STATUS'] == 'OK') {
          $result = true;
      }
    return $result;
  }

  public function edit(){
    $sql = "UPDATE productos SET categoria_id='%s', nombre='%s', descripcion='%s', precio=%s, stock=%s";

      if ($this->getImagen() != null) {
          $sql .= ", imagen='{$this->getImagen()}'";
      }

      $sql .= " WHERE id={$this->id}";

      $sqlWithParameters = sprintf($sql,
          $this->getCategoriaId(),
          $this->getNombre(),
          $this->getDescripcion(),
          $this->getPrecio(),
          $this->getStock()
//          $this->getOferta(),
//          $this->getImagen()
      );


//
//    if ($this->getImagen() != null) {
//      $sql .= ", imagen='{$this->getImagen()}'";
//    }
//
//    $sql .= " WHERE id={$this->id}";

      //      die($sqlWithParameters);;return;
      $save = $this->db->exec($sqlWithParameters,true);
//      die($save);;return;

    $result = false;
      if ($save['STATUS'] == 'OK') {
          $result = true;
      }
    return $result;
  }

  public function delete() {
    $sql = "DELETE FROM productos WHERE id={$this->id}";
    $delete = $this->db->exec($sql);

    $result = false;
    if ($delete['STATUS']=='OK') {
      $result = true;
    }
    return $result;
  }

}
