<?php

class ProductClass extends Database {

    public function __construct(){
        parent::__construct();
    }
    public function product_create($data){
        $status =  $this->insertInto('products',$data);
        return $status;
    }
    public function products(){
        return $this->selectAll('products');
    } 
    public function orders(){
        return $this->selectAll('orders');
    }

    public function place_order($data){
        $status =  $this->insertInto('orders',$data);
        return $status;
    }
}