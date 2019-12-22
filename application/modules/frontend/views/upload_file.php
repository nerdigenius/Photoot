
<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>
<style>
  body {
    padding-top: 60px;
  }
  @media (max-width: 767px) {
      .description {
          display: none;
      }
  }
  .show{
      opacity: 1;
  }

  label
  {
      padding: 10px;
      background: red; 
      display: table;
      color: #fff;
  }
  input[type="file"] 
  {
      display: none;
  }
  span
  {
      color:red;
      cursor:pointer;
  }



</style>

<!-- Account Page Area -->
<div class="account-page-area ptb-30">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
          <div class="head-div">
              <div class="row">
                  <div class="col-md-3">
                      <?php $order_id = $this->uri->segment(3); ?>
                      Order No: <?=$order_id?>
                  </div>
                  <?php foreach($order_info as $info){
                      $order = $info->order_info;
                      $data  = json_decode($order); ?>
                  <!-- <div class="col-md-3">
                      <?php echo $data[0]->product_name; ?>
                  </div> -->
                  <div class="col-md-3">
                      Order Date: <?=$info->updated_on?>
                  </div>
                  <?php } ?>
              </div>
          </div>
      </div>

      <div class="col-3">
          <h2>Select the works</h2>
          <div class="list-group" id="list-tab" role="tablist">
              <?php foreach($order_info as $info):  ?>
              <?php 
                  $order = $info->order_info;
                  $data = json_decode( $order ); 
              ?>
              <?php $c=0; ?>
              <?php foreach($data as $key => $value): ?>
                <?php
                $p_id_f_url = $this->uri->segment(4);
                $p_id = $value->product_id;
                ?>
                <?php if($p_id_f_url === $p_id): ?>
                <a id="<?=$value->product_id?>" class="list-group-item list-group-item-action bc_change active" href="<?=base_url('frontend/add_order/').$info->order_id.'/'.$value->product_id;?>">Work- <?=++$c; ?></a>
                <?php else: ?>
                <a id="<?=$value->product_id?>" class="list-group-item list-group-item-action bc_change" href="<?=base_url('frontend/add_order/').$info->order_id.'/'.$value->product_id;?>">Work- <?=++$c; ?></a>
                <?php endif; ?>
            <?php endforeach; ?>    
            <?php endforeach; ?>                                       
          </div>
          
      </div>  

      


      <div class="col-9">
          <div class="bottom-div">
              <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span class="move"><i class="fa fa-upload" aria-hidden="true"></i></span>Upload Image</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="move"><i class="fa fa-dropbox" aria-hidden="true"></i></span>Dropbox Upload</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="move"><i class="fa fa-exchange" aria-hidden="true"></i></span>FTP</a>
                      <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false"><span class="move"><i class="fa fa-server" aria-hidden="true"></i></span>Upload Summary</a>
                  </div>
              </nav>
              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      
                      <form name="form_id" id="form_id" action="javascript:void(0);" enctype="multipart/form-data">

                          <?php $order_id = $this->uri->segment(3); ?>  
                          <?php $product_id = $this->uri->segment(4); ?>  
                          
                          <input type="hidden" name="user_id" value="<?=$info->user_id?>">
                          <input type="hidden" name="order_id" value="<?=$order_id?>">
                          <input type="hidden" name="product_id" value="<?=$product_id?>">
                          <!-- <input type="text" name="order_id" value="<?=$info->order_id?>">
                          <input type="text" name="product_id" value="<?=$value->product_id?>"> -->

                          <div style="margin-bottom: 8px;">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h1>Select multiple images</h1>
                                  </div>
                                  <div class="col-md-12">
                                      <p>You can upload images in the following formats(psd, png, eps, jpg). </p>
                                      <p>The recommended size should not exceed(for this mode upload) the 100Mb per image.</p>
                                      <p>Use the tab <span>Dropbox upload</span> to upload large images</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3">
                                      <label style="width: 100%; text-align: center"><i class="fa fa-plus top-btn" aria-hidden="true"></i>Add File<input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files" multiple="multiple"/></label>
                                  </div>
                                  <div class="col-md-3">
                                      
                                  </div>
                              </div>
                          </div>      

                          <div style="margin-bottom: 8px;">
                              <!-- <input style="padding: 7px; width: 140px; margin: 13px 0px" type="submit" value="Upload" /> -->
                          </div>

                          <table class="table table-striped table-bordered" id="add_files">
                              <thead>
                                  <tr>
                                      <th style="color:blue; text-align:center;">File Name</th>
                                      <th style="color:blue; text-align:center;">Status</th>
                                      <th style="color:blue; text-align:center;">File Size</th>
                                      <th style="color:blue; text-align:center;">Action</th>
                                  <tr>
                                </thead>
                                <tbody>

                                </tbody>
                          </table>
                          <!-- The table listing the files available for upload/download -->
                          <table role="presentation" class="table table-striped">
                              <tbody class="files"></tbody>
                          </table>
                          <button style="height: 83%; width: 100%; background-color: red; color: white" type="submit" class="btn">Confirm Upload<i class="fa fa-arrow-circle-right bottom-btn" aria-hidden="true"></i></button>
                      </form>

                  </div>

                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="text-center">
                          <p>Enter Your Dropbox URL:</p>
                          <input type="text" name="url" placeholder="Your Dropbox URL" class="dropbox-url">
                      </div>
                  </div>

                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div class="text-center">
                          <p class="text-dark">This section will coming soon!</p>
                      </div>
                  </div>

                  <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      <div class="text-center">
                          <p class="text-dark">This section will coming soon!</p>
                      </div>
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
  .move{
      margin-right: 6px;
  }
  .bc_change{
      background-color: #F9DBCB;
      /*color: #fff;*/
      font-size: 14px;
      color: #000;
      font-weight: 700;
      font-size: 18px;
  }
  .list-group-item{
      background-color: #F9DBCB;
  }
  .list-group-item.active{
      background-color: #E44C28;
      border-color: #fff;
  }
  .list-group-item.active {
    z-index: 2;
    color: #000;
    /* background-color: #007bff; */
    /* border-color: #007bff; */
}
  .top-btn{
      margin-right: 3px;
  }
  .bottom-btn{
      margin-left: 3px;
  }
  .head-div{
      height: 40px;
      line-height: 40px;
      text-align: center;
      background-color: #D9EDF4;
  }
</style>