    <!-- Footer Menu -->
    <?php include 'footer-menu.php'; ?>
    <!-- // Footer Menu -->
    </div>
    <!--// Wrapper -->
    
    
    <script src="<?= base_url('front_assets/js/vendor/modernizr-3.6.0.min.js'); ?>"></script>
    <script src="<?=base_url('front_assets/upload_file/js/bootstrap.js')?>"></script>
    <script src="<?= base_url('front_assets/js/popper.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="<?=base_url('front_assets/js/registration.js')?>"></script>
    <script src="<?=base_url('front_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('front_assets/js/plugins.js')?>"></script>
    <script src="<?=base_url('front_assets/js/main.js')?>"></script>
    <script src="<?=base_url('front_assets/js/checkout.js')?>"></script>
    <script src="<?=base_url('front_assets/js/bootoast.js')?>"></script>
    <script src="<?=base_url('front_assets/js/auth_modal.js')?>"></script>
    <script src="<?=base_url('front_assets/js/single_product.js')?>"></script>
    <script src="<?=base_url('front_assets/js/news-letter.js')?>"></script>
    <script src="<?=base_url('front_assets/js/toggle_order.js')?>"></script>
    <script src="<?=base_url('front_assets/upload_file/js/jquery.dataTables.js')?>"></script>
    <script src="<?=base_url('front_assets/upload_file/js/DT_bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?= base_url().'front_assets/js/vpb_uploader.js'; ?>"></script>
    <!-- Js Files -->

    
    <script src="<?=base_url('front_assets/js/jquery.sticky.js');?>"></script>       
    
    <script src="<?=base_url('front_assets/js/custom_quote.js')?>"></script>
    <script src="<?=base_url('front_assets/js/order_failed.js')?>"></script>
    <script src="<?=base_url('front_assets/js/try_free_order.js')?>"></script>

    <!-- Single Product Page -->
    <script src="<?=base_url('front_assets/js/additional_services.js');?>"></script>
    <script src="<?=base_url('front_assets/js/cart_calculation.js');?>"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <script src="<?=base_url('front_assets/js/datatables.js')?>"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- Tab nav link -->
    <script type="text/javascript" src="<?=base_url('front_assets/js/tab-nav-link.js')?>"></script>
    <!-- Validetta -->
    <script type="text/javascript" src="<?=base_url('front_assets/validetta/validetta.js')?>"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            new vpb_multiple_file_uploader
            ({
                vpb_form_id: "form_id", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('frontend/upload'); ?>" 
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            new vpb_multiple_file_uploaders
            ({
                vpb_form_id: "custom_quote_form_id", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('frontend/custom_quote_upload'); ?>" 
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            new vpb_multiple_file_uploaderss
            ({
                vpb_form_id: "try_it_free_id", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('frontend/try_it_free_upload'); ?>" 
            });
        });
    </script>
</body>
</html>

