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
              <div class="bs-example nopadding">
                  <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Services</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('frontend/try_it_free'); ?>"><?php echo "Try It Free" ?></a></li>
                        </ol>
                  </nav>
              </div>
                <!-- Category Section -->
                <div class="bg-white shop-page-products">
                 <li class="media my-4">
                    <img src="<?=base_url().'front_assets/images/icon7.png'; ?>" class="mr-3" width="50px" height="50px" alt="img">
                    <div class="media-body">
                    <h5 class="mt-0 mb-1">You can get a good idea of the quality of our services...</h5>
                    Photo.com - Ottieni un servizio gratuito per il tuo sito di e-commerce o la modifica delle immagini post-produzione con la garanzia al 100% della modifica delle immagini.
                    </div>
                </li>
                    <div class="row no-gutters">
                        <?php foreach($services as $sub): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="<?= base_url('frontend/try_free_order/').$sub->id; ?>" style="height: 170px;">
                                            <td align="center">
                                                <?php if($sub->service_icon != null){ ?>
                                                    <img src="<?php echo base_url($sub->service_icon); ?>" alt="sub_category_image">
                                                <?php }else{ ?>
                                                    <img src="" alt="no_image_found">
                                                <?php } ?>
                                            </td>
                                    </a>
                                    <div class="hoproduct-content">
                                        <h5 class="hoproduct-title text-center"><a href="<?= base_url('frontend/single_product/').$sub->id; ?>"><?= $sub->service_name; ?></a></h5>
                                          <h5 class="text-center">
                                              <del>$0</del>
                                              <span style="color:red">0</span>
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
    </div>
</div>
<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->
<?php include 'footer.php'; ?>
