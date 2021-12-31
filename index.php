<?php
error_reporting(0);
session_start();
//return to login if not logged in
include_once('Class/UserClass.php');
include_once('Class/ProductClass.php');
$user = new UserClass();
$product = new ProductClass();

if (isset($_SESSION['user']) ||(trim ($_SESSION['user']) != '')){
   //fetch user data
    $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
    $userDetails = $user->details($sql);
    $products = $product->products($_SESSION['user']);
}else{
    $products = $product->products();
}

if(isset($_POST['order'])){
    $data = [
            'user_id' => $user->escape_string($_POST['firstname']),
            'product_id' => $user->escape_string($_POST['lastname']),
            'order_no' => $user->escape_string($_POST['user_type'])
     ];
    $status = $product->place_order($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wholesale App</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<?php include('part/home_navbar.php') ?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">All Products</h1>
            <p class="lead fw-normal text-white-50 mb-0">Shopping</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert  alert-success"   style="display: none">
                    <span class="orderMessage"></span>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php if (count($products) > 0){
                foreach ($products as $data){  ?>
                    <div class="col mb-5">
                        <div class="card h-100">

                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $data['product_image'] ? 'images/'.$data['product_image'] : 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $data['product_title'] ?></h5>
                                    <!-- Product price-->

                                    Tk <?php echo  $data['retail_price'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a data-id="<?php echo $data['id'] ?>" data-user_id="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : '' ?>" class="btn btn-outline-dark mt-auto placeOrder" href="#">Place Order</a></div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>
<?php include('part/home_footer.php') ?>
<!-- Bootstrap core JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    $(document).on('click','.placeOrder',function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let user_id = $(this).attr('data-user_id');
        submitData(id,user_id);
    })
    function submitData(id,user_id) {
        $.ajax({
            type:"GET",
            url:"placeOrder.php?product_id="+id+'&user_id='+user_id,
            cache:false,
            success:function(html) {
                $('.alert-success').show();
                $('.orderMessage').html(html);
            }
        });
        return false;
    }
</script>
</body>
</html>
