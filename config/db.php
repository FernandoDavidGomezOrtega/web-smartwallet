<?php

class Database{
  public static function connect(){
    $db = new mysqli('localhost', 'root', '', 'smart_wallet');
    // $db = new mysqli('localhost', 'root', '8VHXSiqIClAF', 'smart_wallet');
    $db->query("SET NAMES 'utf8'");
    return $db;
  }
}

///////////////////////////////////////////
// para 000webhost

// <?php

// class Database
// {
//     public static function connect()
//     {
//         $host = 'localhost';
//         $usuario = 'id10188783_root';
//         $password = '12345';
//         $db = 'id10188783_parteaccidente';
  
//         if (!$conexion = new mysqli($host, $usuario, $password)) {
//             die("<h3 style='color:red'>Conexion fallida: $conexion->connect_error</h3>");
//         }
//         if (!$conexion->query($sql="use $db")) {
//             die("<h3 style='color:red'>La base de datos '$db' no pudo ser accedida.<br>ERROR: $conexion->error</h3>");
//         }
      
      
//         $conexion->query("SET NAMES 'utf8'");
      
  
  
  
//         return $conexion;
//     }
// }

