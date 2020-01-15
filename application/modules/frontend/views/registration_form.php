

<?php include 'header.php'; ?>

<?php include 'menu-header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('front_assets/css/bootoast.css'); ?>">

 <!-- Registration Modal -->
    <form method="post" id="regForm">
        
        <div class="modal-header">
            <h5 class="modal-title" id="regmodalTitle">Register Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
 
        <div class="modal-body">
            <p>* Required</p>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Account Type</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input private" type="radio" name="typeRadio" id="inlineRadio1" value="private">
                            <label class="form-check-label" for="inlineRadio1">Private</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input company" type="radio" name="typeRadio" id="inlineRadio2" value="company">
                            <label class="form-check-label" for="inlineRadio2">Company</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input individual_company" type="radio" name="typeRadio" id="inlineRadio3" value="individual">
                            <label class="form-check-label" for="inlineRadio3">Individual company / Freelance / Society</label>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Credentials</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Email">Email *</label>
                                    <input type="email" name="email" class="form-control" id="countryInput" aria-describedby="countryInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Email">Repeat Email *</label>
                                    <input type="email" name="r_email" class="form-control" id="countryInput" aria-describedby="countryInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Password">Password *</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Password">Repeat Password *</label>
                                    <input type="password" name="c_password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4" id="card">
                    <div class="card-header">
                        <strong>Details</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 name">
                                <div class="form-group ">
                                    <label for="d_name">Name *</label>
                                    <input type="text" name="d_name" class="form-control" id="d_name">
                                </div>
                            </div>
                            <div class="col-md-6 surname">
                                <div class="form-group">
                                    <label for="d_surname">Surname *</label>
                                    <input type="text" name="d_surname" class="form-control" id="d_surname">
                                </div>
                            </div>
                            <div class="col-md-6 company_name">
                                <div class="form-group">
                                    <label for="c_name">Company Name *</label>
                                    <input type="text" name="c_name" class="form-control" id="c_name">
                                </div>
                            </div>
                            <div class="col-md-6 vat">
                                <div class="form-group">
                                    <label for="d_vat">VAT <sup>*</sup></label>
                                    <input type="text" name="d_vat" class="form-control" id="d_vat">
                                </div>
                            </div>
                            <div class="col-md-12 address">
                                <div class="form-group">
                                    <label for="d_address">Address *</label>
                                    <input type="text" name="d_address" class="form-control" id="d_address">
                                </div>
                            </div>
                            <div class="col-md-6 city">
                                <div class="form-group">
                                    <label for="d_city">City *</label>
                                    <input type="text" name="d_city" class="form-control" id="d_city" >
                                </div>
                            </div>
                            <div class="col-md-6 zip">
                                <div class="form-group">
                                    <label for="d_zip">Zip *</label>
                                    <input type="text" name="d_zip" class="form-control" id="d_zip">
                                </div>
                            </div>
                            <div class="col-md-12 country">
                                <div class="form-group">
                                    <label for="d_country">Country</label>
                                    <select id="d_country" class="form-control" name="d_country">
                                        <option selected>Italy</option>
                                        <option value="it">Italy</option>
                                        <option value="it">Italy</option>
                                        <option value="it">Italy</option>
                                        <option value="it">Italy</option>
                                        <option value="it">Italy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pec">
                                <div class="form-group">
                                    <label for="pec">PEC *</label>
                                    <input type="text" name="pec" class="form-control" id="pec">
                                </div>
                            </div>
                            <div class="col-md-6 sdi">
                                <div class="form-group">
                                    <label for="sdi">SDI *</label>
                                    <input type="text" name="sdi" class="form-control" id="sdi">
                                </div>
                            </div>
                            <div class="col-md-6 fiscal_code">
                                <div class="form-group">
                                    <label for="fiscal">Fiscal code *</label>
                                    <input type="text" name="fiscal" class="form-control" id="fiscal">
                                </div>
                            </div>
                            <div class="col-md-6 telephone">
                                <div class="form-group">
                                    <label for="telephone">Telephone *</label>
                                    <input type="number" name="telephone" class="form-control" id="telephone">
                                </div>
                            </div>
                            <div class="col-md-6 fax">
                                <div class="form-group">
                                    <label for="fax">FAX</label>
                                    <input type="number" name="fax" class="form-control" id="fax">
                                </div>
                            </div>
                            <div class="col-md-6 province">
                                <div class="form-group">
                                    <label for="province">Province *</label>
                                    <input type="text" name="province" class="form-control" id="province">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Privacy Policy</strong>
                    </div>
                    <div class="card-body">
                        <div class="pp-register">
                            Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome; email; nome Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati secondo quanto specificato dalla privacy policy del servizio Interazione con le piattaforme di live chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del servizio; ragione sociale Registrazione ed autenticazione Registrazione diretta Dati Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di spedizione; nome; Partita IVA; password<br>
                            Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome; email; nome Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati secondo quanto specificato dalla privacy policy del servizio Interazione con le piattaforme di live chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del servizio; ragione sociale Registrazione ed autenticazione Registrazione diretta Dati Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di spedizione; nome; Partita IVA; password<br>
                            Gestione contatti e invio di messaggi Mailchimp Dati Personali: cognome; email; nome Gestione dei pagamenti PayPal Dati Personali: varie tipologie di Dati secondo quanto specificato dalla privacy policy del servizio Interazione con le piattaforme di live chat Zendesk Chat Dati Personali: Dati comunicati durante l'utilizzo del servizio; ragione sociale Registrazione ed autenticazione Registrazione diretta Dati Personali: Codice Fiscale; cognome; indirizzo di fatturazione; indirizzo di spedizione; nome; Partita IVA; password
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="typeAgree" id="iaccept" value="iaccept">
                            <label class="form-check-label" for="iaccept">I have read the conditions of treatment of my personal data and I give my consent </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Agree" id="idonotaccept" value="idonotaccept">
                            <label class="form-check-label" for="idonotaccept">I do not accept</label>
                        </div>
                    </div>
                </div>
                <button id="regButton" type="submit" class="btn btn-primary">Register Now</button>
        </div>
        <div class="modal-footer">
            <a href="#" id="newLog" data-toggle="modal" data-target="#loginmoda"l>Already have an account!</a>
        </div>
               
               
    </form>

        <!-- // Registration Modal -->
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo base_url('front_assets/js/registration.js') ?>"></script>
<script src="<?= base_url('front_assets/js/bootoast.js'); ?>"></script>



<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->


<?php include 'footer.php'; ?>