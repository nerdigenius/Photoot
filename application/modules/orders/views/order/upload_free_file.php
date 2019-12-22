<?php 
// echo set_title('title', 'User');
echo add_assets('header', 
    array(
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/select2/dist/css/select2.min.css').'">',
        // '<link rel="stylesheet" href="'.base_url('assets/plugins/bootoast/bootoast.min.css').'">',
        // '<link rel="stylesheet" href="'.base_url('assets/css/trainee.css').'">',
        '<link rel="stylesheet" type="text/css" href="'.base_url('front_assets/orders/css/DT_bootstrap.css').'" >',
        '<link rel="stylesheet" type="text/css" href="'.base_url('front_assets/orders/css/bootstrap.css').'" >'
    )
);
?>


<style>
      body {
        padding-top: 60px;
      }
      @media (max-width: 767px) {
        .description {
          display: none;
        }
      }
      .show{
        opacity: 1;
      }


    </style>


            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Trainee
                        <small>Assign trainee to a batch</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard">HOme</i></a></li>
                        <li class="active">users</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="container box">
                        <div class="account-page-area ptb-30">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">
                            <h2 style="color:blue; text-align:center;">Upload Your Files</h2>

                            <form name="free_order" id="free_order" action="javascript:void(0);" enctype="multipart/form-data">  
                                <input type="hidden" name="fixed_id" value="<?=$fixed_id;?>">

                              <div style="width: 31%; margin-bottom: 8px;">
                                <input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files" />
                              </div>      
                              
                              <div style="margin-bottom: 8px;">
                                <!-- <input style="padding: 7px; width: 140px; margin: 13px 0px" type="submit" value="Upload" /> -->
                              <button type="submit" class="btn btn-success">Upload</button>
                              </div>
                            
                            </form>

                            <table class="table table-striped table-bordered" style="width:60%;" id="add_files">
                              <thead>
                                <tr>
                                  <th style="color:blue; text-align:center;">File Name</th>
                                  <th style="color:blue; text-align:center;">Status</th>
                                  <th style="color:blue; text-align:center;">File Size</th>
                                  <th style="color:blue; text-align:center;">Action</th>
                                  <tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                            </table>
                        </div>
                        
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped">
                          <tbody class="files"></tbody>
                        </table>
                      </form>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Demo Notes</h3>
                        </div>
                        <div class="panel-body">
                          <ul>
                            <li>
                              The maximum file size for uploads in this demo is
                              <strong>999 KB</strong> (default file size is unlimited).
                            </li>
                            <li>
                              Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in
                              this demo (by default there is no file type restriction).
                            </li>
                            <li>
                              Uploaded files will be deleted automatically after
                              <strong>5 minutes or less</strong> (demo files are stored in
                              memory).
                            </li>
                            <li>
                              You can <strong>drag &amp; drop</strong> files from your desktop
                              on this webpage (see
                              <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a >).
                            </li>
                            <li>
                              Please refer to the
                              <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a>
                              and
                              <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a>
                              for more information.
                            </li>
                            <li>
                              Built with the
                              <a href="https://getbootstrap.com/">Bootstrap</a> CSS framework
                              and Icons from <a href="https://glyphicons.com/">Glyphicons</a>.
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- The blueimp Gallery widget -->
                    <!-- <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                      <div class="slides"></div>
                      <h3 class="title"></h3>
                      <a class="prev">‹</a>
                      <a class="next">›</a>
                      <a class="close">×</a>
                      <a class="play-pause"></a>
                      <ol class="indicator"></ol>
                    </div> -->
                </div>
            </div>
                    </div>
                </section>
            </div>
            <!--// Account Page Area -->
            

            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

            
                              

                    </div>
                </div>
            </div>          


<?php 
echo add_assets('footer', 
    array(
        '<script src="'.base_url('front_assets/orders/js/bootstrap.js').'"></script>',
        // '<script src="'.base_url('front_assets/orders/upload_file/js/jquery.js').'"></script>',
        // '<script src="'.base_url('front_assets/orders/upload_file/js/jquery_1.5.2.js').'"></script>',
        // '<script src="'.base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js').'"></script>',
        // '<script src="'.base_url('assets/plugins/bootoast/bootoast.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/select2/dist/js/select2.full.min.js').'"></script>',
        '<script src="'.base_url('front_assets/orders/js/jquery.dataTables.js').'"></script>',
        '<script src="'.base_url('front_assets/orders/js/DT_bootstrap.js').'"></script>',
        '<script src="'.base_url('front_assets/orders/js/vpb_uploader.js').'"></script>'
        // '<script src="'.base_url('assets/scripts/trainee.js').'"></script>',
        // '<script src="'.base_url('assets/scripts/enrol.js').'"></script>'
    )
);
?>


