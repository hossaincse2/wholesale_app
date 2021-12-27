   <?php include('part/header.php') ?>
        <div id="layoutSidenav">
          <?php include('part/sidebar.php') ?>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Users</a></li>
                        </ol> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User  List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <td>User Type</td>
                                            <th>Customer / Resseler name</th>
                                            <th>Contact Number</th>
                                            <th>Product Name</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                            <td>User Type</td>
                                            <th>Customer / Resseler name</th>
                                            <th>Contact Number</th>
                                            <th>Product Name</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Customer/td>
                                            <td>Hossain</td>
                                            <td>01776427516</td>
                                            <td>Mobile</td>
                                            <td>1</td>
                                            <td>200</td>
                                            <td>2011/04/25</td> 
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include('part/footer.php');  ?>
           