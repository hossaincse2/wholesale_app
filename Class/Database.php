<?php 
class Database{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'wholesale_app';

    protected $connection;
    protected $sqlQuery;
    protected $dataSet;

    public function __construct() {
        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }

  
    public function db_num($sql){
          $result = $this->connection->query($sql);
          return $result->num_rows;
    }
    function selectAll($tableName)  {
        $this->sqlQuery = 'SELECT * FROM '.$this->database.'.'.$tableName;
        $this ->dataSet = $this->connection->query($this->sqlQuery);
        return $this->dataSet;
    }

    function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
        $this->sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
        if($valueType == 'int') {
            $this->sqlQuery .= $value;
        }
        else if($valueType == 'char')   {
            $this->sqlQuery .= "'".$value."'";
        }
        $this->dataSet = $this->connection->query($this->sqlQuery);
        $this->sqlQuery = NULL;
        return $this -> dataSet;
        #return $this -> sqlQuery;
    }


    function insertInto($tableName,$values) {
        $i = NULL;

        $this->sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
        $i = 0;
        while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
            if($values[$i]["type"] == "char") {
                $this->sqlQuery .= "'";
                $this->sqlQuery .= $values[$i]["val"];
                $this->sqlQuery .= "'";
            }
            else if($values[$i]["type"] == 'int') {
                $this->sqlQuery .= $values[$i]["val"];
            }
            $i++;
            if($values[$i]["val"] != NULL)  {
                $this->sqlQuery .= ',';
            }
        }
        $this->sqlQuery .= ')';
        #echo $this -> sqlQuery;
        $this->connection->query($this->sqlQuery);
        return $this->sqlQuery;
        #$this -> sqlQuery = NULL;
    }

    function selectFreeRun($query) {
        $this->dataSet = $this->connection->query($query);
        return $this->dataSet;
    }

    function freeRun($query) {
        return $this->connection->query($query);
    }
  }
  
  $db = new Database();
  $db->db_num("SELECT fields FROM YourTable");

