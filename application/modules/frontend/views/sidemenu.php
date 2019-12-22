<div class="sidebar mt-30">
    <a href="<?=base_url('frontend/try_it_free');?>" class="side-single-menu bg-success">
        TRY IT FREE
    </a>
    <a href="<?=base_url('frontend/custom_quote');?>" class="side-single-menu bg-warning">
        CUSTOM QUOTE
    </a>
    <div class="catmenu catmenu-2">
        <button class="catmenu-trigger is-active">
            <span>Services & Prices</span>
        </button>
        <nav class="catmenu-body">
            <ul>
                <div class="list-group">
                    <?php 
                        $newArray = array();
                        foreach ($values as $key => $value) {
                            $newArray[$value['name']][] = $value; // sort as per category name
                        }
                    ?>
                    <?php  
                    foreach($newArray as $key => $value) { ?>
                        <a href="<?= base_url('frontend/to_category/').$value[0]['category_id']; ?>" class="list-group-item list-group-item-secondary">
                            <?=$key;?>
                        </a>
                        <?php foreach ($value as $final_value) { ?>
                            <a href="<?= base_url('frontend/single_product/').$final_value['sub_category_id']; ?>" class="list-group-item list-group-item-action">
                                <?php echo $final_value["sub_category_name"]; ?></b>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>               
            </ul>
        </nav>
    </div>
</div>
<!--// Category Menu -->
