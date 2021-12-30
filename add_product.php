   <?php include('part/header.php') ?>
   <?php
   if (isset($_POST['product'])){
       include_once('Class/ProductClass.php');
       $product = new ProductClass();
       $data = [
           'product_title' => $user->escape_string($_POST['product_title']),
           'product_desc' => $user->escape_string($_POST['product_description']),
           'retail_price' => $user->escape_string($_POST['retail_price']),
           'wholesale_price' => $user->escape_string($_POST['wholesale_price']),
           'product_image' => $user->escape_string($_POST['product_image'])
       ];
       $status = $product->product_create($data);
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
                                Add Product
                            </div>
                            <div class="card-body">
                                <?php if (isset($status['status'])){ ?>
                                    <div class="alert <?php echo $status['status'] ? 'alert-success' : 'alert-danger'?>" role="alert">
                                        <?php echo $status['message']; ?>
                                    </div>
                                <?php } ?>
                                <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="product_title" name="product_title" type="text" placeholder="Product Title" />
                                                        <label for="product_title">Product Title</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 mb-3"> 
                                                        <label for="product_description">Product Description</label>
                                                        <textarea class="form-control" id="product_description" name="product_description" rows="3" placeholder="Product Description"></textarea>
                                                </div>
                                            </div> 
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="retail_price" name="retail_price" type="text" placeholder="Retail Price" />
                                                        <label for="retail_price">Retail Price</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="wholesale_price" name="wholesale_price" type="text"  readonly />
                                                        <label for="wholesale_price">Wholesale Customer Price</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="product_image" name="product_image" type="file" />
                                                <label for="product_image">Product images</label>
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
           