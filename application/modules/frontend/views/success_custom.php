<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>
        
        
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
            
            <div class="cart-page-area ptb-30 bg-white">
                <div class="container">
                    <div class="row bank">
                        <?php foreach($values as $value): ?>
                        <div class="col-md-12" id="">
                                <h3>Congratulations, Order Completed Correctly!</h3>
                                <p>Your order has been saved with the number <b style="color: red"><?=$value->custom_quote_id;?></b>, and a summary email has been sent to your email address <b style="color: red"><?=$value->email;?></b> used for registration to our site.</p>
                                <p> Check in the next few minutes.</p>
                                <h4>TOTAL ORDER VAT included <b style="color: red;">
                                    <?php echo $value->amount; ?>
                                </b></h4>
                            <hr>
                            <h3>You Have Chosen The Payment By BANK TRANSFER</h3>
                            <P>
                                You have chosen to pay by bank transfer, so we remind you that the execution of your order (starting from the accep-tance of the transfer) will take place when we can verify the actual crediting (normally 2/3 working days). The planned Tamite delivery dates indicated in the summary may therefore be delayed.
                            </P>
                            <h5>Di seguito i dati per il pagamento tramite bonifico bancario:</h5>
                            <p style="color: red;">IMPORTO: <?=$value->custom_quote_id;?></p>
                            <p style="color: red;">CAUSALE: <?= $value->amount; ?></p>
                            <p>--</p>
                            <p>Beneficiario: DIDIACT DI HAZARI AMINUL</p>
                            <p>UNICREDIT Banca</p>
                            <p>IBAN: IT29I02008388640001031</p>
                            <p>Codice BIC/Swift: UNCRITM1C2</p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <form class="upload-success" action="<?php echo base_url('frontend/profile'); ?>">
                        <td>
                            <button type="submit" class="ho-button">
                                <!-- <i class="fa fa-arrow-circle-up"></i>&nbsp;AREA SENDS FILES -->
                                &nbsp;You'll Be Notified Via E-mail
                            </button>  
                        </td>
                    </form>

                </div>
            </div>
            

<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>
