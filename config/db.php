<?php

class Database{
  public static function connect(){
    $db = new mysqli('localhost:8080', 'root', '', 'smart_wallet');
    $db->query("SET NAMES 'utf8'");
    return $db;
  }
}
