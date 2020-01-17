<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<br>
<?php if($this->session->flashdata('please_log')): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    
                        <?php echo $this->session->flashdata('please_log'); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<br>
        <!-- Horizontal Steppers -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="md-stepper-horizontal orange">
                        <div class="md-step active step-cart">
                            <div class="md-step-circle"></div>
                            <div class="md-step-title">Basket</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div class="md-step step-clipboard">
                            <div class="md-step-circle"></div>
                            <div class="md-step-title">Data Summery</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div class="md-step step-file">
                            <div class="md-step-circle"></div>
                            <div class="md-step-title">Order successfully sent</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Horizontal Steppers Ends-->
        <style type="text/css">
            .top-table tr td, 
            .top-table tr th{
                border: 2px solid black !important;
            }
           .ulStyle{
                list-style-type:none;
                color:black;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-page-area ptb-30 bg-white">
                        <div class="container">
                            <form method="post" action="<?= base_url('frontend/checkout'); ?>">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed table-hover tbl-cart top-table">
                                        <thead>
                                            <tr>
                                                <th class="cart-column-image" scope="col">work</th>
                                                <th class="cart-column-image" scope="col">IMAGE</th>
                                                <th class="cart-column-image" scope="col">Product Name</th>
                                                <th class="cart-column-productname" scope="col">Job Name</th>
                                                <th class="cart-column-service" scope="col">Add. Services</th>
                                                <th class="cart-column-price" scope="col">UNIT PRICE</th>
                                                <th class="cart-column-quantity" scope="col">Number</th>
                                                <th class="cart-column-total" scope="col">TOTAL</th>
                                                <th class="cart-column-remove" scope="col">REMOVE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $c = 0;?>
                                            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){   
                                                // var_dump($item);
                                             ?>
                                                    <tr>
                                                        <input type="hidden" name="id[]" value="<?= $item['id']; ?>">
                                                        <input type="hidden" name="product_id[]" value="<?= $item['product_id']; ?>">
                                                        <td><?=++$c?></td>
                                                        <td>
                                                            <a href="javascript:void()" class="product-image">
                                                                <img src="<?= base_url($item["image"]); ?>" alt="product image">
                                                                <input type="hidden" name="image[]" value="<?= base_url($item["image"]) ?>">
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void()" class="product-title">
                                                                <?php echo $item["product_name"]; ?>
                                                            </a>
                                                            <input type="hidden" name="product_name[]" value="<?php echo $item['product_name']; ?>">
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void()" class="product-title"><?php echo $item["name"]; ?></a>
                                                            <input type="hidden" name="order_name[]" value="<?php echo $item['name']; ?>">
                                                        </td>

                                                        <td>
                                                            <ul style="text-align: left;">
                                                            <?php 
                                                            $deta = json_decode($item['additional_service']);

                                                            
                                                            if (is_object($deta)) {
                                                                $serviceName = array_keys( (array)$deta );
                                                                foreach ($serviceName as $key => $value) {
                                                                    echo '<li>'.$value.'</li>';
                                                                    if ($value=='Shadow/Reflect')
                                                                    {
                                                                        echo "<div><ul ​class='ulStyle'";
                                                                       
                                                                       echo '<li><span>'.$deta->{'Shadow/Reflect'}->{'Option'}.'</span></li>';
                                                                       echo "</ul></div>";
                                                                    }
                                                                    if ($value=='Crop Image')
                                                                    { 
                                                                        echo "<div><ul class='ulStyle'>";
                                                                        echo '<li><span>'.$deta->{'Crop Image'}->{'Size'}.'</span></li>';
                                                                        echo'<li><span>'.$deta->{'Crop Image'}->{'Res'}.'</span></li>';
                                                                        echo "</ul></div>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            </ul>
                                                            <?php 
                                                                $as = json_encode($item['additional_service']);
                                                            ?>
                                                            <input type='hidden' name='additional_service[]' value='<?php echo $as ?>'> 
                                                        </td>                                                        
                                                        
                                                        <td>
                                                            <?php 
                                                                $total = $item['subtotal'];
                                                                $number = $item['number'];

                                                                $unit_price = $total / $number; 
                                                            ?>
                                                            <span class="total-price"><?php echo '€'.str_replace('.', ',', $unit_price); ?></span>
                                                        </td>
                                                        
                                                        <td>
                                                            <?=$item['number'];?>
                                                            <input type="hidden" name="number[]" value="<?= $item['number']; ?>">
                                                        </td>

                                                        <td><?php echo '€'.str_replace('.', ',', $item["price"]); ?></td>
                                                        <input type="hidden" name="sub_total[]" value="<?= $item['subtotal']; ?>">

                                                        <input type="hidden" name="qty[]" value="<?= $item['qty']; ?>">
                                                        <input type="hidden" name="vat[]" value="<?= $item['vat']; ?>">
                                                        <input type="hidden" name="totalphotoamount[]" value="<?= $item['totalphotoamount']; ?>">
                                                        <input type="hidden" name="delivery_price[]" value="<?= $item['delivery_price']; ?>">


                                                        <td>
                                                            <a class="" href="<?php echo base_url('frontend/removeItem/'.$item["rowid"]); ?>" onclick="return confirm('Are you sure?')" class="remove-product"><i class="fa fa-trash text-danger"></i></a>
                                                        </td>

                                                    </tr>
                                            <?php } }else{ ?>
                                            <tr><td colspan="9"><p>Your cart is empty.....</p></td>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-content">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="cart-content-left">
                                                <div class="cart-content-coupon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="cart-content-right">
                                                <table class="table table-condensed cart-table">
                                                    <tbody>
                                                        <?php if($this->cart->total_items() > 0){ ?>

                                                            <?php 
                                                                $totalphotoamount = 0;
                                                                $additional_service_value = 0;
                                                                $delivery_price = 0;
                                                                $net_price = 0;
                                                                $vat = 0;
                                                            ?>

                                                            <?php foreach($cartItems as $item){ 

                                                                $totalphotoamount += $item['totalphotoamount'];
                                                                $additional_service_value += $item['additional_service_value'];
                                                                $delivery_price += $item['delivery_price'];
                                                                $net_price = $totalphotoamount + $additional_service_value + $delivery_price;
                                                                $vat += $item['vat'];

                                                            }   ?>

                                                        <tr>
                                                            <td></td>
                                                            <td><h5 style="margin: 0">CART TOTALS</h5></td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-left">Total clipping path</th>
                                                            <td class="text-right"><b><?='€'.str_replace('.', ',', $totalphotoamount)?></b></td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-left">Total additional services</th>
                                                            <td class="text-right"><b><?='€'.str_replace('.', ',', $additional_service_value)?></b></td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-left">Total delivery price</th>
                                                            <td class="text-right"><b><?='€'.str_replace('.', ',', $delivery_price)?></b></td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-left">Net Price</th>
                                                            <td class="text-right"><b><?='€'.str_replace('.',',',$net_price)?></b></td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-left">VAT 22%</th>
                                                            <td class="text-right"><b><?='€'.str_replace('.',',',$vat)?></b></td>
                                                        </tr>
                                                        <tr class="cart-total">
                                                            <th class="text-left">TOTAL ORDER VAT INCLUDED</th>
                                                            <td class="text-right"><?php echo '€'.str_replace('.', ',', $this->cart->total()); ?></td>
                                                            <input type="hidden" name="total" value="<?= $this->cart->total(); ?>">
                                                        </tr>
                                                        <?php }else{ ?>
                                                        <tr class="text-right">
                                                            <th>Total</th>
                                                            <th>0</th>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pull-right">
                                                <a href="<?php echo base_url('frontend/'); ?>" class="btn btn-xs">
                                                    <span>Continue Shopping</span>
                                                </a>
                                                <?php if($this->cart->total_items() > 0): ?>
                                                    <button type="submit" class="bttn ho-button">
                                                        Proceed to Checkout
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--// Cart Content -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>

<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('frontend/updateItemQty/'); ?>", {rowid:rowid, number:obj.value}, function(resp){
        console.log(number);
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
