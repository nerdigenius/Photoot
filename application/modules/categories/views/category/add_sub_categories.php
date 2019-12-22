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
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

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
                <h1>Add Sub Category</h1>
                
                <?php echo form_open_multipart('categories/added_sub_categories'); ?>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Category Name">Category Name: </label>
                            <?= form_error('category_id'); ?>
                            <select name="category_id">
                                <option selected> Select Category</option>
                                <?php foreach($category as $data): ?>
                                <option value="<?= $data->category_id; ?>"><?= $data->name; ?></option>
                                <?php endforeach; ?>
                             </select> 
                        </div>
                    </div>
                </div>

            	<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
            				<label for="sub_category_name">Sub Category Name: </label>
            				<?= form_error('sub_category_name'); ?>
            				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Category Name', 'name' => 'sub_category_name', 'value' => set_value('sub_category_name')]); ?>
            			</div>
            		</div>
            	</div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Image">Sub Category Image: </label>
                            <?php echo form_input(['class' => 'form-control','type' => 'file', 'onchange' => 'readURL(this)' ,'name' => 'sub_category_image' ]); ?>
                        </div>
                        <img id="blah" src="" alt="your image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="sub_category_name">Sub Category Description: </label>
                            <?= form_error('sub_category_description'); ?>
                            <?php echo form_textarea(['class' => 'form-control', 'placeholder' => 'Enter Description', 'name' => 'sub_category_description', 'value' => set_value('sub_category_description')]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="current_price">Current Price: </label>
                            <?= form_error('current_price'); ?>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Current Price', 'name' => 'current_price', 'value' => set_value('current_price')]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="previous_price">Previous Price: </label>
                            <?= form_error('previous_price'); ?>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Previous Price', 'name' => 'previous_price', 'value' => set_value('previous_price')]); ?>
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
