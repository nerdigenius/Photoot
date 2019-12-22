

<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>




 <!-- Login Modal -->
        <div class="container">
            <div class="row">
                <form id="customForm" method="post" style="margin: 0 auto;">
                    <div class="modal-header">
                            <h5 class="modal-title" id="loginmodalLabel">Input your email and password for login</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <button id="logButton" type="submit" class="btn btn-danger float-right">Login</button>
                            <div class="checkbox-input">
                                <input type="checkbox" id="login-remember">
                                <label for="login-remember">Remember me</label>
                                <a href="<?=base_url('frontend/forgotPassword')?>" class="float-left">Forgot Passowrd?</a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <a href="#" id="newReg" class="float-right" data-toggle="modal" data-target="#regmodal">Don't have account? Register Now!</a>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                    </div>
        </form>
            </div>
        </div>
        <!-- // Login Modal -->




<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>