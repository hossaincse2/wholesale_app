<?php 
class Database{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;
  
    public function __construct() {
      $this->db_connect();
    }
  
    private function db_connect(){
      $this->host = 'localhost';
      $this->user = 'root';
      $this->pass = '';
      $this->db = 'db';
  
      $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
      return $this->mysqli;
    }
  
    public function db_num($sql){
          $result = $this->mysqli->query($sql);
          return $result->num_rows;
    }
  }
  
  $db = new Database();
  $db->db_num("SELECT fields FROM YourTable");

