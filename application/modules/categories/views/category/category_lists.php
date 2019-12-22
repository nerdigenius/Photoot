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
                <h1>Category Lists</h1>
                <table border="1px solid red" id="example" class="display " style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Category ID</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Category Image</th>
                            <th class="text-center">Created On</th>
                            <th class="text-center">Updated On</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <?php foreach($category_lists as $lists): ?>

                    <tbody>
                        <tr>
                            <td align="center"><?= $lists->category_id; ?></td>
                            <td align="center"><?= $lists->name; ?></td>
                            <td align="center">
                                <?php if($lists->category_image != null){ ?>
                                    <img src="<?php echo base_url($lists->category_image); ?>" alt="Category Image">
                                    <?php }else{ ?>
                                        <img src="" alt="no_image_found">
                                    <?php } ?>
                            </td>
                            <td align="center"><?= $lists->created_on; ?></td>
                            <td align="center"><?= $lists->updated_on; ?></td>
                            <td align="center"><a href="<?= base_url('categories/edit_category/').$lists->category_id; ?>" class="btn btn-info">Edit</a><a href="<?= base_url('categories/delete_category/').$lists->category_id; ?>" onclick="return confirm('Do you really want to delete this product?');" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </tbody>

                    <?php endforeach; ?>
                </table>

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


