<!-- Header -->
<header class="header header-3">
    <!-- Header Middle Area -->
    <div class="header-middle bg-theme">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                    <a href="<?= base_url(); ?>" class="header-logo">
                        <img src="<?= base_url().'front_assets/images/logo/logo.png'; ?>" alt="logo">
                    </a>
                </div>
                <div class="offset-lg-2 col-lg-4 col-12 order-3 order-lg-2">
                    <form method="post" action="<?=base_url('frontend/search')?>" class="header-searchbox form-control">
                        <input type="text" name="search" placeholder="Enter product name ...">
                        <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                    <div class="header-icons">
                        <div class="header-account">
                            <div class="header-contactinfo">
                                <i class="flaticon-support"></i>
                                <span>Call Us Now:</span>
                                <b>+0123456789</b>
                            </div>
                        </div>
                        <div class="header-langcurr">
                            <div class="select-language">
                                <button class="select-language-current"><img src="<?= base_url().'front_assets/images/icons/it.png'; ?>" alt="us icon">IT</button>
                                <ul class="select-language-list dropdown-list">
                                    <li><a href="#"><img src="<?= base_url().'front_assets/images/icons/it.png'; ?>" alt="italy icon">IT</a></li>
                                    <li><a href="#"><img src="<?= base_url().'front_assets/images/icons/us.png'; ?>" alt="us icon">EN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Header Middle Area -->
    <!-- Header Bottom Area -->
    <div class="header-bottom bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 d-none d-lg-block">
                    <!-- Navigation -->
                    <nav class="ho-navigation ho-navigation-3">
                        <ul>
                            <li class="active   ">
                                <a href="<?= base_url(); ?>">HOME</a>
                            </li>
                            <li>
                                <a href="<?= base_url('frontend/how_it_works'); ?>">HOW IT WORKS</a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>">EXAMPLES</a>
                            </li>
                        </ul>
                    </nav>
                    <!--// Navigation -->
                </div>
                <div class="col-lg-3 col-7 mobile-index">                    
                    <?php if(!$this->session->userdata("name")){ ?>
                    <button type="submit" id="btnRegisterModal" class="btn btn-link float-right btnRegister">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Register
                    </button>
                    <button type="submit" id="btnLoginModal" class="btn btn-link float-right">
                        <i class="fa fa-user" aria-hidden="true"></i> Login
                    </button>
                <?php } else{ ?>
                    <div class="btn-group float-right" >
                      <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?= $this->session->userdata("name"); ?>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu5" style="background: #ffffff;">
                        <a href="<?= base_url('frontend/profile'); ?>" class="dropdown-item" href="#">Profile</a>
                        <a href="<?= base_url('auth/user_auth/logout'); ?>" class="dropdown-item" href="#">Logout</a>
                      </div>
                    </div>
                <?php } ?>

                </div>
                <div class="col-lg-1 col-4 mobile-index">
                    <div class="header-cart">   
                        <a class="header-carticon" href="<?= base_url('frontend/cart'); ?>" title="View Cart"><i class="lnr lnr-cart"></i><span class="count cart__count_unique">
                            <?php if($this->cart->total_items() > 0){ ?>
                                <?= $this->cart->total_items(); ?>    
                            <?php }else{ ?>
                                <?= "0"; ?>
                            <?php } ?>  
                        </span></a>
                        
                        <!-- Minicart -->
                        <!-- <div class="header-minicart minicart">
                            <div class="minicart-header">
                                <div class="cart--info">
                                    <h4>Job 01</h4>
                                    <p class="float-left">Name of the job</p>
                                    <p class="float-right">$55.00</p>
                                </div>
                            </div>
                            <div class="minicart-header">
                                <div class="cart--info">
                                    <h4>Job 01</h4>
                                    <p class="float-left">Name of the job</p>
                                    <p class="float-right">$55.00</p>
                                </div>
                            </div>
                            <div class="minicart-header">
                                <div class="cart--info">
                                    <h4>Job 01</h4>
                                    <p class="float-left">Name of the job</p>
                                    <p class="float-right">$55.00</p>
                                </div>
                            </div>

                            <div class="minicart-footer">
                                <a href="<?= base_url('frontend/cart'); ?>" class="ho-button ho-button-fullwidth">
                                    <span>Go to Basket</span>
                                </a>
                            </div>
                        </div> -->
                        <!--// Minicart -->
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--// Header Bottom Area -->
</header>
<!--// Header -->

<!-- Login Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <form id="logForm" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginmodalLabel">Input your email and password for login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button id="logButton" type="submit" class="btn btn-primary float-right">Login</button>
                    <div class="checkbox-input">
                        <input type="checkbox" id="login-form-remember">
                        <label for="login-form-remember">Remember me</label>
                    </div>
                </div>
                <div class="modal-body">
                    <a href="#" class="float-left">Forget Passowrd</a>
                    <a href="#" id="newReg" class="float-right" data-toggle="modal" data-target="#regmodal">Don't have account? Register Now!</a>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </form>
</div>
<!-- // Login Modal -->

<!-- Registration Modal -->
<div class="modal fade" id="regmodal" tabindex="-1" role="dialog" aria-labelledby="regmodalTitle" aria-hidden="true">
    <form method="post" id="regForm">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
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
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Email">Repeat Email *</label>
                                        <input type="email" name="r_email" class="form-control">
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
                                <div class="col-md-12 fiscal_code">
                                    <div class="form-group">
                                        <label for="fiscal">Fiscal code *</label>
                                        <input type="text" name="fiscal" class="form-control" id="fiscal">
                                    </div>
                                </div>
                                <div class="col-md-6 telephone">
                                    <div class="form-group">
                                        <label for="telephone">Telephone *</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone">
                                    </div>
                                </div>
                                <div class="col-md-6 fax">
                                    <div class="form-group">
                                        <label for="fax">FAX</label>
                                        <input type="text" name="fax" class="form-control" id="fax">
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
                                <label class="form-check-label" for="iaccept">I accept</label>
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
            </div>
        </div>
    </form>
</div>
<!-- // Registration Modal -->
