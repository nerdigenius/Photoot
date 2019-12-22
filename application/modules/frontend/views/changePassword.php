

<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>




 <!-- Login Modal -->
        <div class="container">
            <div class="row">
                     <form action="<?=base_url('frontend/changePasswordValidation')?>" method="post" style="margin: 0 auto;">
                        <div class="text-center col-md-12" style="margin: 0 auto; background-color: red; color: white; font-weight: 700">
                            <p><?php echo validation_errors(); ?></p>
                        </div>       
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginmodalLabel">Change Your Password</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" value="<?=$id?>" name="id" class="form-control" placeholder="Enter email">
                                <h3>Enter Your New Password Now!</h3>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="c_password" class="form-control" placeholder="Enter Password Again">
                            </div>
                            <input type="submit" value="Enter" class="btn btn-danger">
                        </div>
                    </form>
                 
            </div>
        </div>
        <!-- // Login Modal -->




<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>