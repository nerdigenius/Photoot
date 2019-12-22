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
        <div class="container box">
            <div class="row">
                <h1>Order List</h1>
                
            	<table border="1px solid red" id="example" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Serial No</th>
                            <th class="text-center">Custom Quote ID</th>
                            <th class="text-center">View File</th>
                            <th class="text-center">Amount(with 22 % Vat)</th>
                            <th class="text-center">Quote Status</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Order Status</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php $c=0; ?>
                    <?php if($show_file != null){ ?>
                    <?php foreach($show_file as $order): ?>
                        <tbody>
                            
                            <tr>
                                <td align="center"><?=++$c?></td>
                                <td align="center"><?= $order->custom_quote_id; ?></td>                             
                                
                                <td align="center"><a href="<?= base_url('orders/view_custom_order/').$order->custom_quote_id; ?>" ><i class="fa fa-eye" aria-hidden="true"></i></td>
                                
                                <td align="center"><span><?=$order->amount?></span></td>
                                <td align="center"><span><?=$order->quote_status?></span></td>
                                <td align="center"><span><?=$order->payment_status?></span></td>
                                <td align="center"><span><?=$order->payment_method?></span></td>
                                <td align="center"><span><?=$order->order_status?></span></td>
                                <td align="center"><span><?=$order->created_at?></span></td>
                               
                                <td>
                                    <form method="post" action="<?= base_url('orders/update_quote_status/').$order->custom_quote_id; ?>">
                                        <input type="hidden" name="custom_quote_id" value="<?= $order->custom_quote_id; ?>">
                                        <div class="btn-group">
                                            <select name="quote_status" class="custom-select1 select form-group col-sm-6" style="height:35px">
                                                <option selected>Quote Status</option>
                                                <option value="Done">Done</option>
                                                <option value="Processing">Processing</option>                         
                                             </select> 
                                            <input type="submit" name="" class="btn btn-info btn-xs pull-right" value="Update">
                                        </div>
                                    </form>
                                    <form method="post" action="<?= base_url('orders/update_payment_status/').$order->custom_quote_id; ?>">
                                        <input type="hidden" name="custom_quote_id" value="<?= $order->custom_quote_id; ?>">
                                        <div class="btn-group">
                                            <select name="payment_status" class="custom-select1 select form-group col-sm-6" style="height: 35px">
                                                <option selected>Payment</option>
                                                <option value="Unpaid">Unpaid</option>
                                                <option value="Paid">Paid</option>                       
                                             </select> 
                                            <input type="submit" name="" class="btn btn-danger btn-xs pull-right" value="Update">
                                        </div>
                                    </form>
                                    <form method="post" action="<?= base_url('orders/update_custom_status/').$order->custom_quote_id; ?>">
                                        <input type="hidden" name="custom_quote_id" value="<?= $order->custom_quote_id; ?>">
                                        <div class="btn-group">
                                            <select name="order_status" class="custom-select1 select form-group col-xs-6" style="height: 35px;">
                                                <option selected>Order Status</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Done">Done</option>                                            
                                             </select> 
                                            <input type="submit" class="btn btn-success btn-xs pull-right" name="" value="Update">
                                        </div>
                                    </form>
                                </td>
                                
                            </tr>
                            
                        </tbody>
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
