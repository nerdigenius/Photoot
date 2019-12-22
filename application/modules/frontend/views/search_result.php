<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>



<div class="banners-area bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include 'sidemenu.php'; ?>
            </div>
            <div class="col-lg-9" style="margin-top: 28px">
                
                <div class="row">
                    <?php if($data != null): ?>
                        <?php foreach($data as $file): ?>
                            <div class="col-md-4">
                                <img src="<?=base_url().$file->sub_category_image?>" alt="No Image Found">
                            </div>
                            <div class="col-md-8">
                                <p><?= $file->sub_category_description; ?></p>
                                <a href="<?=base_url('frontend/single_product/').$file->sub_category_id;?>" class="btn btn-dark">Go & Order This!</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-md-12 text-center">
                            No Data Found
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>
