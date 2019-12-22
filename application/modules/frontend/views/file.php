

<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>





            <!-- Shopping Cart Area -->
            <!-- <form method="post" action="<?= base_url('frontend/checkout'); ?>"> -->
            <div class="cart-page-area ptb-30 bg-white">
                <div class="container">
                    
                    <!-- Cart Products -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">Order ID</th>
                                    <th class="cart-column-image" scope="col">Product ID</th>
                                    <th class="cart-column-image" scope="col">File</th>    
                                    <th class="cart-column-image" scope="col">Action</th>    
                                </tr>
                            </thead>
                            
                            <?php foreach($files as $file): ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $file->order_id; ?></td>
                                    <td><?php echo $file->product_id; ?></td>
                                    <td><a href="<?php echo base_url('assets/zip/').$file->file; ?>">Download</a></td>
                                    <td>
                                        <a href="<?= base_url('frontend/delete_file/').$file->file_id; ?>" onclick="return confirm('Do you really want to delete this product?');" class="btn btn-dark">Delete</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <?php endforeach; ?>

                        </table>
                    
                </div>
            </div>
        </div>
        




<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>