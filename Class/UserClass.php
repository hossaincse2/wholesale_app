<?php
include 'Database.php';

class UserClass extends Database {

    public function __construct(){
        parent::__construct();
    }
    public function user_create($data){
           $status =  $this->insertInto('users',$data);
           return $status;
    }
    public function check_login($email, $password){

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }

    public function details($sql){

        $query = $this->connection->query($sql);

        $row = $query->fetch_array();

        return $row;
    }
    public function users(){
        return $this->selectAll('users');
    } 

    public function escape_string($value){

        return $this->connection->real_escape_string($value);
    }


}