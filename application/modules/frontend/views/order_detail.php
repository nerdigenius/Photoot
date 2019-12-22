
<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<!-- Account Page Area -->
<div class="account-page-area ptb-30">
  <div class="container">
    <div class="row">

      <div class="col-md-10" id="">
          
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <?php foreach($order_detail as $details): ?>

                          <!-- <?php var_dump($details); ?> -->
                          <h2>Your order id is: <?= $details->order_id; ?></h2>
                          <h2>
                              Payment Status:
                              <?php if($details->payment_status === "0"): ?>
                                  <?php echo "Paid"; ?>
                              <?php else: ?>
                                  <?php echo "Unpaid"; ?>
                              <?php endif; ?> 
                          </h2>
                          <h2>Payment Method: <?=$details->payment_method;?></h2>
                          <h2>Order Status: <?=$details->order_status;?></h2>

                          <h2>Your Order Has Been Created At: <?=$details->created_at;?></h2>

                          <h1>Order Details: </h1>
                          <?php 
                              $order_info = json_decode($details->order_info);
                              foreach($order_info as $key => $value){ 
                            ?>
                            <div class="product">
                                <h2>Product Name: <?=$value->product_name?></h2>
                                <h2>Order Name: <?=$value->order_name?></h2>
                                <h2>Number Of Item: <?=$value->number?></h2>
                                <h2>VAT: <?=$value->vat?></h2>
                                <h2>Delivery Price: <?=$value->delivery_price?></h2>
                                <h2>Total Photo Amount: <?=$value->totalphotoamount?></h2>
                                <!-- <h2>Order Status: <?=$value->order_status?></h2> -->
                                <h1>
                                    Additional Service: 
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
                                </h1>
                                <h2>Additional Service Value: <?=$value->additional_service_value?></h2>
                            </div>
                            <br>

                          <?php } ?>

                      <?php endforeach; ?>
                  </div>
              </div>
          </div>
          
      </div>  

      

     


    </div>
  </div>
</div>
      <!--// Account Page Area -->


 


</div>
</div>
</div>          
<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>


<style>
    .product{
        background-color: red;
    }
</style>