   <?php include('part/header.php') ?>
   <?php $users = $product->users(); ?>
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
                                            <th>Action</th>
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if (count($users) > 0){
                                            foreach ($users as $data){  ?>
                                        <tr>
                                            <td><?php echo $data['user_type'] ?></td>
                                            <td><?php echo $data['firstname'] ?></td>
                                            <td><?php echo $data['prmobileoduct_title'] ?></td>
                                            <td><?php echo $data['mobile'] ?></td>
                                            <td><?php echo $data['mobile'] ?></td> 
                                            <td><?php echo $data['mobile'] ?></td> 
                                            <td><?php echo $data['mobile'] ?></td> 
                                            <td><a href="">Delete</a></td> 
                                        </tr> 
                                        <?php }
                                       } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include('part/footer.php');  ?>
           