<?php

class ProductClass extends Database {

    public function __construct(){
        parent::__construct();
    }
    public function product_create($data,$id=null){
        if($id){
            $status =  $db->update('products',$data,array('id',$id));
        }else{
            $status =  $this->insertInto('products',$data);
        }
        
        return $status;
    }
    public function products(){
        return $this->selectAll('products');
    } 
    public function details($sql){

        $query = $this->connection->query($sql);

        $row = $query->fetch_array();

        return $row;
    }
    public function orders(){
        return $this->selectAll('orders');
    }

    public function place_order($data){
        $status =  $this->insertInto('orders',$data);
        return $status;
    }
   

}