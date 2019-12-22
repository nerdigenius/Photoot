<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'dynamic_nav'));
        $this->load->helper(array('url', 'language', 'form_helper', 'template_helper'));
        $this->lang->load('auth');
        // $this->load->model('crud_model');
        $this->load->model(array('category_model'));
        $this->form_validation->set_error_delimiters(
            $this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth')
        );
        $this->data['user']    = $this->ion_auth->user()->row();
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['users']   = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user) {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('/', 'refresh');
        }
    }
    
    public function index()
    {
        $this->data = array(
            'title' => 'Category List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'category_lists' => $this->category_model->category_list(),
        );
        $this->page = 'category/category_lists';
        $this->layout();
    }

    public function new(){
        
    }

    public function sub_categories_list()
    {
        $this->data = array(
            'title' => 'Sub Category List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'sub_category_lists' => $this->category_model->sub_category_lists(),
        );
        $this->page = 'category/sub_category_lists';
        $this->layout();
    }
    
    public function add()
    {
        $this->data = array(
            'title' => 'Add Category',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
        );
        $this->page = 'category/add';
        $this->layout();
    }
    
    public function added()
    {
        $this->form_validation->set_rules('name', 'Category Name', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $category_name = [
                'name' => $this->input->post('name'),
                'category_image' => $this->do_upload('category_image')
                ];
            // echo $category_name; exit();
                // print_r($category_name); exit();
            if($this->category_model->category_add($category_name)){
                redirect('categories/index');
            }else{
                redirect('categories/add');
            }
        }else{
            $this->data = array(
            'title' => 'Add Category',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/add';
            $this->layout();
        }
    }

    private function do_upload($value)
    {
        $type = explode('.', $_FILES[$value]["name"]);
        $type = $type[count($type)-1];
        $url = "./assets/uploads/categories/".uniqid(rand()).'.'.$type;
        if(in_array($type, array("jpg","jpeg","gif","png")))
            if(is_uploaded_file($_FILES[$value]["tmp_name"]))
                if(move_uploaded_file($_FILES[$value]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function edit_category($category_id){
        $this->data = array(
            'title' => 'Edit Category',
            'category' => $this->category_model->fetch_category($category_id),
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/category_edit';
            $this->layout();
    }

    public function edited_category(){
        $this->form_validation->set_rules('name', 'Category Name', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $category_name = [
                'name' => $this->input->post('name'),
                'category_image' => $this->do_upload('category_image')
                ];
                $id = $this->input->post('txt_hidden');
                
            if($this->category_model->category_update($id, $category_name)){
                redirect('categories/index');
            }else{
                redirect('categories/edit_category/'.$id);
            }
        }else{
            $this->data = array(
            'title' => 'Edit Product',
            'category_lists' => $this->category_model->category_list(),
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/category_lists';
            $this->layout();
        }
    }

    public function delete_category($category_id){
        $delete_category = $this->category_model->delete_category($category_id);
        if($delete_category){
            redirect('categories/index');
        }else{
            redirect('categories/index');
        }
    }

    
    public function add_sub_categories()
    {
        $this->data = array(
            'title' => 'Add Sub Category',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'category' => $this->category_model->category_list(),
        );
        // $this->data['category'] = $this->category_model->category_list();
        // print_r($data['category']); exit();
        $this->page = 'category/add_sub_categories';
        $this->layout();
    }
    
    public function added_sub_categories()
    {
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_description', 'Sub Category Description', 'required|trim');
        $this->form_validation->set_rules('current_price', 'Current Price', 'required|trim');
        $this->form_validation->set_rules('previous_price', 'Previous Price', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $sub_category_info = [
                'category_id' => $this->input->post('category_id'),
                'sub_category_name' => $this->input->post('sub_category_name'),
                'sub_category_image' => $this->do_upload('sub_category_image'),
                'sub_category_description' => $this->input->post('sub_category_description'),
                'current_price' => $this->input->post('current_price'),
                'previous_price' => $this->input->post('previous_price'),
                ];
                // print_r($sub_category_info); exit();
            // echo $category_name; exit();
            if($this->category_model->sub_category_add($sub_category_info)){
                redirect('categories/sub_categories_list');
            }else{
                redirect('categories/add_sub_categories');
            }
        }else{
            $this->data = array(
            'title' => 'Add Sub Category',
            'category' => $this->category_model->category_list(),
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/add_sub_categories';
            $this->layout();
        }
    }


    public function edit_sub_category($sub_category_id){
        $this->data = array(
            'title' => 'Edit Product',
            'sub_category' => $this->category_model->fetch_sub_category($sub_category_id),
            'category' => $this->category_model->category_list(),
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/sub_category_edit';
            $this->layout();
    }

    public function edited_sub_category(){
        $this->form_validation->set_rules('name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_description', 'Sub Category Description', 'required|trim');
        $this->form_validation->set_rules('current_price', 'Current Price', 'required|trim');
        $this->form_validation->set_rules('previous_price', 'Previous Price', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $sub_category_info = [
                'category_id' => $this->input->post('category_id'),
                'sub_category_name' => $this->input->post('name'),
                'sub_category_image' => $this->do_upload('sub_category_image'),
                'sub_category_description' => $this->input->post('sub_category_description'),
                'current_price' => $this->input->post('current_price'),
                'previous_price' => $this->input->post('previous_price'),
                ];
                $id = $this->input->post('txt_hidden');
                
            if($this->category_model->sub_category_update($id, $sub_category_info)){
                redirect('categories/sub_categories_list');
            }else{
                redirect('categories/edit_sub_category/'.$id);
            }
        }else{
            $this->data = array(
            'title' => 'Edit Product',
            'sub_category_lists' => $this->category_model->sub_category_lists(),
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            );
            $this->page = 'category/sub_category_lists';
            $this->layout();
        }
    }

    public function delete_sub_category($sub_category_id){
        $delete_sub_category = $this->category_model->delete_sub_category($sub_category_id);
        if($delete_category){
            redirect('categories/sub_categories_list');
        }else{
            redirect('categories/sub_categories_list');
        }
    }


    public function layout()
    {
        $this->template['header']          = $this->load->view('templates/header', $this->data, true);
        $this->template['footer']          = $this->load->view('templates/footer', $this->data, true);
        $this->template['sidebar']         = $this->load->view('templates/sidebar', $this->data, true);
        $this->template['control_sidebar'] = $this->load->view('templates/control_sidebar', $this->data, true);
        $this->template['page']            = $this->load->view($this->page, $this->data, true);
        $this->load->view('templates/main', $this->template);
    }
}
