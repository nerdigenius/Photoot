<?php include 'header.php'; ?>
<?php include 'menu-header.php'; ?>
<style>
    .how-work .nav-item{
        width: 15%;
        margin: 3px;
    }
    .how-work a.nav-link{
        display: block;
        text-align: center;
        width: 100%;
        margin: 0 auto;
        padding: 0;
    }
    .how-work a.nav-link h5{
        width: 100%;
        background-color: #ccc;
        color: #ca3c08;
    }
    .how-work a.nav-link h5 span{
        width: 30px;
        height: 30px;
        background: #fff;
        border: 1px solid #ca3c08;
        border-radius: 50%;
        display: block;
        margin: 0px auto;
        line-height: 30px;
    }
    .how-work a.nav-link p{
        line-height: 15px;
    }
    .service_image{
        border: 1px solid black;
    }
    .s_title{
        color: #dc3545;
    }
    .left_color{
        color: #000 !important;
        font-size: 15px;
    }
    .small_color{
        color: #000 !important;
        font-size: 13px;
    }
    .left_color:hover{
        background-color: red;
        color: #FFFFFF !important;
        border-radius: ;
    }
    .br-un{
        border-bottom: 1px solid #ccc;
    }
    .text{
    	float: right;
    }
    i.fa.fa-chevron-right{
        float: right;
        margin-right: -0.5em;
        padding-top: .3em;
    }
    .font{
        font-family: Roboto, Ubuntu, Arial, sans-serif;
        font-size: 81.25%;
    }
    .how{
        text-transform: uppercase;
        color: #D65038;
        margin: 0px auto;
        font-size: 22px;
    }
    .para{
        color: #000;
        font-size: 15px;
    }
    .li_style{
        font-size: 20px;
        font-weight: 600;
    }
</style>
<div class="banners-area bg-grey">
    <div class="container">
        <div class="row font"> 
            <div style="margin-left: 30px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a style="color: red;" href="<?=base_url('how_it_works')?>">How It Works</a></li>
                </ol>
            </div>
            <div class="col-lg-12 mt-30 pl-5">
                <div id="content" class="row col-xs-12">
                    <h1 class="how">How does it work</h1>
                    <p class="para">
                        photoot.com is an extremely user-friendly online application through which you can easily upload, check and manage your work. The entire workflow is automated and takes place within the application. Communication and status updates take place via automated e-mail messages and web notifications.<br> The process is completely transparent. Nevertheless, if you have any questions, suggestions or comments, please feel free to contact us! Our support staff is standing by to help you, during European office hours. We speak Italian, English.
                    </p>
                    <h3 class="s_title">
                        You can order your post production images for clipping path or other services in two ways</b> through the photoot.com website
                    </h3>
                    <ol class="s_title">
                        <li class="li_style">Customized Quotation</li>
                        <li class="li_style">Product Category</li>
                    </ol>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Customized Quotation</h1>
                            </div>
                            <div class="col-md-4">
                                <p class="small_color">Let photoot.com do the clip</p>
                                <p class="small_color">A few simple steps for <span style="color: #dc3545; font-weight: 600;">Customized Quotation</span></p>
                                <ol class="nav flex-column">
                                    <li class="nav-item br-un" data-target="#home">
                                        <a class="nav-link active left_color" data-toggle="tab" href="#register">
                                            1. Create a free account and Login<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu1">
                                            2. Upload Your Files<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#copies">
                                           3. Pick Number of Copies<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#job_name">
                                       4. Give a Job Name<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#additional_service">
                                           5. Select Extra Services(if you need)<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           6. Click the "request a quotation" button<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           7. We will send you a quotation within a few minutes<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           8. Approve the quotation and payment by Online<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           9. Let we "do the clipping"<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           10. Order Status is complete(in Personal area)<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#menu4">
                                           11. Download the processed images<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                </ol>
                            </div>

                            <div class="col-md-7">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="register" class="container tab-pane active"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Registration Process</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/login.png')?>" alt="">
                                    </div>
                                    <div id="menu1" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Fillup Requirements</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/upload_file.png')?>" alt="">
                                    </div>
                                    <div id="copies" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Give Number Of Copies You Want to Do</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/copy_number.png')?>" alt="">
                                    </div>
                                    <div id="job_name" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Give A Job Name</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/job_name.png')?>" alt="">
                                    </div>
                                    <div id="additional_service" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Additional Services</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/extra_service.png')?>" alt="">
                                    </div>
                                </div>
                            </div>

                        
                    </div>
                    <p style="color: red; font-size: 16px;">PS. You will receive an email as soon as each episode has passed</p>
                    <p>That's it</p>
                    <br><br><br>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Product Category</h1>
                            </div>
                            <div class="col-md-4">
                                <p class="small_color">Let photoot.com do the clip</p>
                                <p class="small_color">A few simple steps for <span style="color: #dc3545; font-weight: 600;">Product Category</span></p>
                                <ol class="nav flex-column">
                                    <li class="nav-item br-un" data-target="#home">
                                        <a class="nav-link active left_color" data-toggle="tab" href="#register_2">
                                            1. Create a free account and Login<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#pro_frm_cat">
                                           2. Choose products with category<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#num_of_cop">
                                           3. Pick Number of Copies<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#job_name_2">
                                           4. Give a Job Name<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#additional_services_2">
                                           5. Select Extra Services(if you need)<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           6. Select Delivery Time<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           7. Click the "Add to cart" button<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           8. Approve the order and payment by Online<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           9. Go to the "Personal Area"<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                            10. Click the "My Orders"<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                            11. Upload Your Files<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                            12. Let we "do the clipping"<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           13. Order Status is Complete(in Personal Area)<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item br-un">
                                        <a class="nav-link left_color" data-toggle="tab" href="#">
                                           14. Download the processed Images<span class="text"><i class="fa fa-chevron-right" ></i></span>
                                        </a>
                                    </li>
                                </ol>
                            </div>

                            <div class="col-md-7">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="register_2" class="container tab-pane active"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Registration Process</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/registration.png')?>" alt="">
                                    </div>
                                    <div id="pro_frm_cat" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Select Product From Category</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/product_from_category.png')?>" alt="">
                                    </div>
                                    <div id="num_of_cop" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Number Of Copies You Want To Proceed</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/number_of_copies.png')?>" alt="">
                                    </div>
                                    <div id="job_name_2" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Give a Job Name</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/additional_services.png')?>" alt="">
                                    </div>
                                    <div id="additional_services_2" class="container tab-pane fade"><br>
                                        <h4 class="text-danger" style="text-transform: uppercase;">Add Additional Services</h4>
                                        <img class="service_image" src="<?=base_url('front_assets/how_it_works/additional_services.png')?>" alt="">
                                    </div>
                                </div>
                            </div>

                        
                    </div>
                    <p style="color: red; font-size: 16px;">PS. You will receive an email as soon as each episode has passed</p>
                    <p>That's it</p> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter -->
<?php include 'newsletter.php'; ?>
<!-- // Newsletter -->
<?php include 'footer.php'; ?>
