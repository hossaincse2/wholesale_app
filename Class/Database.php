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
        $this->dataSet = $this->connection->query($this->sqlQuery);
//        $row = $this->dataSet->fetch_assoc();
        $data = [];
        while ($row = $this->dataSet->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;
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
        return $this->dataSet;
        #return $this -> sqlQuery;
    }


    function insertInto($tableName,$data) {

        $this->sqlQuery = "INSERT INTO ".$tableName." (";
        $this->sqlQuery .= implode(",", array_keys($data)) . ') VALUES (';
        $this->sqlQuery .= "'" . implode("','", array_values($data)) . "')";
        if($this->connection->query($this->sqlQuery))
        {
            return ['status' => true, 'message' => 'Inserted Successfully!'];
        }
        else
        {
            return ['status' => false, 'message' => mysqli_error($this->connection)];
        }
     }

    function selectFreeRun($query) {
        $this->dataSet = $this->connection->query($query);
        return $this->dataSet;
    }

    function freeRun($query) {
        return $this->connection->query($query);
    }
  }
  


