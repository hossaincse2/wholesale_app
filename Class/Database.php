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
     public function update($table,$rows,$where)
    {  
            for($i = 0; $i < count($where); $i++)
            {
                if($i%2 != 0)
                {
                    if(is_string($where[$i]))
                    {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode('=',$where);
             
             
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows); 
            for($i = 0; $i < count($rows); $i++)
           {
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                 
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ','; 
                }
            }
            $update .= ' WHERE '.$where;
            $query = $this->connection->query($update);
            if($query)
            {
                return true; 
            }
            else
            {
                return false; 
            }
       
    }
     public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}
    public function escape_string($value){

        return $this->connection->real_escape_string($value);
    }
  }
  


