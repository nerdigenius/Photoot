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
                
            	<table border="1px solid red" id="example" class="table table-bordered table-striped display nowrap" style="width:90%">
                    <thead>
                        <tr>
                            <th class="text-center">Order ID</th>
                            <th class="text-center">Client ID</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Services</th>
                            <th class="text-center">Order Status</th>
                            <th class="text-center">Ordered</th>
                            <th class="text-center">Delivery Date</th>
                            <th class="text-center">View File</th>
                            <th class="text-center">Upload File</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php if($show_file != null){ ?>
                    <?php foreach($show_file as $order): ?>
                        <tbody>
                            
                            <tr>
                                <td align="center"><?= $order->order_id; ?></td>
                                <input type="hidden" name="order_id" value="<?= $order->order_id; ?>">
                                <!-- <td align="center">1</td> -->
                                <td align="center"><?= $order->user_id; ?></td>
                                <td align="center">
                                    <?php if($order->payment_status == '1'): ?>
                                    <?= "Done"; ?>
                                    <?php else: echo "Not Done"; ?>
                                    <?php endif; ?>
                                </td>
                                <td align="center"><?=$order->payment_method;?></td>

                                <td>
                                    <?php
                                    $data = $order->order_info; 
                                    $final_data = json_decode($data);
                                    var_dump($final_data);

                                    foreach($final_data as $key => $value){
                                        if( !empty($value->additional_service) ){
                                            echo '<p>'.$value->additional_service.'</p>';
                                        }
                                        else
                                        {
                                            echo '';
                                        }
                                        
                                    }
                                    ?>
                                    <!-- <?php 
                                        $deta = json_decode($item['additional_service']);
                                        if (is_object($deta)) {
                                            $serviceName = array_keys( (array)$deta );
                                            foreach ($serviceName as $key => $value) {
                                                echo '<li>'.$value.'</li>';
                                            }
                                        }
                                    ?> -->
                                </td>

                                <td align="center">
                                    <?php echo $order->order_status; ?>
                                </td>

                                <td align="center">
                                    <?php    
                                        $ordered_at = $order->created_at;
                                        echo date('Y/m/d', strtotime($ordered_at));
                                    ?>
                                </td>

                                <td align="center">28/07/2019</td>
                                
                                <td align="center"><a href="<?= base_url('orders/view_file/').$order->order_id; ?>" ><i class="fa fa-eye" aria-hidden="true"></i></td>
                                
                                <td align="center"><a href="<?= base_url('orders/upload_files/').$order->order_id; ?>" ><i class="fa fa-upload" aria-hidden="true"></i></td>
                                
                                <td align="center">
                                    <form method="post" action="<?= base_url('orders/update_status/').$order->order_id; ?>">
                                        <input type="hidden" name="order_id" value="<?= $order->order_id; ?>">
                                        <select name="order_status" class="custom-select1 select form-group">
                                            <option selected>Update Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="On Air">On Air</option>
                                            <option value="Done">Done</option>                                            
                                         </select> 
                                        <input type="submit" name="" value="Update">
                                    </form>
                                    <form method="post" action="<?= base_url('orders/update_regular_order_payment_status/').$order->order_id; ?>">
                                        <input type="hidden" name="order_id" value="<?= $order->order_id; ?>">
                                        <select name="payment_status" class="custom-select1 select form-group">
                                            <option selected>Payment</option>
                                            <option value="0">Unpaid</option>
                                            <option value="1">Paid</option>                       
                                         </select> 
                                        <input type="submit" name="" class="btn btn-danger" value="Update">
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
