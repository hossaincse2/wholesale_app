<?php
include_once('Class/UserClass.php');
include_once('Class/ProductClass.php');
$order = new ProductClass();
$user = new UserClass();
$data = [
    'order_number' => rand(10,100),
    'user_id' => $order->escape_string($_GET['user_id']),
    'product_id' =>$order->escape_string($_GET['product_id']),
];
$status = $order->place_order($data);

if ($status){
    echo 'Order place successfully';
}else{
    echo 'Failed to order place';
}