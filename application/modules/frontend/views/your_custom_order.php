
<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<!-- Account Page Area -->
<div class="account-page-area ptb-30">
  <div class="container">
    <div class="row">

      <div class="col-md-12" id="my-tab">
          <h1>Your Files</h1>
          <table style="width: 100%">
              <tr>
                  <!-- <th class="text-center">Cus. Quo. Id</th> -->
                  <th class="text-center">Work Id</th>
                  <th class="text-center">Order Id</th>
                  <th class="text-center">File</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Action</th>
              </tr>
              <?php 
                $total = 0;
                $work_id = 0;
              ?>
              <?php foreach($files as $data): ?>
              <tr>
                  <td class="text-center"><?=++$work_id;?></td>
                  <td class="text-center"><?=$data->fixed_id?></td>
                  <td class="text-center"><?=$data->file?></td>
                  <td class="text-center">
                    <?php if($data->price != null){
                        echo "€ ".str_replace('.',',',$data->price);
                    }else{
                        echo "Price is generating";
                    } ?>
                  </td>
                  <td class="text-center"><a href="<?=base_url('front_assets/custom_quote/uploads/').$data->file?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  <td class="text-center"><a href="<?=base_url('frontend/delete_custom_file/').$data->custom_quote_id.'/'.$data->fixed_id?>" onclick="return confirm('Do you really want to remove this file?')"><i class="fa fa-remove" aria-hidden="true"></i></a></td>
              </tr>
              <?php 
                  $total += $data->price;
              ?>
              <?php endforeach; ?>
              </table>

              <?php foreach($custom_quote as $quote): ?>
              <?php if($quote->payment_status === "paid" || $quote->payment_method === "bank"): ?>
                  
              <?php else: ?>
                <div class="col-md-3 offset-md-7 pull-right text-right">
                    <h3>Total: <?php echo '€ '.str_replace('.', ',', $total); ?></h3>
                <h3>22% Vat: 
                <?php 
                  $vat = ($total/100)*22;
                  echo '€ '.str_replace('.',',',$vat); 
                ?>
                </h3>
                <h3>Grand Total: 
                <?php
                   $amount = $total+$vat;
                   echo '€ '.str_replace('.', ',', $amount); 
                ?>
                </h3>
                  <?php if($quote->quote_status === 'Done' && $quote->payment_status === 'Unpaid'): ?>
                      <form method="post" action="<?=base_url('frontend/custom_quote_payment')?>">
                        <!-- <h2 class="text-center"><a href="<?=base_url('frontend/custom_quote_payment/').$custom_order->fixed_id.'/'.$amount?>" style="border-radius: 20px" class="btn btn-danger">Pay € <?=$amount?></a></h2> -->
                        <input type="hidden" name="fixed_id" value="<?=$data->fixed_id?>">
                        <input type="hidden" name="amount" value="<?=$amount?>">
                        <input type="submit" style="border-radius: 20px" class="btn btn-danger" value="Accept Quotation & Pay € <?=str_replace('.', ',', $amount)?>">
                      </form>
                      <?php else: ?>
                        <h3 style="color: red;">After getting the mail you can payment through paypal or bank! Thanks</h3>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
          
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
