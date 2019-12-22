<?php include 'header.php'; ?>
<?php include 'menu-header.php'; ?>

<div class="banners-area pb-30 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include 'sidemenu.php'; ?>
            </div>
            <div class="col-lg-9">
                <?php include 'banner.php'; ?>
                <?php foreach($bread as $value): ?>
                  <div class="bs-example nopadding">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Services</a></li>
                              <li class="breadcrumb-item"><a href="<?php echo base_url('frontend/to_category/').$value->category_id; ?>"><?php echo $value->name; ?></a></li>
                          </ol>
                      </nav>
                  </div>
                <?php endforeach; ?>
                <!-- Category Section -->
                <div class="bg-white shop-page-products">
                    <div class="row no-gutters">
                        <?php foreach($sub_category as $sub): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="<?= base_url('frontend/single_product/').$sub->sub_category_id; ?>">
                                            <td align="center">
                                                <?php if($sub->sub_category_image != null){ ?>
                                                    <img src="<?php echo base_url($sub->sub_category_image); ?>" alt="sub_category_image">
                                                <?php }else{ ?>
                                                    <img src="" alt="no_image_found">
                                                <?php } ?>
                                            </td>
                                    </a>
                                    <div class="hoproduct-content">
                                        <h5 class="hoproduct-title text-center"><a href="<?= base_url('frontend/single_product/').$sub->sub_category_id; ?>"><?= $sub->sub_category_name; ?></a></h5>
                                          <h5 class="text-center">
                                              <del>$<?= $sub->previous_price; ?></del>
                                              <span style="color:red">$<?= $sub->current_price; ?></span>
                                          </h5>
                                    </div>
                                </div>
                            </article>
                            <!--// Single Product -->
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters mt-5">
            <div class="card" style="width: 100%;">
                <div class="card-header">
                    <h3 class="title-red m-0">EXAMPLES</h3>
                </div>
                <div class="card-body nopadding">
                    <div class="col-md-12 nopadding">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <?php $item = ' active'; 
                            foreach($sub_category as $image):
                              ?>
                            <div class="carousel-item<?= $item; ?>">
                              
                              <div class="row">
                                  <div class="col-md-8 text-center">
                                      <img height="200px;" src="<?php echo base_url($image->sub_category_image); ?>">
                                  </div>
                                  <div class="col-md-4 text-center" style="background: #c8c8c8;">
                                      <div>
                                        <h5 class="text-left pt-3"><?php echo $image->sub_category_name; ?></h5>
                                        <p class="text-left" style="color: #ffffff;"><b><?php echo $image->sub_category_description; ?></b></p>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <?php $item = '';
                            endforeach; 
                            ?>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div> 
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

</script>
