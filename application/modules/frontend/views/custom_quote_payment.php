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
                        <div class="md-step active step-clipboard">
                            <div class="md-step-circle"></div>
                            <div class="md-step-title">Data Summery</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div class="md-step step-file">
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
        <div class="col-md-1">

        </div>
        <div class="col-md-10 offset-md-1" id="bank">
            <div class="cart-page-area ptb-30 bg-white">
                <form method="post" name="myformm" id="myformm">
                    <div class="row1">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="billing">Your Billing
                                    Information
                                </h3>
                            </div>
                        </div>

                        <input type="hidden" name="last_id" value="<?=$fixed_id?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="content">
                                    <p>DIDIACT DI HAZARI AMINUL Ditta Individuale<br>
                                        Partita IVA04249970270<br>
                                        Codice fiscale: 04249970270<br>
                                        RIVIERA DEI PONTI ROMANI, 8<br>
                                        35121 PADOVA (PD)<br>
                                        Italia</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details">
                                    <p><b>Aminul <br>Cellulare: +393294074723 <br>Email: xyz@gmail.com<br> Indirizzo
                                            PEC:
                                            aminulhazari@pec.it<br>Codice Destinatario: BA6ET11</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h5 class="pay">Payment methods</h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="payment" id="payment3"
                                                value="paypal">
                                            <label class="form-check-label" for="payment3">PayPal
                                                Account</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-4">
                                        <img src="<?= base_url().'front_assets/images/logo/paypal.png'; ?>" alt="paypal logo" height="20px">
                                        <p class="para1">
                                            You will be redirected to the PayPal® site, the most
                                            important
                                            provider of online transactions in maximum security. With
                                            this
                                            method your order immediately becomes executive.
                                        </p>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="payment" id="payment4"
                                                value="bank">
                                            <label class="form-check-label" for="payment4">Bank Transfer in
                                                Advance</label>
                                        </div>
                                        <br>
                                        <p class="para2">
                                            Your order is recorded and put on hold until we can verify the
                                            payment
                                            (normally 2, 3 days).
                                        </p>
                                        <p class="para3">
                                            ATTENTION: For particularly urgent orders (Example PROMOTIONS 24h)
                                            we do
                                            not
                                            recommend payment by Bank Transfer in favor of Credit Card PayPal or
                                            where
                                            applicable cash on delivery.<br> We also remind you that it is necessary
                                            to
                                            insert the order number in the reason for payment to speed up the
                                            transaction.
                                        </p>
                                    </div>
                                </div>

                                <div class="bank-transfer">
                                    <div class="col-md-12">
                                        <h4 class="text-center mt-4 mb-3">TOTAL SUMMERY</h4>
                                        <table class="table table-condensed cart-table">
                                            <tbody>

                                                <tr class="cart-total">
                                                    <th>TOTAL CUSTOM ORDER VAT INCLUDED
                                                    </th>
                                                    <td><b><?php echo '€'.$amount.' EURO'; ?></b></td>
                                                    <input type="hidden" name="total" value="<?=$amount?>">
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="coupon">
                                    <h4>DO YOU HAVE A COUPON DISCOUNT?</h4>
                                    <p>Email it here and click the VERIFY the button before completing the purchase
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" aria-label="Search">
                                    <button class="btn main-btn my-2 my-sm-0" type="submit">
                                        VERIFY</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">Terms & conditions of sale & service</h4>
                                <div class="scrollable">
                                    <p>Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome;
                                        email;nome Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati
                                        secondo quanto specificato dalla privacy policy del servizio Interazione con le
                                        piattaforme
                                        di live chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del
                                        servizio; ragione sociale Registrazione ed autenticazione Registrazione diretta
                                        Dati
                                        Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di
                                        spedizione; nome; Partita IVA; password<br>
                                        Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome;
                                        email;
                                        nome
                                        Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati
                                        secondo
                                        quanto
                                        specificato dalla privacy policy del servizio Interazione con le piattaforme
                                        di
                                        live
                                        chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del
                                        servizio;
                                        ragione sociale Registrazione ed autenticazione Registrazione diretta Dati
                                        Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di
                                        spedizione; nome; Partita IVA; password<br>
                                        Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome;
                                        email;
                                        nome
                                        Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati
                                        secondo
                                        quanto
                                        specificato dalla privacy policy del servizio Interazione con le piattaforme
                                        di
                                        live
                                        chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del
                                        servizio;
                                        ragione sociale Registrazione ed autenticazione Registrazione diretta Dati
                                        Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di
                                        spedizione; nome; Partita IVA; password
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <input type="checkbox" name="checkkAgree" value="checkkAgree" id="checkkAgree" aria-label="Checkbox for following text input">
                        <label for="checkkAgree">I Accept</label>
                    </div>
                    <div class="row text-center mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger"> BUY NOW  </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            

<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>

<script>
    
    $(document).ready(function(){
        $('#myformm').submit(function(e){
            // e.preventDefault();
            var radio = $("input[name='payment']:checked").val();
            console.log(radio);
            
            if ($('#checkkAgree').is(":checked") && radio != undefined)
                {
                    if(radio === "paypal"){
                        $('#myformm').attr('action', '<?= base_url("frontend/custom_quote_payment_paypal") ?>');
                    }
                    else if(radio === "bank"){
                        $('#myformm').attr('action', '<?= base_url("frontend/custom_quote_payment_bank") ?>');
                    }
                }
            else{
                 e.preventDefault();
                 alert("unchecked");  
            }
        });
        
        
        
    })
</script>