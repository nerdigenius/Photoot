<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'dynamic_nav'));
        $this->load->helper(array('url', 'language', 'form_helper', 'template_helper'));
        $this->lang->load('auth');
        // $this->load->model('crud_model');
        $this->load->model(array('service_model'));
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
    
    public function list()
    {
        $this->data = array(
            'title' => 'Service List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'service_list' => $this->service_model->service_list(),
        );
        $this->page = 'service/list';
        $this->layout();
    }

    public function new()
    {
        $this->data = array(
            'title' => 'Service Add',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            
        );
        $this->page = 'service/add';
        $this->layout();
    }

    public function added()
    {
        $this->form_validation->set_rules('service_name', 'Service Name', 'required|trim');
        $this->form_validation->set_rules('service_description', 'Service Description', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $service = [
                'service_name' => $this->input->post('service_name'),
                'service_icon' => $this->do_upload('service_icon'),
                'service_image' => $this->do_upload('service_image'),
                'service_description' => $this->input->post('service_description')
                ];
                
            if($this->service_model->add($service)){
                redirect('services/index');
            }else{
                redirect('services/new');
            }
        }else{
            $this->data = array(
            'title' => 'Service Add',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            
            );
            $this->page = 'service/add';
            $this->layout();
            }
        }


     
     public function add_additional()
     {
        $this->data = array(
            'title' => 'Add Additional Service',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            // 'service_list' => $this->service_model->service_list(),
        );
        $this->page = 'service/add_additional';
        $this->layout();
     }

     public function added_additional()
     {
        $this->form_validation->set_rules('service_name', 'Service Name', 'required|trim');
        $this->form_validation->set_rules('service_value', 'Service Value', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $service = [
                'service_name' => $this->input->post('service_name'),
                'service_value' => $this->input->post('service_value'),
                'service_status' => $this->input->post('service_status'),
                ];

                // var_dump($service); exit();
                
            if($this->service_model->add_additonal($service)){
                redirect('services/list_additional');
            }else{
                redirect('services/add_additional');
            }
        }else{
            $this->data = array(
            'title' => 'Service Add',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            
            );
            $this->page = 'service/add';
            $this->layout();
            }
     }

     public function list_additional()
     {
        $this->data = array(
            'title' => 'Additional Service List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'service_list' => $this->service_model->additional_service_list(),
        );
        $this->page = 'service/list_additional';
        $this->layout();
     }   



     public function add_charge()
     {
        $this->data = array(
            'title' => 'Additional Service List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
        );
        $this->page = 'service/add_charge';
        $this->layout();
     }

     public function added_charge()
     {
        $this->form_validation->set_rules('charge_hours', 'Charge Hours', 'required|trim');
        $this->form_validation->set_rules('charge_value', 'Charge Value', 'required|trim');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run()){
            $charge = [
                'charge_hours' => $this->input->post('charge_hours'),
                'charge_value' => $this->input->post('charge_value'),
                ];

            // var_dump($charge); exit();
                
            if($this->service_model->add_charge($charge)){
                redirect('services/list_charge');
            }else{
                redirect('services/add_charge');
            }
        }else{
            $this->data = array(
            'title' => 'Service Add',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            
            );
            $this->page = 'service/add_charge';
            $this->layout();
            }
     }

     public function list_charge()
     {
        $this->data = array(
            'title' => 'Additional Service List',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'charge_list' => $this->service_model->charge_list(),
        );
        $this->page = 'service/list_charge';
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

    private function do_upload($value)
    {
        $type = explode('.', $_FILES[$value]["name"]);
        $type = $type[count($type)-1];
        $url = "./assets/uploads/services/".uniqid(rand()).'.'.$type;
        if(in_array($type, array("jpg","jpeg","gif","png")))
            if(is_uploaded_file($_FILES[$value]["tmp_name"]))
                if(move_uploaded_file($_FILES[$value]["tmp_name"], $url))
                    return $url;
        return "";
    }
}
