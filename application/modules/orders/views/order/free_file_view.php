<?php 
// echo set_title('title', 'User');
echo add_assets('header', 
    array(
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/select2/dist/css/select2.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/plugins/bootoast/bootoast.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/css/trainee.css').'">',
    )
);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Trainee
            <small>Assign trainee to a batch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Users</a></li> -->
            <li class="active">Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <h1>Order List</h1>
                
            	<table border="1px solid red" id="example" class="display nowrap" style="width:90%">
                    <thead>
                        <tr>
                            <th class="text-center">Order ID</th>
                            <!-- <th class="text-center">Product ID</th> -->
                            <th class="text-center">File</th>
                            <th class="text-center">Uploaded At</th>
                        </tr>
                    </thead>
                    <?php if($show_file != null){ ?>
                    <?php foreach($show_file as $order): ?>
                        <tbody>   
                            <tr>
                                <td align="center"><?= $order->fixed_id; ?></td>
                                <td align="center"><a href="<?php echo base_url('front_assets/try_it_free/uploads/').$order->file; ?>">Download</a></td>
                                <td align="center"><?= $order->created_at; ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                    <?php } else{ ?>
                    <tbody>
                        <tr>
                            <td align="center">NO Data</td>
                            <td align="center">NO Data</td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                
            </div>
        </div>
    </section>
</div>



<?php 
echo add_assets('footer', 
    array(
        '<script src="'.base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js').'"></script>',
        '<script src="'.base_url('assets/plugins/bootoast/bootoast.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/select2/dist/js/select2.full.min.js').'"></script>',
        '<script src="'.base_url('assets/scripts/trainee.js').'"></script>',
        '<script src="'.base_url('assets/scripts/enrol.js').'"></script>',
    )
);
?>
