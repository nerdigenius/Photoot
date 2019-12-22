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

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Trainee
            <small>Assign trainee to a batch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Users</a></li> -->
            <li class="active">Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <h1>Add Category</h1>
                
                <?php echo form_open_multipart('categories/added'); ?>

            	<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
            				<label for="Name">Category Name: </label>
            				<?= form_error('name'); ?>
            				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Category Name', 'name' => 'name', 'value' => set_value('name')]); ?>
            			</div>
            		</div>
            	</div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Image">Category Image: </label>
                            <?php echo form_input(['class' => 'form-control','type' => 'file', 'name' => 'category_image' ]); ?>
                        </div>
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
        '<script src="'.base_url('assets/scripts/trainee.js').'"></script>',
        '<script src="'.base_url('assets/scripts/enrol.js').'"></script>',
    )
);
?>
