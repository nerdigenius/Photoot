
<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>
            <!-- Account Page Area -->
            <div class="account-page-area ptb-30">
                <!-- Horizontal Steppers -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-stepper-horizontal orange" style="margin:50px auto;">
                                <div class="md-step step-cart">
                                    <div class="md-step-circle"></div>
                                    <div class="md-step-title">Basket</div>
                                    <div class="md-step-bar-left"></div>
                                    <div class="md-step-bar-right"></div>
                                </div>
                                <div class="md-step step-clipboard">
                                    <div class="md-step-circle"></div>
                                    <div class="md-step-title">Data Summery</div>
                                    <div class="md-step-bar-left"></div>
                                    <div class="md-step-bar-right"></div>
                                </div>
                                <div class="md-step active step-file">
                                    <div class="md-step-circle"></div>
                                    <div class="md-step-title">Order successfully sent</div>
                                    <div class="md-step-bar-left"></div>
                                    <div class="md-step-bar-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Horizontal Steppers Ends-->
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 text-center">

						    <h2 class="success"><b>Thank you! Your payment was successful.</b></h2>
                            <h3 class="success"></h3>
						    <!-- <p>Item Name : <span><?php echo $item_name; ?></span></p>
						    <p>Item Number : <span><?php echo $item_number; ?></span></p> -->
						    <p>TXN ID : <span><?php echo $txn_id; ?></span></p>
						    <p>Amount Paid : <span>€<?php echo $payment_amt.' '.$currency_code; ?></span></p>
						    <p>Payment Status : <span><?php echo $status; ?></span></p>

						    <form action="<?php echo base_url('frontend/profile'); ?>">
                                <td>
                                    <button type="submit" class="ho-button">
                                        Go to profile to upload products
                                    </button>  
                                </td>
                            </form><br>

						    <form action="<?php echo base_url('frontend'); ?>">
                                <td>
                                    <button type="submit" class="ho-button">
                                        Continue Shopping
                                    </button>  
                                </td>
                            </form>

						</div>


                    </div>
                </div>
            </div>
            <!--// Account Page Area -->

          


<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>
