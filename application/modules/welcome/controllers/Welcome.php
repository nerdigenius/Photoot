<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'dynamic_nav'));
        $this->load->helper(array('url', 'language', 'form_helper', 'template_helper'));
        $this->lang->load('auth');
        // $this->load->model('crud_model');
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
            'name' => 'Sultan',
            'age' => '30',
            'title' => 'Basic Setup',
            'user' => 'Fahim',
            'created_at' => '2019-07-22 02:54:34',
        );
        // $this->load->view('welcome/index', $data);
        $this->page = 'welcome/index';
        $this->layout();
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
