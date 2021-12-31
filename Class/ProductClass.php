<?php

class ProductClass extends Database {

    public function __construct(){
        parent::__construct();
    }
    public function product_create($data,$id=null){
        if($id){
            $status =  $this->update('products',$data,array('id',$id));
        }else{
            $status =  $this->insertInto('products',$data);
        }
        return $status;
    }
    public function products($id=null){
        if ($id){
            return $this->selectAllProduct('products',$id);
        }
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
    public function fileUpload($image){
        if(isset($image)){
            $errors= array();
            $file_name = $image['name'];
            $file_size = $image['size'];
            $file_tmp = $image['tmp_name'];
            $file_type = $image['type'];
            if($file_size > 5097152){
                $message = [
                    'status' => false,
                    'message' => 'File size must be excately 2 MB.',
                ];
                return  $message;
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$file_name);
                return $file_name;
            }else{
                $message = [
                    'status' => false,
                    'message' => 'File upload failed!',
                ];
                return  $message;
            }
        }
    }

}