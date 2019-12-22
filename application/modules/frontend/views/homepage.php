
        <!-- Page Conttent -->
        <main class="page-content bg-white">

            <!-- Features Area -->
            <div class="ho-section features-area bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                            <h1 class="text-center">Improve your Sales with professional images</h1>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 15px;">
                            <h3 class="text-center" style="color:#E2001A">We provide you almost 7 types of image editing services</h3>
                        </div>
                        <?php foreach($services as $service): ?>
                            <div class="col-md-2 col-6 no-padding">
                                <img src="<?php echo base_url($service->service_icon); ?>" width="50%" class="mx-auto d-block">
                                <p class="text-center title-xs"><?php echo $service->service_name; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php foreach($services as $service): ?>
                    <article class="hoproduct">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-3">
                                <img src="<?php echo base_url($service->service_icon); ?>" class="mx-auto d-block mb-3">
                            </div>
                            <div class="col-md-8 no-padding-left">
                                <h3 class="title-red"><?php echo $service->service_name; ?></h3>
                                <?php echo $service->service_description; ?>
                            </div>
                            <div class="col-md-3">
                                <img src="<?php echo base_url($service->service_image); ?>" width="100%">
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="container">
                <div class="card homepageinfo">
                    <div class="card-header">Discover More</div>
                    <div class="card-body">
                        <h5 class="title-red">Printing Services - overview</h5>
                        <p class="card-text">
                            Online printing services have never been easier and less complex than nowadays. photoot specialises in online printing services offering a wide range of products and services for any size business or project. Printing services online have changed the way printing is perceived and opened new frontiers and range of possibilities to business and the general public from all walks of life.
 
                            <br>
                            Each month we provide online Printing Services such as personalised stationery, packaging and more to over 900,000 business or brand customers across Europe for a great value for money. Our products are printed using only the most advanced printing machinery, and we regularly investing in new inks, printers and materials that provide exceptional results. <span><a class="title-red" href="<?= base_url('frontend/custom_quote'); ?>">Get a Quote <i class="fa fa-external-link"></i> </a></span>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <!--// Page Conttent -->
