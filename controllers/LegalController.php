<?php
require_once 'models/pedido.php';

class legalController
{
  public function terminosYCondiciones()
  {

    require_once 'views/legal/terminosYCondiciones.php';
  }

  public function terminosDeUso()
  {

    require_once 'views/legal/terminosDeUso.php';
  }

  public function politicaDePrivacidad()
  {

    require_once 'views/legal/politicaDePrivacidad.php';
  }

  public function politicaDeCookies()
  {

    require_once 'views/legal/politicaDeCookies.php';
  }

}//end class
