<?php

class Pedido
{
  private $id;
  private $usuario_id;
  private $provincia;
  private $localidad;
  private $direccion;
  private $coste;
  private $estado;
  private $fecha;
  private $hora;
  private $db;

  //conexión db
  public function __construct()
  {
    //Obtenemos la instancia de la BD
    $this->db = Database::getInstance();
  }


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getUsuarioId()
  {
    return $this->usuario_id;
  }

  public function setUsuarioId($usuario_id)
  {
    $this->usuario_id = $usuario_id;
  }

  public function getProvincia()
  {
    return $this->provincia;
  }

  public function setProvincia($provincia)
  {
    $this->provincia = $provincia;
  }

  public function getLocalidad()
  {
    return $this->localidad;
  }

  public function setLocalidad($localidad)
  {
    $this->localidad = $localidad;
  }

  public function getDireccion()
  {
    return $this->direccion;
  }

  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  public function getCoste()
  {
    return $this->coste;
  }

  public function setCoste($coste)
  {
    $this->coste = $coste;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  public function getFecha()
  {
    return $this->fecha;
  }

  public function setFecha($fecha)
  {
    $this->fecha = $fecha;
  }

  public function getHora()
  {
    return $this->hora;
  }

  public function setHora($hora)
  {
    $this->hora = $hora;
  }

  public function getAll()
  {
    $productos = $this->db->get_data("SELECT * FROM pedidos ORDER BY id DESC");
    return $productos;
  }

  public function getOne()
  {
    $producto = $this->db->get_data("SELECT * FROM pedidos WHERE id = {$this->getId()}");
    return $producto;
  }

  public function getOneByUser()
  {
    $sql = "SELECT p.id, p.coste FROM pedidos p  "
              ."WHERE p.usuario_id = {$this->getUsuarioId()} "
              ."ORDER BY id DESC LIMIT 1;";


    $pedido = $this->db->get_data($sql);

    return $pedido;
  }

  public function getAllByUser()
  {
    $sql = "SELECT p.* FROM pedidos p  "
              ."WHERE p.usuario_id = {$this->getUsuarioId()} "
              ."ORDER BY id DESC;";
    $pedidos = $this->db->get_data($sql);

    return $pedidos;
  }

  public function getProductosByPedido($id) {
    // $sql = "SELECT * FROM productos WHERE id  IN "
    //         ."(SELECT producto_id FROM lineas_pedidos WHERE pedido_id= {$id})";

    $sql = "SELECT pr.*, lp.unidades FROM productos pr "
            ."INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            ."WHERE lp.pedido_id = {$id}";

    $productos = $this->db->get_data($sql);

    return $productos;
  }

  public function save()
  {

    $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuarioId()}, '{$this->getProvincia()}', "
              ."'{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'Pendiente de pago', "
              ."CURDATE(), CURTIME()  )";

    $save = $this->db->exec($sql,true);

    $result = false;
  if ($save['STATUS'] == 'OK') {
      $result = true;
  }
    return $result;
  }

  public function save_linea() {
    $sql = "SELECT LAST_INSERT_ID() as 'pedidos';";

    $query = $this->db->get_data($sql);
     var_dump($query); return ;
    $pedido_id = $query->pedido;

    foreach ($_SESSION['carrito'] as $elemento) {
      $producto = $elemento['producto'];

      $insert = "INSERT INTO lineas_pedidos values(null, {$pedido_id}, {$producto->id}, {$elemento['unidades']} )";
      $save =$this->db->exec($insert,true);

    }

    $result = false;
      if ($save['STATUS'] == 'OK') {
          $result = true;
      }
    return $result;


  }

  public function edit() {
    $sql = "UPDATE pedidos SET estado='{$this->getEstado()}'"
            . " WHERE id={$this->id}";

    $save = $this->db->exec($sql);

    $result = false;
      if ($save['STATUS'] == 'OK') {
          $result = true;
      }

    return $result;

  }

}
