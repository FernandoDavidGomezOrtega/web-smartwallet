<?php


class Database
{
  private $_connection;
  private static $_instance; //The single instance
  private $_username = 'root';
  private $_dbname = 'smart_wallet' ;
  private $_password = '';
  private $_hostname = 'localhost';


  /*
    Get an instance of the Database
    @return Instance
    */
  public static function getInstance()
  {
    if (!self::$_instance) // If no instance then make one
    {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  // Magic method clone is empty to prevent duplication of connection
  private function __clone()
  {
  }

   // Get mysqli connection
   public function getConnection()
   {
       return $this->_connection;
   }
  // Constructor
  private function __construct()
  {
    $this->_connection = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_dbname);
    $this->_connection->set_charset("utf8");
    // Error handling
    if (mysqli_connect_error()) {
      trigger_error("Failed to conencto to MySQL: " . $this->_connection->connect_error);
    }
  }

    public function get_data($sql,$withOutQuotes=false)
    {
        $ret = array('STATUS'=>'ERROR','ERROR'=>'','DATA'=>array());
        if($withOutQuotes){
            $prepareSql = $sql;
        }else {
            $prepareSql = $this->_connection->real_escape_string($sql);
        }
        $mysqli = $this->getConnection();
        $res = $mysqli->query($prepareSql);

        if($res)
            $ret['STATUS'] = "OK";
        else
            $ret['ERROR'] = mysqli_error();

        while($row = $res->fetch_array(MYSQLI_ASSOC))
        {
            $ret['DATA'][] = $row;
        }
        return $ret;
    }

    public function exec($sql,$withOutQuotes=false)
    {
        $ret = array('STATUS'=>'ERROR','ERROR'=>'');

        if($withOutQuotes){
            $prepareSql = $sql;
        }else {
            $prepareSql = $this->_connection->real_escape_string($sql);
        }
        $mysqli = $this->getConnection();
        $res = $mysqli->query($prepareSql);

        if($res)
            $ret['STATUS'] = "OK";
        else
            $ret['ERROR'] = mysqli_error();

        return $ret;
    }

    public function beginTransaction() {
        $this->_connection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
    }
    public function commit(){
        $this->_connection->commit();
    }
    public function rollback(){
        $this->_connection->rollback();
    }
    public function close(){
        $this->_connection->close();
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
//         $usuario = 'id11470001_root';
//         $password = '8VHXSiqIClAF';
//         $db = 'id11470001_smartwallet';
  
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
