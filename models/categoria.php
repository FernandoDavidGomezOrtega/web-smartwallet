<?php


class Categoria{
  private $id;
  private $nombre;
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

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = nombre;
  }

  public function getAll(){
    //$categorias = $this->db->get_data("SELECT * FROM categorias ORDER BY id DESC;");
      $categorias = $this->db->get_data("SELECT * FROM categorias ORDER BY id DESC;");
    return $categorias;
  }

  public function getOne($id){
    $categoria = $this->db->get_data("SELECT * FROM categorias WHERE id=".$id);
    return $categoria;
  }

  public function save(){
    $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";

    $save = $this->db->exec($sql);

    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }
}
