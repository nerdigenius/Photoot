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
                <h1><span style="color: red; font-weight: 800;">Order List => </span>Order Id: <?php
                                                if($individual_file!=null){
                                                    echo $individual_file[0]->fixed_id. " || Created at: ".$individual_file[0]->created_at; 
                                                }
                                                else{

                                                }
                                            ?>
                </h1>
                <table border="1px solid red" id="example" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <tr>
                        <th>Work Id</th>
                        <th>File</th>
                        <th>Custom Quote</th>
                        <th>Additional Service</th>
                        <th>Delivery Time</th>
                        <th>Action</th>
                        <th>Price</th>
                        <th>G. Amount</th>
                    </tr>
                    <?php 
                        $total = 0; 
                        $file_id = 0;
                    ?>
                    <?php foreach($individual_file as $data): ?>
                        <tr>
                            <td><?=++$file_id?></td>
                            <td><a target="_blank" href="<?=base_url('front_assets/custom_quote/uploads/').$data->file?>"><?=$data->file?></a></td>
                            <td><?=$data->custom_quote_value?></td>
                            <td>
                                <?php foreach($additional_info as $add_data): ?>
                                    <?php 
                                        $arr = $add_data->custom_quote_info;
                                        $arr = json_decode( $arr );
                                        foreach($arr as $key => $value){
                                            $newD = json_decode($value);
                                            if(is_object($newD)){
                                                $serviceName = array_keys( (array)$newD );
                                                foreach ($serviceName as $name => $name_value) {
                                                    echo '<li>'.$name_value.'</li>';
                                                }
                                            }
                                        }
                                    ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php
                                    if($arr->d_charge === "0.00"){
                                        echo "Standard 72 Hours";
                                    }elseif($arr->d_charge === "0.20"){
                                        echo "Next Day 24 Hours";
                                    }elseif($arr->d_charge === "1.00"){
                                        echo "Same Day 5 Hours";
                                    }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <!-- <a href="<?=base_url('orders/upload_custom_order_file/').$data->fixed_id;?>"><i style="margin-right: 8px;" class="fa fa-upload"></i></a> -->
                                <a href="<?=base_url('front_assets/custom_quote/uploads/').$data->file?>" download><i class="fa fa-download"></i></a>
                            </td>
                            <td><?='€ '.$data->price;?></td>
                            <td>
                                <form action="<?=base_url('orders/give_amount/').$data->custom_quote_id?>" method="post">
                                    <input type="hidden" name="fixed_id" value="<?=$data->fixed_id?>">
                                    <input type="hidden" name="custom_quote_id" value="<?=$data->custom_quote_id?>">
                                    <input type="number" class="col-md-3" style="height: 25px" name="price" required="required">
                                    <input type="submit" value="Pricing">
                                </form>
                            </td>
                        </tr>
                        <?php
                         $total+=$data->price;
                         ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="4">Total:</td>
                        <td colspan="2"><?= '€ '.$total;?></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="4">22% Vat: </td>
                        <td colspan="2">
                            <?php
                            $vat = ($total/100)*22; 
                            echo '€ '.$vat;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="4"><span style="font-weight: 700">Grand Total: </span></td>
                        <td colspan="1">
                            <?php
                            $amount = $total+$vat;
                            echo '<span style="font-weight: 700">€ '.$amount.'</span>';
                            ?>
                        </td>
                    </tr>
                </table>    
                <div class="row">
                    <div class="text-center">
                       <?php if($individual_file!=null): ?>
                            <a href="<?=base_url('orders/upload_custom_order_file/').$individual_file[0]->fixed_id;?>" style="color: red;"><i style="margin-right: 8px; height: 30px" class="fa fa-upload"></i>Upload Files</a>
                        <?php endif; ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="text-center">
                        <?php if($individual_file!=null): ?> 
                            <form action="<?=base_url('orders/update_quote_status/').$individual_file[0]->fixed_id;?>" method="post">
                            <input type="hidden" name="custom_quote_id" value="<?php $individual_file[0]->fixed_id; ?>">
                            <input type="hidden" name="quote_status" value="Done">
                            <input type="submit" style="border-radius: 20px" class="btn btn-info" value="Done">    
                        </form>
                        <?php endif; ?>
                    </div>
                </div>  
                <!-- <div class="col-md-8">
                    <h1>Message: </h1><p><?=$data->custom_quote_value?></p>
                    <form method="post" action="<?=base_url('orders/give_amount/').$data->fixed_id?>">
                        <input type="hidden" name="fixed_id" value="<?=$data->fixed_id?>">
                        <input type="text" name="amount">
                        <input type="submit" value="Submit">
                    </form>
                </div> -->
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
