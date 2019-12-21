
<?php
require_once 'models/pedido.php';

class pedidoController
{
    private $db;

    //conexión db
    public function __construct()
    {
        //Obtenemos la instancia de la BD
        $this->db = Database::getInstance();
    }

  public function hacer()
  {

    require_once 'views/pedido/hacer.php';
  }

  public function add()
  {
    if (isset($_SESSION['identity'])) {
      $usuario_id = $_SESSION['identity']['id'];
      $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
      $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
      $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
      $stats = Utils::statsCarrito();
      $coste = $stats['total'];

      //guardar datos en db
      if ($provincia && $localidad && $direccion) {
          $pedido = new Pedido();
          $pedido->setUsuarioId($usuario_id);
          $pedido->setProvincia($provincia);
          $pedido->setLocalidad($localidad);
          $pedido->setDireccion($direccion);
          $pedido->setCoste($coste);

          // iniciamos transacción
          $this->db->beginTransaction();
          try {
              $pedido->save();
              $pedido->save_linea();

              $this->db->commit();

          } catch (\Exception $e) {
              $_SESSION['pedido'] = 'failed';
              $this->db->rollback();
          }
          $this->db->close();

          $_SESSION['pedido'] = 'complete';
          unset($_SESSION['carrito']);
          header('Location: ' . base_url . 'pedido/confirmado');
      }
    } else {
      //redirigir al index
      header('Location: ' . base_url);
    }
  }

  public function confirmado() {
    if(isset($_SESSION['identity'])) {
      $identity = $_SESSION['identity'];
      $pedido = new Pedido();
      $pedido->setUsuarioId($identity['id']);

      $pedido = $pedido->getOneByUser();
      $pedido_productos = new Pedido();
      $productos = $pedido_productos->getProductosByPedido($pedido['DATA'][0]['id']);


    }

    require_once 'views/pedido/confirmado.php';
  }

  public function mis_pedidos() {
    Utils::isIdentity();
    $usuario_id = $_SESSION['identity']['id'] ;
    $pedido = new Pedido();

    //sacar los pedidos del usuario
    $pedido->setUsuarioId($usuario_id);
    $pedidos = $pedido->getAllByUser();
    
    require_once 'views/pedido/mis_pedidos.php';
  }

  public function detalle() {
    Utils::isIdentity();
    
    if(isset($_GET['id'])) {
      $id = $_GET['id'];
      //sacar el pedido
      $pedido = new Pedido();
      $pedido->setId($id);
      $pedido = $pedido->getOne();  
      
      //sacar los productos
      $pedido_productos = new Pedido();
      $productos = $pedido_productos->getProductosByPedido($id);
      require_once 'views/pedido/detalle.php';

    } else {
         header('Location: ' . base_url . 'pedido/mis_pedidos');
    }
  }

  public function gestion() {
    Utils::isAdmin();
    $gestion = true;

    $pedido = new Pedido();
    $pedidos = $pedido->getAll();
    require_once 'views/pedido/mis_pedidos.php';
  }

  public function estado() {
    Utils::isAdmin();

    if(isset($_POST['pedido_id']) && isset($_POST['estado'])) {
      //recoger datos del form
      $id = $_POST['pedido_id'];
      $estado = $_POST['estado'];
      //update del pedido
      $pedido = new Pedido();
      $pedido->setId($id);
      $pedido->setEstado($estado);
      $pedido->edit();

      header('Location: ' . base_url . 'pedido/detalle&id='.$id);
    } else {
         header('Location: ' . base_url);
    }
  }
}//end class
