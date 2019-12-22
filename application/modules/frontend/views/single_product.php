<?php include 'header.php'; ?>
<?php include 'menu-header.php'; ?>
<div class="banners-area bg-grey single-product">
    <div class="container">
        <div class="row" id="stick-part">
            <!-- First Column -->
            <div class="col-lg-3">
                <?php include 'sidemenu.php'; ?>
            </div>
            <?php if($product != null): ?>
            <?php foreach($product as $product_value): ?>
            <div class="<?php echo ($product_value->category_id != 1) ? 'col-lg-6' : 'col-lg-9';?>">
                <div class="bs-example mb-0 mt-4">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <?php if( $product_value->category_id != 1 ): ?>
                                    <a href="<?php echo base_url('frontend/to_category/').$sub_bread->category_id; ?>"><?=$sub_bread->name;?></a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('frontend/try_it_free'); ?>">
                                        <?='Try it Free'?>    
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="<?php echo base_url('frontend/single_product/').$product_value->sub_category_id; ?>"><?php echo $product_value->sub_category_name; ?></a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Form -->
                <form method="post" action="" id="single_product_form">
                    <?php $product_id = $this->uri->segment(3); ?>
                    <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                      <!-- Single Product Section -->
                    <div class="bg-white ptb-30 shop-page-products">
                        <div class="container product-details-area">
                            <div class="pdetails">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Image</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Description</a>
                                            </li>
                                        </ul>
                                    
                                        <div class="tab-content py-4" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pdetails-images">
                                                            <?php if($product_value->sub_category_image != null){ ?>
                                                            <div class="pdetails-largeimages pdetails-imagezoom">
                                                                <div class="pdetails-singleimage" data-src="<?= base_url($product_value->sub_category_image); ?>">
                                                                    <?php if( $product_value->category_id != 1 ): ?>
                                                                        <img src="<?= base_url($product_value->sub_category_image); ?>" alt="sub_category_image">
                                                                    <?php else: ?>
                                                                        <img style="max-width: 50%" src="<?= base_url($product_value->sub_category_image); ?>" alt="sub_category_image">

                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <?php }else{ ?>
                                                                <img src="" alt="No Image Found"> 
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="pdetails-content">
                                                            <h3 style="margin-bottom: 5px; text-transform: uppercase;"><?= $product_value->sub_category_name; ?></h3>
                                                            <div class="pdetails-pricebox">
                                                                <h5 style="font-size: 16px; color: #8c8888; margin: 0">Price:</h5>
                                                                <span class="price" id="basePrice">€<?= $product_value->current_price; ?></span>
                                                                <del class="oldprice">€<?= $product_value->previous_price; ?></del>
                                                                <h6 style="color: #8c8888;">Single product rate</h6>
                                                                <input type="hidden" id="price" value="<?= $product_value->current_price; ?>">
                                                            </div>                                   
                                                        </div>
                                                    </div>
                                                </div>        
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <p>
                                                    <?php echo $product_value->sub_category_description; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
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
                                                            <div class="col-md-5">
                                                                <label class="text-dark">Number of copies</label>
                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Number of copies want to process.">
                                                                    <i class="fa fa-info-circle size"></i>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <?php
                                                                if( $product_value->category_id != 1):
                                                                ?>
                                                                    <input type="text" min="1" name="amnt" id="amnt" class="form-control form-control-sm" placeholder="e.g. 10" data-validetta="required,number">
                                                                <?php else: ?>
                                                                    <input type="text" min="1" name="amnt" id="amnt" class="form-control form-control-sm" readonly="" name="number" value="1" data-validetta="required">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-md-5">
                                                                <label class="text-dark">Name this job</label>
                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Name of file associated with this item"><i class="fa fa-info-circle size"></i></span>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input class="form-control form-control-sm" name="j_name" id="j_name" placeholder="e.g. Job#01" data-validetta="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
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
                                                            <?php // foreach($additional_services as $service): ?>
                                                                <?php
                                                                if( $product_value->category_id != 1):
                                                                ?>
                                                                    <!-- Crop Image -->
                                                                    <li>
                                                                        <div class="row mt-1 CIContainer">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="crop-image" name="services[]" value="5">
                                                                                <label for="crop-image" class="text-dark">Crop Image</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="row srv-detail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- Shadow/ Reflect -->
                                                                    <li>
                                                                        <div class="row mt-1">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="shadrefl" name="services[]" value="10">
                                                                                <label for="shadrefl" class="text-dark">Shadow/ Reflect</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="row srv-detail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- Multipath -->
                                                                    <li>
                                                                        <div class="row mt-1">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="mltpth" name="services[]" value="15">
                                                                                <label for="mltpth" class="text-dark">Multipath</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- Background Change -->
                                                                    <li>
                                                                        <div class="row mt-1">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="bkgndchange" name="services[]" value="20">
                                                                                <label for="bkgndchange" class="text-dark">Background Change</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="row srv-detail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- Neck Joint -->
                                                                    <li>
                                                                        <div class="row mt-1">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="neckjoint" name="services[]" value="25">
                                                                                <label for="neckjoint" class="text-dark">Neck Joint</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- Output file format -->
                                                                    <li>
                                                                        <div class="row mt-1">
                                                                            <div class="col-md-5">
                                                                                <input type="checkbox" id="opff" name="services[]" value="30">
                                                                                <label for="opff" class="text-dark">Output File Format</label>
                                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Check if you want in addition.">
                                                                                    <i class="fa fa-info-circle size"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="row srv-detail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php else:  ?>

                                                                    <li>
                                                                        <input type="checkbox" id="" name="services[]" value="50">
                                                                        <label for=""></label>
                                                                        <span data-toggle="tooltip info-icon" data-placement="top" title="">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php // endforeach; ?>                                    
                                                        </ul>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                        <?php if( $product_value->category_id != 1 ): ?>
                                        <div class="row">
                                            <div class="col-md-12">
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
                                                            <div class="col-md-5">
                                                                <label class="text-dark" for="del-time">Delivery Hours</label>
                                                                <span class="pull-right info-icon" data-toggle="tooltip" data-placement="top" title="Delivery time of your images in hour.">
                                                                    <i class="fa fa-info-circle size"></i>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-7">
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
                                                                            <?=$charge->charge_hours.' € '.$charge->charge_value?>
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
                                        </div>
                                        <?php else: ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="title-red m-0">Notes For Free Service</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <textarea name="user_text" class="form-control" style="min-width: 100%" cols="500" rows="5" placeholder="Type here your requests (ex. File size PNG 1200X800 pixel)"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-2 my-2">
                                                            <button type="submit" class="btn btn-success btn-block">Try Free</button> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <aside class="col-lg-3">
                <?php if( $product_value->category_id != 1): ?>
                    <div class="order-infobox mt-4 mb-3" id="sidemenu">
                        <div class="bg-white">
                            <h5 class="text-center title-red">ORDER AMOUNT</h5>
                            <form id="sticky-form">
                                <input type="hidden" name="sub_category_id" value="<?= $product_value->sub_category_id; ?>">
                                <div class="clearfix">
                                    <p class="float-left text-color">Total Clipping Path</p>
                                    <p class="float-right text-color">€<span id="TotalPhotoAmount">0</span></p>
                                </div>
                                <div class="clearfix">
                                    <p class="float-left text-color">Add. Services</p>
                                    <p class="float-right text-color">€<span id="TotalAddiServices">0</span></p>
                                </div>
                                <div class="clearfix">
                                    <p class="float-left text-color">Delivery Price</p>
                                    <p class="float-right text-color">€<span id="deliveryTime">0</span></p>
                                </div>
                                <div class="clearfix">
                                    <p class="float-left text-color">NET PRICE</p>
                                    <p class="float-right text-color">€<span id="netprice">0</span></p>
                                </div>
                                <div class="clearfix">
                                    <p class="float-left text-color">VAT(22%)</p>
                                    <p class="float-right text-color">€<span id="vat">0</span></p>
                                </div>
                                <div class="clearfix total">
                                    <p class="float-left text-color-footer">Total(incl.VAT)</p>
                                    <p class="float-right text-color-footer">€<span class="t2" id="TotalOrderAmount">0</span></p>
                                </div>
                                
                                <input type="hidden" name="number" id="number" readonly>
                                <input type="hidden" name="name" id="name" readonly>
                                <input class="t2" type="hidden" id="TotalOrderAmountdata" name="total" readonly>
                                <input type="hidden" name="additional_service" id="additional_service" readonly>
                                <input type="hidden" class="additional_service_value" name="additional_service_value" readonly>
                                <input type="hidden" class="vat" name="vat" readonly>
                                <input type="hidden" class="delivery_price" name="delivery_price" readonly>
                                <input type="hidden" class="totalphotoamount" name="totalphotoamount" readonly>

                                <div class="text-center add-to-cart">
                                    <button id="btnToCart" type="button" class="btn-danger btn-sm btn-block add-to-cart-btn">
                                        <span>ADD TO CART</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>
            <?php endforeach; ?>
            <?php else: ?>
                <h1 style="padding-left: 215px;">No Data to Show</h1>
            <?php endif; ?>
        </div>
    </div>
    <?php if( $product_value->category_id != 1 ): ?>
    <!-- <div id="bottomm"> -->
        <!-- Notes Section -->
    <div class="container" id="bottom">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title-red m-0">Notes</h4>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" style="min-width: 100%" cols="500" rows="5" placeholder="Type here your requests (ex. File size PNG 1200X800 pixel)"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-2 my-2">
                        <button type="button" class="btn btn-danger btn-block add-to-cart-btn">Add to cart</button> 
                    </div>
                </div>
            </div>
            <div class="col-md-12">
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
        </div>
    </div>
    <!-- </div> -->
    <?php endif; ?>
</div>

<!-- Modal Starts --->
<div class="modal" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">The product has been added to your basket.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary continue-shopping">Continue Shopping</button>
        <a href="<?= base_url('frontend/cart') ?>" class="btn btn-danger" style="color: #fff">Go To Cart</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends --->


<!-- Modal Starts --->
<div class="modal" id="errorModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center text-danger">Required</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-danger">All fields are required! Please fill all fields</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends --->

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
        position: relative;
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

    .total{
        border-top: 1px solid #dc3545;
        padding-top: 8px;
    }

    .text-color-footer{
        color: #000;
        font-weight: 600;
    }

    .text-color{
        color: #000;
    }

    .add-to-cart{
        margin: auto 20px 8px;
    }

    .add-to-cart-btn{
        border-radius: 40px;
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
