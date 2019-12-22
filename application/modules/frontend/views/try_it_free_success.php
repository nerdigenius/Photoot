<?php include 'header.php'; ?>
<?php include 'menu-header.php'; ?>
<div class="banners-area bg-grey single-product">
    <div class="container">
        <div class="row" id="stick-part">
            <!-- First Column -->
            <div class="col-lg-3">
                <?php include 'sidemenu.php'; ?>
            </div>

            <div class="col-lg-9 mt-30 top" id="success">
                <div class="alert alert-danger" role="alert">
                    Successfully sent your try it free quote request
                </div>
                <div class="top-1">
                    <p class="text-dark">Thank you for using our online free quote system. <br>
                    The order for relative quote has been correctly registered with the number <?=$id?>.
                    Always specify this when communicating with our operators to ask for information
                    or assistance.</p>
                    <p class="text-dark">
                        We remind you that by accessing your personal area, you can check the progress of
                        your order in real time in the My Quotation tab.
                    </p>
                </div>
                    <p class="text-danger">Very Shortly you will receive a notification about this quotation</p>
                <div class="top-3">
                    <p>You will find the following information in this coming email: </p>
                    <ul class='success-list'>
                        <li>Quotation details</li>
                        <li>Approved quotation</li>
                        <li>Order Summary</li>
                        </ul>
                    <p>THANKS<br/>FOR CHOOSING PHOTOOT!</p>
                </div>

                <div class="footer-box">
                    <p>We remind you that by accessing your personal area, you can check the progress of
                    your order in real time in the My Quotation tab.</p>
                    <a href="<?=base_url('frontend/profile')?>" class="btn btn-lg success-btn">click here <i class="fa fa-angle-right"></i></a>
                </div>

            </div>
            
                
        </div>
            
    </div>
</div>

<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->
<?php include 'footer.php'; ?>

<style>
    .top{
        /*margin-top: 22px;*/
    }
    .top-1{
        border-bottom: 1px solid #ccc;
        margin-bottom: 30px;
    }
    .top-2{
        margin-top: 10px;
    }
    #success{
        font-size: 20px;
        color: #000;
    }
    .alert{
        color: green;
        font-size: 24px;
        font-weight: bold;
        border-radius: 0px 0px 0px 0px;
        border: 1px solid #ccc;
        padding: 15px;

    }
    .text-dark{
        font-size: 20px;
    }
    .footer-box{
        padding: 5px 15px;
        border: 1px solid #ff0000;
        color: blue;
        text-align: center;
        border-radius: 3px 3px 3px 3px;
    }
    .success-btn{
        border: 1px solid #ff0000;
        padding-left: 30px;
        padding-right: 30px;
        margin-bottom: 15px;
        color: #ff0000 !important;
    }
    .success-list{
        margin: 20px 0;
        padding: 0 25px;

    }
</style>