<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class: Dynamic_nav
 * @todo Future Improvement
 * Author: Rakibul Hasan Khan
 * Email: raakiiib@gmail.com
 */
class Dynamic_nav
{
    protected $CI;
    protected $page;
    protected $subPage;


    public function __construct()
    {
        $this->CI = &get_instance();
        $this->page = $this->CI->uri->segment(1);
        $this->subPage = $this->CI->uri->segment(2);
    }

    /**
     * @param  string $name  Name of the navigation menu
     * @param  string $title  Title of the navigation menu
     * @return html    print single navigation menu
     */
    public function single_item($name, $icon, $title)
    {
        switch ($name) {
            case $name:
                $item_li = array(
                    array(
                        'text' => '<i class="'.$icon.'"></i> <span>'.$title.'</span><span class="pull-right-container"></span>',
                        'url' => $name,
                        'attr' => array(
                            'title' => $title,
                        )
                    )
                );
                break;
            default:
                $item_li = array('No item found');
                break;
        }


        $single_item_html = '';
        foreach ($item_li as $value) {
            // Addig class 'active' to the selected item
            if( $value['url'] === $this->page ){
                $activeTree = 'active';
            }else{
                $activeTree = '';
            }
            // Generating HTML for the single menu item
            $single_item_html .= '<li class="' .$activeTree .'">';
            $single_item_html .= anchor($value['url'], $value['text'], $value['attr']);
            $single_item_html .= '</li>';
        }
        return $single_item_html;
    }

    /**
     * Generate tree items of a navigation menu
     * @param  string $name  navigation item. this must match with primary url/ controller name
     * @param  string $icon  navigation icon.
     * @param  string $title navigation title
     * @return html        return navigation list
     * @todo  assigned for future improvements
     */
    public function tree_item($name, $icon, $title)
    {
        $current_url = array();
        $item_li = array();
        switch ($name) {
            case 'order':
                $item_li = array(
                    array(
                        'text' => '<i class="fa fa-user text-aqua"></i> Orders List </a>',
                        'url'  => 'orders/index',
                        'attr' => array('title' => 'List all orders'),
                    ),
                    array(
                        'text' => '<i class="fa fa-user text-aqua"></i>Free Orders List </a>',
                        'url'  => 'orders/free_order',
                        'attr' => array('title' => 'List all free orders'),
                    ),
                    array(
                        'text' => '<i class="fa fa-user text-aqua"></i>Custom Quote</a>',
                        'url'  => 'orders/custom_quote',
                        'attr' => array('title' => 'Custom Quote List'),
                    ),
                );
                break;
            case 'category':
                $item_li = array(
                    array(
                        'text' => '<i class="fa fa-file-text-o text-yellow"></i> Category List</a>',
                        'url'  => 'categories/index',
                        'attr' => array('title' => 'All Category'),
                    ),
                    array(
                        'text' => '<i class="fa fa-file-text-o text-pink"></i> Sub Category List</a>',
                        'url' => 'categories/sub_categories_list',
                        'attr' => array('title' => 'All Sub Categories'),
                    ),
                    array(
                        'text' => '<i class="fa fa-users text-orange"></i> Add Category</a>',
                        'url'  => 'categories/add',
                        'attr' => array('title' => 'Add Category'),
                    ),
                    array(
                        'text' => '<i class="fa fa-users text-red"></i> Add Sub Category</a>',
                        'url' => 'categories/add_sub_categories',
                        'attr' => array('title' => 'Add Sub Category'),
                    ),
                );
                break;
            case 'services':
                $item_li = array(
                    array(
                        'text' => '<i class="fa fa-plus-square-o text-blue"></i> Add new service</a>',
                        'url'  => 'services/new',
                        'attr' => array('title' => 'Add new service'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i> List all services</a>',
                        'url'  => 'services/list',
                        'attr' => array('title' => 'List all services'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i>Add additional services</a>',
                        'url'  => 'services/add_additional',
                        'attr' => array('title' => 'Add additional services'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i>List all additional services</a>',
                        'url'  => 'services/list_additional',
                        'attr' => array('title' => 'List all additional services'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i>Add Delivery Charge</a>',
                        'url'  => 'services/add_charge',
                        'attr' => array('title' => 'Add Delivery Charge'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i> List Delivery Charge</a>',
                        'url'  => 'services/list_charge',
                        'attr' => array('title' => 'List Delivery Charge'),
                    ),
                );
                break;
            case 'user':
                $item_li = array(
                    array(
                        'text' => '<i class="fa fa-plus-square-o text-blue"></i> Add new user</a>',
                        'url'  => 'user/create_user',
                        'attr' => array('title' => 'Add new user'),
                    ),
                    array(
                        'text' => '<i class="fa fa-list-alt text-aqua"></i> List all users</a>',
                        'url'  => 'user/edit',
                        'attr' => array('title' => 'List all users'),
                    ),
                );
                break;
            default:
                # code...
                break;
        }

        // Name of parent tree item
        $default = array(
            'text' => '<i class="'.$icon.'"></i> <span>' . $title . '</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
            'url'  => '#',
            'attr' => array('title' => $title),
        );
        
        /**
         * Getting Url To Active Item
         */
        if( !empty($this->subPage) ){
            $pageStrctr = $this->page.'/'.$this->subPage;
        }else{
            $pageStrctr = $this->page;
        }
        
        // _________________________________________________//
        // Activate Parent Name While a Sub Item is Selected//
        // _________________________________________________//
        if( $name === $this->page ){
            $activeTree = 'active';
        }else{
            $activeTree = '';
        }
        $tree_item_html = '<li class="treeview'.' '.$activeTree.'">';
        $tree_item_html .= anchor($default['url'], $default['text'], $default['attr']);
        $tree_item_html .= '<ul class="treeview-menu">';
        
        // Generate Sub Items of the Tree Menu
        foreach ($item_li as $value) {

            $realUrl = $value['url'];
            // Compare urls
            if($realUrl == $pageStrctr){
                $activeLiItm = 'active';
            }else{
                $activeLiItm = '';
            }
            // Submenu HTML
            $tree_item_html .= '<li class="'.$activeLiItm.'">';
            $tree_item_html .= anchor($value['url'], $value['text'], $value['attr']);
            $tree_item_html .= '</li>';
        }
        $tree_item_html .= '</ul>';
        $tree_item_html .= '</li>';
        return $tree_item_html;
    }

}
