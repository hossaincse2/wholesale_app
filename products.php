   <?php include('part/header.php') ?>
        <div id="layoutSidenav">
          <?php include('part/sidebar.php') ?>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Products</a></li>
                        </ol> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Product List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Retailer Price</th>
                                            <th>WholeSale Price</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Name</th>
                                            <th>Retailer Price</th>
                                            <th>WholeSale Price</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>250</td>
                                            <td>200</td>
                                            <td></td>
                                            <td>2011/04/25</td> 
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include('part/footer.php');  ?>
           