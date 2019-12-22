

<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>




 <!-- Login Modal -->
        <div class="container">
            <div class="row">
                <form action="<?=base_url('frontend/forgotPasswordValidation')?>" method="post" style="margin: 0 auto;">
                    <?php if($this->session->flashdata('noEmail')): ?>
                        <div style="background-color: red;margin-top: 16px;color: white;height: 42px;text-align: center;">
                            <p><?php echo $this->session->flashdata('noEmail'); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="modal-header">
                            <h5 class="modal-title" id="loginmodalLabel">Input your Registered email for change password</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <input type="submit" value="Enter" class="btn btn-danger">
                        </div>
                    </div>
        </form>
            </div>
        </div>
        <!-- // Login Modal -->




<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>