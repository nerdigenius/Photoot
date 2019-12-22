<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>


<div class="banners-area bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include 'sidemenu.php'; ?>
            </div>
            <div class="col-lg-7">		
                <div class="tab-content" id="nav-tabContent">
          		      <!-- Instruction Starts -->

                     <div class="bs-example mb-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-dark">Customized Quotation</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                      <div class="tab-pane fade show active">

                          <form method="post" action="" id="custom_quote_form">
                              <div class="top-box">
                                  <div class="top-box-2">
                                      <p class="top-p">
                                          If you have the images for clipping path or need other services? to get a <span style="color: #ff0000;">FREE QUOTATION!</span> please continue the directions
                                      </p>
                                  </div>
                              </div>

                              <div class="top-div">
                                  <div class="card">
                                      <div class="card-header jobTitle">
                                          Job Details <span class="click-details"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <p class="details" style="color: #7e7e7e; font-size: 13px; font-weight: 500;">
                                                            To get started, you‘ll need to configure your product.
                                                            Every product we make at Pixartprinting is bespoke and changing aspects like weight, size or material can affect your total price.
                                                            A full quote will be provided once your product has been configured completely.
                                                        </p>
                                      </div>
                                      <div class="card-body">
                                          <div class="row d-flex align-items-center mb-1">
                                              <div class="col-md-6">
                                                <input type="hidden" name="auto_id[]" value="1">
                                                  <label class="text-dark">Number of copies</label>
                                                  <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Number of copies want to process.">
                                                      <i class="fa fa-info-circle size"></i>
                                                  </span>
                                              </div>
                                              <div class="col-md-5 offset-md-1">
                                                    <input type="number" min="1" name="amnt" id="amnt" class="form-control form-control-sm" placeholder="e.g. 10" required="required">
                                              </div>
                                          </div>
                                          <div class="row d-flex align-items-center">
                                              <div class="col-md-6">
                                                  <label class="text-dark">Name this job</label>
                                                  <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Name of file associated with this item"><i class="fa fa-info-circle size"></i></span>
                                              </div>
                                              <div class="col-md-5 offset-md-1">
                                                  <input class="form-control form-control-sm" name="j_name" id="j_name" placeholder="e.g. Job#01" required>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card mb-4">
                                      <div class="card-header jobTitle">
                                          Additional Services <span class="additional-details"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <p class="additional" style="color: #7e7e7e; font-size: 13px; font-weight: 500;">
                                                            To get started, you‘ll need to configure your product.
                                                            Every product we make at Pixartprinting is bespoke and changing aspects like weight, size or material can affect your total price.
                                                            A full quote will be provided once your product has been configured completely.
                                                        </p>
                                      </div>
                                      <div class="card-body">
                                          <ul class="add_service">
                                              <!-- Crop Image -->
                                              <li>
                                                  <div class="row mt-1 CIContainer">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="crop-image" name="services[]" value="5">
                                                          <label for="crop-image" class="text-dark">Crop Image</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                      <div class="col-md-5 offset-md-1">
                                                          <div class="row srv-detail"></div>
                                                      </div>
                                                  </div>
                                              </li>
                                              <!-- Shadow/ Reflect -->
                                              <li>
                                                  <div class="row mt-1">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="shadrefl" name="services[]" value="10">
                                                          <label for="shadrefl" class="text-dark">Shadow/ Reflect</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                      <div class="col-md-5 offset-md-1">
                                                          <div class="row srv-detail"></div>
                                                      </div>
                                                  </div>
                                              </li>
                                              <!-- Multipath -->
                                              <li>
                                                  <div class="row mt-1">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="mltpth" name="services[]" value="15">
                                                          <label for="mltpth" class=" text-dark">Multipath</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </li>
                                              <!-- Background Change -->
                                              <li>
                                                  <div class="row mt-1">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="bkgndchange" name="services[]" value="20">
                                                          <label for="bkgndchange" class=" text-dark">Background Change</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                      <div class="col-md-5 offset-md-1">
                                                          <div class="row srv-detail"></div>
                                                      </div>
                                                  </div>
                                              </li>
                                              <!-- Neck Joint -->
                                              <li>
                                                  <div class="row mt-1">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="neckjoint" name="services[]" value="25">
                                                          <label for="neckjoint" class=" text-dark">Neck Joint</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </li>
                                              <!-- Output file format -->
                                              <li>
                                                  <div class="row mt-1">
                                                      <div class="col-md-6">
                                                          <input type="checkbox" id="opff" name="services[]" value="30">
                                                          <label for="opff" class="text-dark">Output File Format</label>
                                                          <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                              <i class="fa fa-info-circle size"></i>
                                                          </span>
                                                      </div>
                                                      <div class="col-md-5 offset-md-1">
                                                          <div class="row srv-detail"></div>
                                                      </div>
                                                  </div>
                                              </li>                             
                                          </ul>
                                      </div>
                                  </div>

                                  <div class="card">
                                      <div class="card-header jobTitle">
                                          Select Delivery Time <span class="delivery-details"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <p class="delivery" style="color: #7e7e7e; font-size: 13px; font-weight: 500;">
                                                            To get started, you‘ll need to configure your product.
                                                            Every product we make at Pixartprinting is bespoke and changing aspects like weight, size or material can affect your total price.
                                                            A full quote will be provided once your product has been configured completely.
                                                        </p>
                                      </div>
                                      <div class="card-body">
                                          <div class="row d-flex del-charge">
                                              <div class="col-md-6">
                                                  <label class=" text-dark" for="del-time">Delivery Hours</label>
                                                  <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Delivery time of your images in hour.">
                                                      <i class="fa fa-info-circle size"></i>
                                                  </span>
                                              </div>
                                              <div class="col-md-5 offset-md-1">
                                                  <?php $counter = 0; ?>
                                                      <?php foreach($delivery_charge as $charge): ?>
                                                          <?php if( $counter ==0 ){
                                                              $checked = 'checked';
                                                          }else{
                                                              $checked = '';
                                                          }?>

                                                          <div class="form-check sp-radio">
                                                              <input class="form-check-input" type="radio" name="d_charge" id="del-<?=$charge->charge_value?>" value="<?=$charge->charge_value?>" <?=$checked?> required>
                                                              <label class="form-check-label" for="del-<?=$charge->charge_value?>">
                                                                  <?=$charge->charge_hours?>
                                                                  <span class="adtnl-srvc-spn text-dark">price for each single file (excl VAT)</span>
                                                              </label>
                                                          </div>
                                                          <?php $counter++; ?>
                                                      <?php endforeach; ?>                                                         
                                              </div>
                                          </div>
                                      </div>
                                  </div> 
                              </div>

                              <div class="button-claim text-right">
                                  <button type="button" id="claim-button" class="btn btn-danger claim-button">Claim Your Order Id</button>
                              </div>
                          </form>
                          
                          <form name="custom_quote_form_id" id="custom_quote_form_id" action="javascript:void(0);" enctype="multipart/form-data">
                          
                              <div id="bottom-data">
                                  <div class="bottom-div">
                                    <div class="card">
                                      <div class="card-header jobTitle">
                                          <p class="text-success">Your Custom Order Has Placed Successfully.</p>
                                          <p class="text-success">Custom Order Id: <input style="width:10%" type="button" class="btn btn-danger" id="custom_q_id" name="custom_q_id" value=""></p>
                                          <p class="text-success">Now Upload Your Files</p>
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
                                                          <h1>Select One or Multiple Photo</h1>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <p>You can upload images in the following formats(psd, png, eps, jpg). </p>
                                                          <p>The recommended size should not exceed(for this mode upload) the 100Mb per image.</p>
                                                          <p>Use the tab <span>Dropbox upload</span> to upload large images</p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label class="input-label" style="width: 100%; text-align: center"><i class="fa fa-plus" aria-hidden="true"></i>Add File<input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files" multiple="multiple"/></label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          
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
                                              <input type="hidden" name="user_id" id="user_id" value="<?=$user_id?>">
                                              <input type="hidden" name="custom_quote_value" id="custom_quote_value">
                                              <input type='hidden' value='' name='fixed_id' id="custom_quote_id">

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

                                  <textarea cols="40" rows="5" id="custom_quote_text" placeholder="Type Here Your Request(Ex.File size PNG 1200x800 pixel)"></textarea>

                                  <div class="row justify-content-end">
                                      <div class="col-md-6 my-2">
                                          <button style="width: 100%; border-radius: 20px;" type="submit" class="btn btn-danger"><i class="fa fa-upload" aria-hidden="true"></i>Confirm & Upload</button>
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
		      
		  <!--// Account Page Area -->
            	
            </div>
        </div>
    </div>
</div>



<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>
<style>
    /* Only stick if you can fit */

    #myModal.modal.show .modal-dialog {
        top: 40%;
        -webkit-transform: translate(0,-70%);
        transform: translate(0,-70%);
    }

    #errorModal.modal.show .modal-dialog {
        top: 40%;
        -webkit-transform: translate(0,-70%);
        transform: translate(0,-70%);
    }
    .desc-field{
        /*display: none;*/
        max-height: 25px;
        border-radius: 0;
        transition: .2s; 
    }

    input[type="text"].desc-field::-webkit-input-placeholder {
        font-size: 13px;
    }

    .desc-field span.current{
        font-size: 10px;
        height: 25px;
        line-height: 25px;
    }
    .desc-field::after{
        height: 25px !important;
        line-height: 25px !important;
    }
    ul.add_service li label{
        text-transform: uppercase;
        font-size: 12px;
    }

    /*input[type="text"].desc-field::-webkit-input-placeholder {
        color: pink;
    }
    input[type="text"].desc-field::-moz-placeholder {
      color: pink;
    }
    input[type="text"].desc-field:-ms-input-placeholder {
      color: pink;
    }
    input[type="text"].desc-field:-moz-placeholder {
      color: pink;
    }*/

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
  .details{
        display: none;
    }

    .additional{
        display: none;
    }

    .delivery{
        display: none;
    }

    .click-details{
        float: right;
    }

    .additional-details{
        float: right;
    }

    .delivery-details{
        float: right;
    }

    .size{
        font-size: 18px;
    }
</style>

<script>
    $(function(){
        $('.click-details').on('click', function(){
            $('.details').slideToggle("slow");
        });

        $('.additional-details').on('click', function(){
            $('.additional').slideToggle("slow");
        });

        $('.delivery-details').on('click', function(){
            $('.delivery').slideToggle("slow");
        });
    })
</script>