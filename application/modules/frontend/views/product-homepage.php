            <!-- Shop Page Area -->
            <div class="shop-page-area">
                <div class="container">

                    <!-- Banner Area -->
                    <!-- <div class="banner-area">
                        <div class="container">
                            <div class="imgbanner imgbanner-2 mt-30">
                                <a href="product-details.html">
                                    <img src="images/banner/banner-image-6.jpg" alt="banner">
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <!--// Banner Area -->

                    <div class="shop-page-products mt-30">
                        <div class="row no-gutters">
                            <?php foreach($value as $data): ?>
                                                    <?php if($data->category_image != null){ ?>
                            
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <!-- Single Product -->
                                <article class="hoproduct">
                                    <div class="hoproduct-image">
                                        <a class="hoproduct-thumb" href="<?php echo base_url('frontend/to_category/').$data->category_id; ?>">
                                            
                                                
                                                        <img class="hoproduct-frontimage" src="<?php echo base_url($data->category_image); ?>" alt="category_image">
                                                        <div class="hoproduct-content">
                                        <h5 class="hoproduct-title text-center"><a href="category-page.php"><?= $data->name; ?></a></h5>
                                        
                                        <div class="hoproduct-pricebox">
                                            <div class="pricebox text-center">
                                                <del class="oldprice">$35.11</del>
                                                <span class="price">$34.11</span>
                                            </div>
                                        </div>
                                    </div>
                                                    
                                        </a>
                                        <ul class="hoproduct-flags">
                                            <li class="flag-pack">Promo</li>
                                            <!-- <li class="flag-discount">-15%</li> -->
                                        </ul>
                                    </div>
                                    
                                </article>
                                <!--// Single Product -->
                            </div>
                            
                            <?php }else{ ?>
                                                    <img src="" alt="no_image_found">
                                                <?php } ?>
                                                <?php endforeach; ?>
                        </div>
                    </div>


                </div>
            </div>
            <!--// Shop Page Area -->