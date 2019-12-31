\<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<br>
    <?php if($this->session->flashdata('logged')): ?>
        <?php echo $this->session->flashdata('logged'); ?>
    <?php endif; ?>
<br>
    <style>
        input{
            padding: 10px;
        }
        input[type=text] {
            width: 200px;
            padding: 5px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        #autoSuggestionsList > li {
            background: none repeat scroll 0 0 #F3F3F3;
            border-bottom: 1px solid #E3E3E3;
            list-style: none outside none;
            padding: 3px 15px 3px 15px;
            text-align: left;
        }

        #autoSuggestionsList > li a { color: #800000; }

        .auto_list {
            border: 1px solid #E3E3E3;
            border-radius: 5px 5px 5px 5px;
            position: absolute;
        }
        tr.order_table td{
            color: #000;
            font-weight: bold;
        }
        .work{
            font-weight: bold;
            color: #000;
        }
        .pr_name{
            background-color: #fff;
            color: #ff0000;
            font-weight: bold;
        }
        .or_name{
            background-color: #fff;
            color: #ff0000;
            font-weight: bold;
        }
        .add_service{
            color: #000;
            background-color: #fff;
        }
        .s_total{
            color: #000;
            background-color: #fff;
        }
        .number{
            color: #000;
            background-color: #fff;
        }
        .total{
            color: #000;
            background-color: #fff;
        }
        .order-table-td{
            border: 1px solid black !important;
        }
    </style>

            <!-- Account Page Area -->
            <div class="account-page-area ptb-30">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard"
                                        role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                        role="tab" aria-controls="account-orders" aria-selected="false">Regular Orders</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="account-custom-orders-tab" data-toggle="tab" href="#account-custom-orders"
                                        role="tab" aria-controls="account-custom-orders" aria-selected="false">Custom Orders</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="account-free-orders-tab" data-toggle="tab" href="#account-free-orders"
                                        role="tab" aria-controls="account-free-orders" aria-selected="false">Free Orders</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="failed-orders-tab" data-toggle="tab" href="#failed_orders"
                                        role="tab" aria-controls="failed-orders" aria-selected="false">Failed Order</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice"
                                        role="tab" aria-controls="invoice" aria-selected="false">Invoice</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details"
                                        role="tab" aria-controls="account-details" aria-selected="false">Account
                                        Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="<?= base_url('auth/user_auth/logout'); ?>" role="tab"
                                        aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">

                                <!-- Dashboard Starts -->
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                    aria-labelledby="account-dashboard-tab">
                                    <div class="row text-center">
                                        <div class="col-md-4">
                                            <div class="alert alert-danger">
                                                Personal Code: 
                                                <br>
                                                <strong><?php echo $user_info->id; ?></strong>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="alert alert-danger">
                                                Customer Since: 
                                                <br>
                                                <strong>
                                                    <?php
                                                        $ordered_at = $user_info->created_at;
                                                        echo date('Y/m/d', strtotime($ordered_at));
                                                    ?>       
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="alert alert-danger">
                                                Last Order: 
                                                <br>
                                                <strong>12345</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="myaccount-dashboard">
                                        <p>Hello 
                                            <b><?php echo $this->session->userdata('name'); ?></b> 
                                            (not <?php echo $this->session->userdata('name'); ?>? <a href="<?= base_url('auth/user_auth/logout'); ?>">Sign
                                                out</a>)</p>
                                        <p>From your account dashboard you can view your recent orders, upload files and edit your account details.</p>
                                    </div>
                                </div>
                                <!-- Dashboard ends -->

                                <!-- Orders start -->
                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <!-- dataTables-example -->
                                            <table class="table table-bordered table-hover display" id="">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ORDER</th>
                                                        <th style="color: black;">DATE OF ORDER</th>
                                                        <th style="color: black;">PAYMENT STATUS</th>
                                                        <th style="color: black;">ORDER STATUS</th>
                                                        <th style="color: black;">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($results != null){ ?>
                                                    <?php
                                                        $c = 0; 
                                                        foreach($results as $row): 
                                                    ?>
                                                        
                                                    <tr>
                                                        <td class="show-div-by-a-<?= $row->order_id; ?>">
                                                            <a class="account-order-id" href="javascript:void(0)"><b style="color: red;"><?php echo $row->order_id; ?></b></a>
                                                            <input type="hidden" name="order_id" value="<?= $row->order_id; ?>">
                                                        </td>
                                                        <td><span style="color: black;">
                                                            <?php
                                                                $ordered_at = $row->created_at;
                                                                echo date('Y/m/d', strtotime($ordered_at));
                                                                ?>
                                                            </span></td>
                                                        <input type="hidden" name="user_id" value="<?= $row->user_id; ?>">
                                                        <td>
                                                            <span><?php if($row->payment_status == "1"){ ?>
                                                                <div class="bg-success text-white">Paid</div>
                                                                    <?php }else{ ?>
                                                                <div class="bg-primary text-white">Not Paid</div>
                                                                <?php } ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(!empty($row->order_status)):
                                                                    if($row->order_status == 'Uploaded'){
                                                                        ?>
                                                                        <div class="bg-success text-white">Uploaded</div>
                                                                        <?php
                                                                    }elseif ($row->order_status == 'Pending') {
                                                                        ?>
                                                                        <div class="bg-warning text-white">Pending</div>
                                                                        <?php
                                                                    }elseif ($row->order_status == 'Processing') {
                                                                        ?>
                                                                        <div class="bg-warning text-white">Processing</div>
                                                                        <?php
                                                                    }elseif ($row->order_status == 'On air'){
                                                                        ?>
                                                                        <div class="bg-warning text-white">On air</div>
                                                                        <?php
                                                                    }elseif ($row->order_status == 'Done'){
                                                                        ?>
                                                                        <div class="bg-primary text-white">Done</div>
                                                                        <?php
                                                                    }
                                                                endif;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($row->order_status)):

                                                                if($row->order_status == 'Done'): ?>
                                                                    <div>
                                                                        <a data-toggle="tooltip" data-placement="bottom" title="Download Your File" href="<?=base_url('frontend/your_file/').$row->order_id?>" class="btn btn-success"><i class="fa fa-download text-white"></i></a>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="text-white">
                                                                        <a data-toggle="tooltip" data-placement="bottom" title="Please" href="javascript:void(0)" class="btn btn-dark"><i class="fa fa-hourglass" aria-hidden="true"></i></a>
                                                                    </div>
                                                                <?php endif;
                                                            endif; 
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                    

                                                    <tr style="display: none; background-color: #f1f1f1" class="show-div-<?= $row->order_id; ?>" id="show-div-by-a-<?= $row->order_id; ?>">
                                                        <td colspan="7">
                                                            <div class="container show-div-<?= $row->order_id; ?>" style="text-align: left;">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h3 style="margin: 0 0 15px;">CONTACT INFO</h3>
                                                                        <p style="margin: 0;"><strong>Name:</strong> <?= $user_info->d_name; ?></p>
                                                                        <p style="margin: 0;"><strong>Telephone:</strong> <?=$user_info->telephone?></p>
                                                                        <p style="margin: 0;"><strong>Email:</strong> <?=$user_info->email?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a href="<?php echo base_url('frontend/order_detail/').$row->order_id ?>"><h3 style="margin: 15px 0 0; color:red">ORDER DETAIL<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h3></a>
                                                                        <table class="table table-bordered" style="background-color: #f1f1f1;">
                                                                            <tr class="order_table">
                                                                                <td class="order-table-td">Work</td>
                                                                                <td class="order-table-td">Product Name</td>
                                                                                <td class="order-table-td">Job Name</td>
                                                                                <td class="order-table-td">ADD. Services</td>
                                                                                <!-- <td>Quantity</td> -->
                                                                                <!-- <td>Order Status</td> -->
                                                                                <td class="order-table-td">Unit Price</td>
                                                                                <td class="order-table-td">Quantity</td>
                                                                                <td class="order-table-td">Total</td>
                                                                                <td class="order-table-td">Action</td>
                                                                            </tr>
                                                                            <?php
                                                                            $arr = $row->order_info;
                                                                            $arr = json_decode( $arr );
                                                                            $c = 1;
                                                                            foreach ($arr as $key => $value): ?>
                                                                            
                                                                                <tr>
                                                                                    <td class="work order-table-td"><?='0'.$c++?></td>
                                                                                    <td class="pr_name order-table-td"><?=$value->product_name?></td>
                                                                                    <td class="or_name order-table-td"><?=$value->order_name?></td>
                                                                                    <td class="add_service order-table-td">
                                                                                        <?php 
                                                                                            $data = json_decode($value->additional_service); 

                                                                                            // $value->additional_service
                                                                                            // echo $data;
                                                                                            $newD = json_decode($data);
                                                                                            if(is_object($newD)){
                                                                                                $serviceName = array_keys( (array)$newD );
                                                                                                foreach ($serviceName as $name => $name_value) {
                                                                                                    echo '<li>'.$name_value.'</li>';
                                                                                                }
                                                                                            }
                                                                                        ?>

                                                                                    </td>
                                                                                    <td class="s_total order-table-td">
                                                                                        <?php
                                                                                            $total = (float)$value->sub_total;
                                                                                            $number = (float)$value->number;
                                                                                            $unit_price = $total/$number;
                                                                                            $final_unit_price = round($unit_price, 2);
                                                                                            echo '€ '.str_replace('.',',',$final_unit_price); 
                                                                                        ?>
                                                                                    </td>
                                                                                    <td class="number order-table-td"><?=$value->number?></td>
                                                                                    <td class="total order-table-td"><?= '€ '.str_replace('.', ',', $value->sub_total)?></td>
                                                                                    <!-- <td><?=$value->order_status?></td> -->
                                                                                    <!-- <td><?=$value->sub_total?></td> -->
                                                                                    <td class="order-table-td">
                                                                                        <form method="post" action="<?= base_url('frontend/add_order/').$row->order_id.'/'.$value->product_id; ?>">
                                                                                            <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Upload Files"><i class="fa fa-upload"></i></button>
                                                                                            <a data-toggle="tooltip" data-placement="bottom" title="View upload area" href="<?= base_url('frontend/show_file/').$row->order_id.'/'.$value->product_id; ?>" class="btn btn-warning"><i class="fa fa-eye text-white"></i></a>
                                                                                        </form>  
                                                                                    </td>
                                                                                </tr>
    
                                                                            <?php endforeach; ?>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                             
                                                    <?php endforeach; ?>
                                                <?php } else{ ?>
                                                    <tr>
                                                        <td>No Data Found</td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Orders end -->

                                <!-- Custom Orders start -->
                                <div class="tab-pane fade" id="account-custom-orders" role="tabpanel" aria-labelledby="account-custom-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover display" id="table_custom">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ORDER</th>
                                                        <th style="color: black;">DATE OF ORDER</th>
                                                        <th style="color: black;">QUOTE STATUS</th>
                                                        <th style="color: black;">PAYMENT STATUS</th>
                                                        <th style="color: black;">ORDER STATUS</th>
                                                        <th style="color: black;">Your File</th>
                                                        <th style="color: black;">Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($custom_quote as $custom_order): ?>
                                                        <tr id="<?=$custom_order->custom_quote_id;?>">
                                                            <td class="show-div-by-a-1 ?>">
                                                                <a class="account-order-id" target="_blank" href="<?=base_url('frontend/your_custom_order/').$custom_order->custom_quote_id;?>"><b style="color: red;"><?=$custom_order->custom_quote_id?></b></a>
                                                                <!-- <input type="hidden" name="order_id" value="<?= $row->order_id; ?>"> -->
                                                            </td>
                                                            <td><span style="color: black;">
                                                                <?php echo $custom_order->created_at;?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <?php if($custom_order->quote_status !=null): ?>
                                                                    <?php if($custom_order->quote_status === 'Processing'): ?>
                                                                        <div class="bg-danger text-white">
                                                                            <?=$custom_order->quote_status?>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="bg-success text-white">
                                                                            <?=$custom_order->quote_status?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?= "----" ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <!-- <input type="hidden" name="user_id" value=""> -->
                                                            <td>
                                                                <span>
                                                                    <?php if($custom_order->payment_status === "Paid"): ?>
                                                                        <div class="bg-success text-white"><?=$custom_order->payment_status?></div>
                                                                    <?php else: ?>
                                                                        <div class="bg-danger text-white"><?=$custom_order->payment_status?></div>
                                                                    <?php endif ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="">
                                                                    <?php if($custom_order->order_status != null): ?>
                                                                        <?php if($custom_order->order_status === 'Done'): ?>
                                                                            <div class="bg-success text-white">
                                                                                <?=$custom_order->order_status?>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="bg-danger text-white">
                                                                                <?=$custom_order->order_status?>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php echo "----"; ?>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a target="_blank" href="<?=base_url('frontend/your_custom_order/').$custom_order->custom_quote_id;?>"><span><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                                <!-- <?php if($custom_order->order_status === 'Pending' || $custom_order->payment_status === 'Done'): ?>
                                                                    <a href="#">Please Wait</a>
                                                                <?php else: ?>
                                                                    <a href="<?=base_url('frontend/custom_quote_payment/').$custom_order->custom_quote_id.'/'.$custom_order->amount?>"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                    <a href="<?=base_url('frontend/delete_custom_order/').$custom_order->custom_quote_id?>" class="d_custom_order"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                <?php endif; ?> -->
                                                            </td>
                                                            <td>
                                                                <?php if($custom_order->order_status === 'Done'): ?>
                                                                    <a href="<?=base_url('frontend/your_custom_order_file/').$custom_order->custom_quote_id?>"><i class="fa fa-download"></i></a>
                                                                <?php else: ?>
                                                                    <span>Later</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Custom Orders end -->

                                <!-- Free Orders Start -->
                                <div class="tab-pane fade" id="account-free-orders" role="tabpanel" aria-labelledby="account-free-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">Free ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover display" id="free_order_table">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ORDER</th>
                                                        <th style="color: black;">DATE OF ORDER</th>
                                                        <!-- <th style="color: black;">PAYMENT STATUS</th> -->
                                                        <th style="color: black;">ORDER STATUS</th>
                                                        <th style="color: black;">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($free_order as $try_free): ?>
                                                        <tr>
                                                            <td><?=$try_free->try_it_free_id?></td>
                                                            <td><?=$try_free->updated_at?></td>
                                                            <td><?=$try_free->status?></td>
                                                            <td>
                                                                <?php if($try_free->status === "Done"): ?>
                                                                    <a data-toggle="tooltip" data-placement="bottom" title="Download Your Free File" href="<?=base_url('frontend/free_file/').$try_free->try_it_free_id?>" class="btn btn-success"><i class="fa fa-download text-white"></i></a>
                                                                <?php else: ?>
                                                                    <a data-toggle="tooltip" data-placement="bottom" title="Download Your File" href="" class="btn btn-info"><span class="text-white">Soon</span></a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Free Orders End -->

                                <!-- Failed Orders Start-->
                                <div class="tab-pane fade" id="failed_orders" role="tabpanel" aria-labelledby="failed-orders-tab">
                                    <div class="failed-orders-details">
                                        <h3>Here user can complain against any order id.</h3>
                                    </div>
                                    <div class="search option">
                                        <div class="something">
                                            <form id="failedOrder">
                                                <input type="text" placeholder="Your Order Number" name="search_data" id="search_data" >
                                                <button type="submit" class="btn btn-success" id="search_button">Search</button>
                                            </form>
                                            <div id="suggestions">
                                                <div id="autoSuggestionsList"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Failed Orders End -->

                                <!-- Invoice starts -->
                                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY INVOICE</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover display" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ORDER NO</th>
                                                        <th style="color: black;">Invoice No</th>
                                                        <th style="color: black;">DATE OF Issue</th>
                                                        <th style="color: black;">PDF</th>
                                                    </tr>
                                                </thead>
                                                    <?php if($results != null){ ?>
                                                    <?php
                                                        foreach($paid_data as $row): 
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td class="show-div-by-a-<?= $row->order_id; ?>">
                                                                <a class="account-order-id" href="javascript:void(0)"><b style="color: red;"><?php echo $row->order_id; ?></b></a>
                                                            </td>
                                                            <td>Hello</td>
                                                            <td>
                                                                <span style="color: black;">
                                                                <?php
                                                                    $ordered_at = $row->created_at;
                                                                    echo date('Y/m/d', strtotime($ordered_at));
                                                                    ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <a data-toggle="tooltip" download data-placement="bottom" title="Download Invoice" href="<?=base_url('frontend/invoice/').$row->order_id;?>" class="btn btn-light">
                                                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </td    >
                                                        </tr>
                                                    </tbody>

                                                    
                                             
                                                    <?php endforeach; ?>
                                                <?php } else{ ?>
                                                    <tr>
                                                        <td>No Data Found</td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice ends -->
                                
                                <!-- Update Profile Starts -->
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form method="post" action="<?php echo base_url('frontend/update_profile'); ?>" class="ho-form">
                                            <input type="hidden" name="id" value="<?= $user_info->id; ?>">
                                            <div class="ho-form-inner">

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname" class="u_p_lbl">Account Type: </label>
                                                    <option>
                                                        <select><?php echo $user_info->typeRadio; ?></select>
                                                    </option>
                                                    <input type="hidden" name="typeRadio" value="<?= $user_info->typeRadio; ?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-name" class="u_p_lbl">Name<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_name" value="<?php echo $user_info->d_name; ?>" id="account-details-name">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-surname" class="u_p_lbl">Surname<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_surname" value="<?php echo $user_info->d_surname ?>" id="account-details-surname">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-email" class="u_p_lbl">Email<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="email" value="<?php echo $user_info->email; ?>" id="account-details-email">
                                                </div>

                                                <div class="single-input">
                                                    <label for="account-details-address" class="u_p_lbl">Address<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_address" value="<?php echo $user_info->d_address ?>" id="account-details-address">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-city" class="u_p_lbl">City<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_city" value="<?php echo $user_info->d_city; ?>" id="account-details-city">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-zip" class="u_p_lbl">Zip<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_zip" value="<?php echo $user_info->d_zip; ?>" id="account-details-zip">
                                                </div>

                                                <div class="single-input">
                                                    <label for="account-details-country" class="u_p_lbl">Country<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_country" value="<?php echo $user_info->d_country; ?>" id="account-details-country">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-telephone" class="u_p_lbl">Telephone<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="telephone" value="<?php echo $user_info->telephone; ?>" id="account-details-telephone">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-fax" class="u_p_lbl">Fax</label>
                                                    <input type="text" class="u_p_input" name="fax" value="<?php echo $user_info->fax; ?>" id="account-details-fax">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-province" class="u_p_lbl">Province</label>
                                                    <input type="text" class="u_p_input" name="province" value="<?php echo $user_info->province; ?>" id="account-details-province">
                                                </div>

                                                <?php if($user_info->typeRadio != "private"): ?>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-c_name" class="u_p_lbl">Company Name<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="c_name" value="<?php echo $user_info->c_name; ?>" id="account-details-c_name">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-d_vat" class="u_p_lbl">Vat<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="d_vat" value="<?php echo $user_info->d_vat; ?>" id="account-details-d_vat">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-pec" class="u_p_lbl">PEC<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="pec" value="<?php echo $user_info->pec; ?>" id="account-details-pec">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-sdi" class="u_p_lbl">SDI<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="sdi" value="<?php echo $user_info->sdi; ?>" id="account-details-sdi">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-fiscal" class="u_p_lbl">FISCAL<span class="u_p_asterisk">*</span></label>
                                                    <input type="text" class="u_p_input" name="fiscal" value="<?php echo $user_info->fiscal; ?>" id="account-details-fiscal">
                                                </div>

                                                <?php endif; ?>
  
                                                <div class="single-input u_p_btn_div">
                                                    <button class="ho-button ho-button-dark u_p_btn" type="submit"><span>UPDATE</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Update Profile Ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Account Page Area -->



<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>
