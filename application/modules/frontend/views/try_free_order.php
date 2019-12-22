<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<div class="banners-area bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include('sidemenu.php'); ?>
            </div>
            <div class="col-lg-9">
                <?php include 'try_free.php';?>
              
                
                <div class="tab-pane fade show active">

                   <div class="bs-example nopadding">
                  <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Services</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('frontend/try_it_free'); ?>"><?php echo "Try It Free" ?></a></li>
                        </ol>
                  </nav>
              </div>

                  
                  <form method="post" action="" id="try_it_free_form">
                      <div class="top-div">
                          <div class="card">
                              <div class="card-header jobTitle">
                                  Job Details
                              </div>
                              <div class="card-body">
                                  <div class="row d-flex align-items-center mb-1">
                                      <div class="col-md-6">
                                          <label class="text-dark">Number of copies</label>
                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Number of copies want to process.">
                                              <i class="fa fa-info-circle size"></i>
                                          </span>
                                      </div>
                                      <div class="col-md-5 offset-md-1">
                                            <input type="text" min="1" name="amnt" class="form-control form-control-sm amnt" value="1" readonly="readonly">
                                      </div>
                                  </div>
                                  <div class="row d-flex align-items-center">
                                      <div class="col-md-6">
                                          <label class="text-dark">Name this job</label>
                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Name of file associated with this item"><i class="fa fa-info-circle size"></i></span>
                                      </div>
                                      <div class="col-md-5 offset-md-1">
                                          <input class="form-control form-control-sm j_name" name="j_name" placeholder="e.g. Job#01" required>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      
                      </div>
                      <div class="button-claim text-right">
                          <button type="button" id="try-claim-button" class="btn btn-danger claim-button">Claim Your Free Id</button>
                      </div>
                  </form>
                  
                  <form name="try_it_free_id" id="try_it_free_id" action="javascript:void(0);" enctype="multipart/form-data">
                      <div class="try-bottom-data">
                        <div class="alert alert-success" role="alert">
                                      Your Free Order Has Placed Successfully.
                                      </div>
                                    <p class="text-success">Free Order Id: <input style="width:10%" type="button" class="btton btn btn-danger" id="free_q_id" name="free_q_id" value=""></p>
                          <div class="bottom-div">
                              <div class="card">

                                <div class="card-header jobTitle">
                                    
                                    
                                    <p class="text-success">Upload Your Files</p>
                                </div>
                              </div>
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
                                      
                                      <div style="width: 75%; margin-bottom: 8px;">
                                          <div class="row">
                                            <div class="col-md-12">
                                                <h1>Select Only 1 Photo</h1>
                                            </div>
                                            <div class="col-md-12">
                                                <p>You can upload images in the following formats(psd, png, eps, jpg). </p>
                                                <p>The recommended size should not exceed(for this mode upload) the 100Mb per image.</p>
                                                <p>Use the tab <span>Dropbox upload</span> to upload large images</p>
                                            </div>
                                        </div>
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label class="input-label" style="width: 100%; text-align: center"><i class="fa fa-plus" aria-hidden="true"></i>Add File<input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files"/></label>
                                              </div>
                                              <div class="col-md-3">
                                                  <!-- <button style="height: 83%; width: 100%;" type="submit" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i>Upload All</button> -->
                                              </div>
                                          </div>
                                      </div>

                                      <div style="margin-bottom: 8px;">
                                          <!-- <input style="padding: 7px; width: 140px; margin: 13px 0px" type="submit" value="Upload" /> -->
                                      </div>

                                      <table class="table table-striped table-bordered"  id="add_files">
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
                                      <!-- <input type="hidden" name="fixed_id" id="fixed_id" value="<?=mt_rand();?>"> -->
                                      <input type="hidden" name="user_id" id="user_id" value="<?=$user_id?>">
                                      <input type="hidden" name="try_free_value" class="try_free_value">
                                      <input type='hidden' value='' name='fixed_id' class="free_order_id">

                                  </div>

                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      <div class="text-center">
                                          <!-- <p>Enter Your Dropbox URL:</p>
                                          <input type="text" name="url" placeholder="Your Dropbox URL" class="dropbox-url"> -->
                                          <p class="text-dark">You can't upload via dropbox for try it free section</p>
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

                          
                          <textarea cols="40" rows="5" class="try_free_text" placeholder="Type Here Your Request(Ex.File size PNG 1200x800 pixel)"></textarea>

                          <div class="row justify-content-end">
                              <div class="col-md-4 my-2">
                                   <!-- <button style="height: 100%; width: 100%; border-radius: 30px;" type="button" class="btn btn-danger"><i class="fa fa-upload" aria-hidden="true"></i>Try It Free</button> -->
                                   <button style="height: 100%; width: 100%; border-radius: 30px;" type="submit" class="btn btn-danger"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Confirm & Upload</button>
                              </div>
                          </div>
                          
                          <div class="card mt-4">
                              <div class="card-header">
                                  <h4 class="title-red m-0">We remember you that</h4>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-12 d-inline-flex">
                                          <i class="fa fa-bullhorn fa-2x mr-3" aria-hidden="true"></i> <p class="font-weight-light">We do not accept products to build.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12 d-inline-flex">
                                          <i class="fa fa-clock-o fa-2x mr-3" aria-hidden="true"></i> <p class="font-weight-light">To let us respect photoshoots delivery timing you will need to pay with Credit Card / Paypal / Immediate Online Bank Transfer and send us products within 24 hours.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12 d-inline-flex">
                                          <i class="fa fa-credit-card fa-2x mr-3" aria-hidden="true"></i> <p class="font-weight-light">You need to pay within 10 days maximum.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12 d-inline-flex">
                                          <i class="fa fa-truck fa-2x mr-3" aria-hidden="true"></i> <p class="font-weight-light">Photoshoots delivery timing is meant starting from the moment we receive your products.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12 d-inline-flex">
                                          <i class="fa fa-download fa-2x mr-3" aria-hidden="true"></i> <p class="font-weight-light">At the end of processes you will be able to download photoshoots into your personal area, for 1 month starting from our email notification.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                  
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

<style type="text/css">
    .show{
      opacity: 1;
  }

  .input-label
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
      cursor:pointer;
  }
  .size{
      font-size: 18px;
  }
  .move{
      margin-right: 6px;
  }
</style>