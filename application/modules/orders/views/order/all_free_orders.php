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
            Free Order
            <small>Check & Upload the file as soon as possible</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Users</a></li> -->
            <li class="active">Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container box">
            <div class="row">
                <h1>Free Order List</h1>
                
            	<table border="1px solid red" id="example" class="table table-bordered table-striped display nowrap" style="width:90%">
                    <tr>
                        <th class="text-center">Sl</th>
                        <th class="text-center">Free Order No</th>
                        <th class="text-center">Client ID</th>
                        <th class="text-center">Number</th>
                        <th class="text-center">JOb Name</th>
                        <th class="text-center">Service</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">View File</th>
                        <th class="text-center">Upload File</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php $c=0; ?>
                    <?php if($show_file != null){ ?>
                    <?php foreach($show_file as $order): ?>
                        
                    <tr>
                        <td align="center"><?=++$c?></td>
                        <td align="center"><?= $order->fixed_id; ?></td>
                        <td align="center"><?= $order->user_id; ?></td>
                        
                        

                        <td align="center">1</td>

                        <td align="center">abc</td>
                        <td align="center">Service</td>
                        <td align="center">Description</td>
                        <td align="center"><?=$order->status;?></td>

                        
                        
                        <td align="center"><a href="<?= base_url('orders/view_free_file/').$order->fixed_id; ?>" ><i class="fa fa-eye" aria-hidden="true"></i></td>
                        
                        <td align="center"><a href="<?= base_url('orders/upload_free_file/').$order->fixed_id; ?>" ><i class="fa fa-upload" aria-hidden="true"></i></td>
                        
                        <td align="center">
                            <form method="post" action="<?= base_url('orders/update_free_order_status');?>">
                                <input type="hidden" name="fixed_id" value="<?= $order->fixed_id ?>">
                                <select name="order_status" class="custom-select1 select form-group">
                                    <option selected>Update Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="On Air">On Air</option>
                                    <option value="Done">Done</option>                                            
                                 </select> 
                                <input type="submit" name="" value="Update">
                            </form>
                        </td>
                        
                    </tr>
                    
                    <?php endforeach; ?>
                    <?php } else{ ?>
                    <tbody>
                        <tr>
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
