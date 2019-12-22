<?php 
// echo set_title('title', 'User');
echo add_assets('header', 
    array(
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/bower_components/select2/dist/css/select2.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/plugins/bootoast/bootoast.min.css').'">',
        '<link rel="stylesheet" href="'.base_url('assets/css/trainee.css').'">',
    )
);
?>
<style type="text/css">
    #blah{
        max-width: 180px;
    }
</style>


<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <h1>Add Product</h1>
                <?php echo form_open_multipart('frontend/dropboxed'); ?>

            	<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
            				<label for="Name">Product Name: </label>
                            <?= form_error('name'); ?>
            				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Product Name', 'name' => 'name', 'value' => set_value('name')]); ?>
            			</div>
            		</div>
            	</div>
            
            	<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
            				<label for="Image">Product Image: </label>
            				<?php echo form_input(['class' => 'form-control','type' => 'file', 'onchange' => 'readURL(this)' ,'name' => 'drop' ]); ?>
            			</div>
                        <img id="blah" src="" alt="your image">
            		</div>
            	</div>
            
            	<?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-info', 'value' => 'Submit']); ?>
            	<?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-danger', 'value' => 'Reset']); ?>
            	<?php echo form_close(); ?>
            	
            </div>
        </div>
    </section>
</div>


<?php 
echo add_assets('footer', 
    array(
        '<script src="'.base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js').'"></script>',
        '<script src="'.base_url('assets/plugins/bootoast/bootoast.min.js').'"></script>',
        '<script src="'.base_url('assets/bower_components/select2/dist/js/select2.full.min.js').'"></script>',
        '<script src="'.base_url('assets/scripts/products.js').'"></script>',
    )
);
?>
