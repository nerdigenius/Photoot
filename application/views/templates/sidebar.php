<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url()?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $name; ?></p>
            </div>
        </div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <?php echo $this->dynamic_nav->single_item('dashboard','fa fa-dashboard', 'DASHBOARD'); ?>
    
    <?php echo $this->dynamic_nav->tree_item('order', 'fa fa-users text-aqua', 'ORDER'); ?>
    
    <?php echo $this->dynamic_nav->tree_item('category', 'fa fa-users text-aqua', 'CATEGORY'); ?>

    <?php echo $this->dynamic_nav->tree_item('services', 'fa fa-users text-aqua', 'SERVICES'); ?>    
    
    <!-- <?php echo $this->dynamic_nav->tree_item('user', 'fa fa-users text-aqua', 'USER'); ?> -->
    <!-- <li class="header">Quick Links</li> -->
    <!-- <li class="header">Quick Links</li> -->
</ul>
</section>
<!-- /.sidebar -->
</aside>
