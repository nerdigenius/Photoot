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
                            <th class="text-center">Category ID</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Category Image</th>
                            <th class="text-center">Created On</th>
                            
                        </tr>
                    </thead>

                    <?php foreach($category as $list): ?>

                    <tbody>
                        <tr>
                            <td align="center"><?= $list->category_id; ?></td>
                            <td align="center"><?= $list->name; ?></td>
                            <td align="center">
                                <?php if($list->category_image != null){ ?>
                                    <img src="<?php echo base_url($list->category_image); ?>" alt="Category Image">
                                    <?php }else{ ?>
                                        <img src="" alt="no_image_found">
                                    <?php } ?>
                            </td>
                            <td align="center"><?= $list->created_on; ?></td>
                            
                        </tr>
                    </tbody>

                    <?php endforeach; ?>
                </table>

            <h1>Edit Product</h1>
            <?php foreach($category as $list): ?>
                <?php echo form_open_multipart('categories/edited_category'); ?>

                <input type="hidden" name="txt_hidden" value="<?= $list->category_id; ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Name">Category Name: </label>
                            <?= form_error('name'); ?>
                            <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'value' => $list->name]); ?>
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
