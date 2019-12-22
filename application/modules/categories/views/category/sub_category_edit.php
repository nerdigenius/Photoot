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
    .content td img {
    width: 130px;
    height: 80px;
    object-fit: cover;
    margin: 10px;
}
</style>

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
                <h1>Products List</h1>
             

                    <table border="1px solid red" id="example" class="display " style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Sub Category ID</th>
                            <th class="text-center">Category ID</th>
                            <th class="text-center">Sub Category Name</th>
                            <th class="text-center">Sub Category Image</th>
                            <th class="text-center">Sub Category Description</th>
                            <th class="text-center">Current Price</th>
                            <th class="text-center">Previous Price</th>
                            <th class="text-center">Created On</th>
                            <th class="text-center">Updated On</th>
                            
                        </tr>
                    </thead>

                    <?php foreach($sub_category as $list): ?>

                    <tbody>
                        <tr>
                            <td align="center"><?= $list->sub_category_id; ?></td>
                            <td align="center"><?= $list->category_id; ?></td>
                            <td align="center"><?= $list->sub_category_name; ?></td>
                            <td align="center">
                                <?php if($list->sub_category_image != null){ ?>
                                    <img src="<?php echo base_url($list->sub_category_image); ?>" alt="product_image">
                                    <?php }else{ ?>
                                        <img src="" alt="no_image_found">
                                    <?php } ?>
                            </td>
                            <td align="center"><?= $list->sub_category_description; ?></td>
                            <td align="center"><?= $list->current_price; ?></td>
                            <td align="center"><?= $list->previous_price; ?></td>
                            <td align="center"><?= $list->created_on; ?></td>
                            <td align="center"><?= $list->updated_on; ?></td>
                            
                        </tr>
                    </tbody>

                    <?php endforeach; ?>
                </table>

            <h1>Edit Product</h1>
            <?php foreach($sub_category as $list): ?>
                <?php echo form_open_multipart('categories/edited_sub_category'); ?>

                <input type="hidden" name="txt_hidden" value="<?= $list->sub_category_id; ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Name">Category: </label>
                            <?= form_error('category_id'); ?>
                            <select name="category_id">
                                <option selected><?php echo $list->category_id; ?></option>
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
                            <label for="Name">Sub Category Name: </label>
                            <?= form_error('name'); ?>
                            <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'value' => $list->sub_category_name]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Image">Sub Category Image: </label>
                            <?php echo form_input(['class' => 'form-control','type' => 'file', 'name' => 'sub_category_image' ]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="sub_category_name">Sub Category Description: </label>
                            <?= form_error('sub_category_description'); ?>
                            <?php echo form_textarea(['class' => 'form-control', 'name' => 'sub_category_description', 'value' => $list->sub_category_description]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="current_price">Current Price: </label>
                            <?= form_error('current_price'); ?>
                            <?php echo form_input(['class' => 'form-control', 'name' => 'current_price', 'value' => $list->current_price]); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="previous_price">Previous Price: </label>
                            <?= form_error('previous_price'); ?>
                            <?php echo form_input(['class' => 'form-control', 'name' => 'previous_price', 'value' => $list->previous_price]); ?>
                        </div>
                    </div>
                </div>
            
                <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-info', 'value' => 'Update']); ?>
                <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-danger', 'value' => 'Reset']); ?>
                <?php echo form_close(); ?>   

                <?php endforeach; ?> 

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
