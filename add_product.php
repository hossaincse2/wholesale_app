   <?php include('part/header.php') ?>
   <?php
   if (isset($_POST['product'])){
       include_once('Class/ProductClass.php');
       $product = new ProductClass();
       $id = $product->escape_string($_POST['product_id']);
       $product_image = '';
       if (isset($_FILES['product_image'])){
           $product_image = $product->fileUpload($_FILES['product_image']);
       }

       $data = [
           'product_title' => $product->escape_string($_POST['product_title']),
           'product_desc' => $product->escape_string($_POST['product_description']),
           'retail_price' => $product->escape_string($_POST['retail_price']),
           'wholesale_price' => $product->escape_string($_POST['wholesale_price']),
           'product_image' => $product_image,
           'created_by' =>  $_SESSION['user']
       ];
       $status = $product->product_create($data,$id);
       $productDetails = [];
       if(isset($_GET['product_id'])){
        $sql = "SELECT * FROM products WHERE id = '".$_GET['product_id']."'";
        $productDetails = $product->details($sql);
       }
       
    }
   ?>
        <div id="layoutSidenav">
          <?php include('part/sidebar.php') ?>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?php echo (isset($productDetails['id'])) ? 'Edit Product' : 'Add Product';  ?>
                            </div>
                            <div class="card-body">
                                <?php if (isset($status['status'])){ ?>
                                    <div class="alert <?php echo $status['status'] ? 'alert-success' : 'alert-danger'?>" role="alert">
                                        <?php echo $status['message']; ?>
                                    </div>
                                <?php } ?>
                                <form method="post" action="" enctype="multipart/form-data" id="customer-form">
                                <input name="product_id" type="hidden" value="<?php echo isset($productDetails['id']) ? $productDetails['id'] : ''; ?>" />
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="product_title" name="product_title" type="text" placeholder="Product Title" value="<?php echo isset($productDetails['product_title']) ? $productDetails['product_title'] : ''; ?>" />
                                                        <label for="product_title">Product Title</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 mb-3"> 
                                                        <label for="product_description">Product Description</label>
                                                        <textarea class="form-control" id="product_description" name="product_description" rows="3" placeholder="Product Description"><?php echo isset($productDetails['product_title']) ? $productDetails['product_title'] : ''; ?></textarea>
                                                </div>
                                            </div> 
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="retail_price" name="retail_price" type="text" value="<?php echo isset($productDetails['product_title']) ? $productDetails['product_title'] : ''; ?>" placeholder="Retail Price" />
                                                        <label for="retail_price">Retail Price</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="wholesale_price" name="wholesale_price" value="<?php echo isset($productDetails['product_title']) ? $productDetails['product_title'] : ''; ?>" type="text"  readonly />
                                                        <label for="wholesale_price">Wholesale Customer Price</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="product_image" name="product_image" type="file" />
                                                <label for="product_image">Product images</label>
                                                <?php if(isset($productDetails['product_image'])){  ?>
                                                    <img src="<?php echo isset($productDetails['product_image']) ? $productDetails['product_image'] : ''; ?>" alt="">
                                                <?php } ?>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                    <button class="btn btn-primary" name="product" type="submit">Add Product</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include('part/footer.php');  ?>
           <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#customer-form").validate({
                            rules: {
                                product_title : {
                                    required: true,
                                    minlength: 2
                                },
                                product_description: {
                                    required: false,
                                },
                                retail_price: {
                                    required: true,
                                }
                            },
                            messages : {
                                product_title: {
                                    required: "Please enter your Product name",
                                    minlength: "Name should be at least 3 characters"
                                },
                                retail_price: {
                                    required: "Please enter your retailer price",
                                }
                            },
                            submitHandler: function(form) {
                                form.submit();
                            }
                        });
                    });
                </script>
           