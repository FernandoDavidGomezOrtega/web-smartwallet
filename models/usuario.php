<?php

class Usuario{
  private $id;
  public $nombre;
  private $apellidos;
  private $email;
  private $password;
  private $rol;
  private $imagen;
  private $db;

  //conexión db
  public function __construct(){
    //Obtenemos la instancia de la BD
    $this->db = Database::getInstance();
  }

  function getId() {
      return $this->id;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getApellidos() {
      return $this->apellidos;
  }

  function getEmail() {
      return $this->email;
  }

  function getPassword() {
      return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
  }

  function getRol() {
      return $this->rol;
  }

  function getImagen() {
      return $this->imagen;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
  }

  function setEmail($email) {
      $this->email = $email;
  }

  function setPassword($password) {
      $this->password = $password;
  }

  function setRol($rol) {
      $this->rol = $rol;
  }

  function setImagen($imagen) {
      $this->imagen = $imagen;
  }

  public function save(){
    $sql = "INSERT INTO usuarios VALUES(NULL, '%s','%s','%s','%s','%s', NULL)";
    $sqlWithParameters = sprintf($sql,
        $this->getNombre(),
        $this->getApellidos(),
        $this->getEmail(),
        $this->getPassword()
        , 'user'
    );

    $save = $this->db->exec($sqlWithParameters,true);
    $result = false;
    if ($save['STATUS'] == 'OK') {
      $result = true;
    }
    return $result;
  }

  public function login(){
    $result = false;
    $email = $this->email;
    $password = $this->password;


    //comprobar si existe el usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $user = $this->db->get_data($sql,true);

    if (count($user['DATA']) == 1) {

      //verificar la contraseña
      $verify = password_verify($password, $user['DATA'][0]['password']);

      if ($verify) {
        $result = $user;
      }
    }

    return $result;
  }




}
