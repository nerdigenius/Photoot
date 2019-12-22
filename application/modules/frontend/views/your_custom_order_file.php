
<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<!-- Account Page Area -->
<div class="account-page-area ptb-30">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
          <h1>Your Files</h1>
          <table style="width: 100%">
              <tr>
                  <th class="text-center">Fixed Id</th>
                  <!-- <th class="text-center">Product Id</th> -->
                  <th class="text-center">File</th>
                  <th class="text-center">Action</th>
              </tr>
              <?php foreach($file as $data): ?>
              <tr>
                  <td class="text-center"><?=$data->fixed_id?></td>
                  <!-- <td class="text-center"><?=$data->product_id?></td> -->
                  <td class="text-center"><a href="<?=base_url('front_assets/custom_quote/upload_by_admin/').$data->file?>"><?=$data->file?></a></td>
                  <td class="text-center"><a download href="<?=base_url('front_assets/custom_quote/upload_by_admin/').$data->file?>"><i class="fa fa-download" aria-hidden="true"></i></a></td>
              </tr>
              <?php endforeach; ?>
          </table>
          
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
