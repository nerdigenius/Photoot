<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->

    <!-- Print page dependent styles -->
    <?php echo header_assets(); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <script type="text/javascript">
        var BASE_URL = '<?=base_url();?>';
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php if($header) echo $header; ?>

        <!-- =============================================== -->

        <?php if($sidebar) echo $sidebar; ?>

        <!-- =============================================== -->

        
        <?php echo $page; ?>
           
        <?php if($footer) echo $footer; ?>

      <!-- Control Sidebar -->
      <?php if($control_sidebar) echo $control_sidebar; ?>
      <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- Print page dependent styles -->
<?php echo footer_assets(); ?>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
    })
</script>
<script type="text/javascript">
        $(document).ready(function()
        {
            new vpb_multiple_file_uploader
            ({
                vpb_form_id: "form_id", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('orders/upload'); ?>" 
            });
        });

        $(document).ready(function()
        {
            new vpb_multiple_file_uploaders
            ({
                vpb_form_id: "free_order", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('orders/free_file_upload'); ?>" 
            });
        });

        $(document).ready(function()
        {
            new vpb_multiple_file_uploaders
            ({
                vpb_form_id: "custom_order", // Form ID
                autoSubmit: true,
                vpb_server_url: "<?= base_url('orders/custom_order_file_upload'); ?>" 
            });
        });
    </script>
</body>
</html>
