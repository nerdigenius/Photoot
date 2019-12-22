<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
    {
       parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'dynamic_nav'));
        $this->load->helper(array('url', 'language', 'form_helper', 'template_helper'));
        $this->lang->load('auth');
        $this->load->model('order_model');
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
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'show_file' => $this->order_model->show_file(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/all_orders';
        $this->layout();
    }

    public function free_order()
    {
        $this->data = array(
            'title' => 'All Free Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'show_file' => $this->order_model->show_free_order(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/all_free_orders';
        $this->layout();
    }

    public function view_free_file($fixed_id)
    {
        $this->data = array(
            'title' => 'All Free Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'show_file' => $this->order_model->free_file_view($fixed_id),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/free_file_view';
        $this->layout();
    }

    public function upload_free_file($fixed_id)
    {
        $this->data = array(
            'title' => 'View Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'fixed_id' => $fixed_id,
            // 'file' => $this->order_model->file(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/upload_free_file';
        $this->layout();
    }

    public function free_file_upload()
    {
        if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
            $vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
            $vpb_file_size = $_FILES['upload_file']['size']; // File Size
            $vpb_uploaded_files_location = 'front_assets/try_it_free/file_by_admin/'; //This is the directory where uploaded files are saved on your server
            $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
            //Without Validation and does not save filenames in the database
            if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
            {
                //Display the file id
                // echo $vpb_file_id;

                $data = $_POST;
                echo json_encode($data);
                $this->db->insert('free_order_upload_by_admin',$data);

            }
            else
            {
                //Display general system error
                // echo 'general_system_error';
                echo json_encode('general_system_error');
            }

        }
    }

    public function update_free_order_status()
    {
        $fixed_id = $this->input->post('fixed_id');
        $data = [
            'status' => $this->input->post('order_status'),
        ];
        $status = $this->input->post('order_status');

        //email

        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'Sultanul_Arefin',
            'smtp_pass' => '152154FT3939',
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $username = "fahim";
        $user_email = $this->order_model->get_user_id($fixed_id);
        $user_id = $user_email->user_id;
        $get_email = $this->order_model->get_user_email($user_id);
        $u_mail =  $get_email->email;

        $this->email->from('admin@photoot.com', 'photoot');
        $this->email->to($u_mail);
        $this->email->cc('hello');
        $this->email->bcc('world');
        $this->email->subject('Email Test');
        $this->email->message("Your Free Order Status Is ".$status);
        if($this->email->send())
        {
            echo "";
        }
        else
        {
            echo "Error occured";
        }

        $update = $this->order_model->update_free_order_status($data, $fixed_id);

        $this->data = array(
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
           'show_file' => $this->order_model->show_free_order(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/all_free_orders';
        $this->layout();
    }

    public function view_file($order_id)
    {
        $this->data = array(
            'title' => 'View Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'view_file' => $this->order_model->view_file($order_id),
            // 'file' => $this->order_model->file(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/individual_order';
        $this->layout();
    }

    public function upload_files($order_id)
    {
        $this->data = array(
            'title' => 'View Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'upload_file' => $this->order_model->upload_file($order_id),
            // 'file' => $this->order_model->file(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/upload_file';
        $this->layout();
    }

    public function upload()
    {
        if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
        {
            


            $vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
            $vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
            $vpb_file_size = $_FILES['upload_file']['size']; // File Size
            $vpb_uploaded_files_location = 'front_assets/orders/uploads/'; //This is the directory where uploaded files are saved on your server
            $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
            //Without Validation and does not save filenames in the database
            if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
            {
                //Display the file id
                // echo $vpb_file_id;

                $data = $_POST;
                echo json_encode($data);
                $this->db->insert('upload_by_admin',$data);

            }
            else
            {
                //Display general system error
                // echo 'general_system_error';
                echo json_encode('general_system_error');
            }

        }
    }

    public function upload_file_by_admin()
    {

        $data = array();

        if($this->input->post('submitForm') && !empty($_FILES['uploaded_file']['name']))
        {
            $filesCount = count($_FILES['uploaded_file']['name']);

            for($i = 0; $i < $filesCount; $i++)
            { 
                $_FILES['upload_File']['name'] = $_FILES['uploaded_file']['name'][$i]; 
                $_FILES['upload_File']['type'] = $_FILES['uploaded_file']['type'][$i]; 
                $_FILES['upload_File']['tmp_name'] = $_FILES['uploaded_file']['tmp_name'][$i]; 
                $_FILES['upload_File']['error'] = $_FILES['uploaded_file']['error'][$i]; 
                $_FILES['upload_File']['size'] = $_FILES['uploaded_file']['size'][$i]; 
                $uploadPath = 'assets/upload_file_by_admin/'; 
                $config['upload_path'] = $uploadPath; 
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
            
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['user_id'] = $this->input->post('user_id');
                    $uploadData[$i]['order_id'] = $this->input->post('order_id');
                    $uploadData[$i]['product_id'] = $this->input->post('product_id');
                    $uploadData[$i]['order_name'] = $this->input->post('order_name');
                    $uploadData[$i]['product_name'] = $this->input->post('product_name');
                    $uploadData[$i]['file'] = $fileData['file_name'];
                    $uploadData[$i]['created_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['updated_on'] = date("Y-m-d H:i:s");
                }
            }
            if(!empty($uploadData))
            {
                var_dump($uploadData); exit();
                $order_status = [
                    'order_status' => "Uploaded"
                ];
                $order_id = $this->input->post('order_id');
                $this->home_model->order_status($order_id, $order_status);

                $insert = $this->home_model->file_add($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
    }

    public function update_status($order_id)
    {
        $order_id = $this->input->post('order_id');
        $order_status = $this->input->post('order_status');

        //email

        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'Sultanul_Arefin',
            'smtp_pass' => '152154FT3939',
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $username = "fahim";
        $user_email = $this->order_model->get_user_id_for_regular_order($order_id);
        $user_id = $user_email->user_id;
        $get_email = $this->order_model->get_user_email_for_regular_order($user_id);
        $u_mail =  $get_email->email;

        $this->email->from('admin@photoot.com', 'photoot');
        $this->email->to($u_mail);
        $this->email->cc('hello');
        $this->email->bcc('world');
        $this->email->subject('Email Test');
        $this->email->message("Your Regular Order Status Is ".$order_status);
        if($this->email->send())
        {
            echo "";
        }
        else
        {
            echo "Error occured";
        }

        $this->data = array(
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'show_file' => $this->order_model->show_file(),
            'update_status' => $this->order_model->update_status($order_id),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/all_orders';
        $this->layout();
    }

    public function custom_quote()
    {
        $this->data = array(
            'title' => 'All Free Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'show_file' => $this->order_model->show_custom_quote(),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/custom_quote';
        $this->layout();
    }

    public function update_custom_status($custom_quote_id)
    {
        // $custom_quote_id = $this->input->post('custom_quote_id');
        $order_status = $this->input->post('order_status');

            $custom_quote_id = $custom_quote_id;
            // echo $custom_quote_id; exit();

            $user_id = $this->order_model->get_user_id_for_custom_quote_mail($custom_quote_id);
            $user_id = $user_id->user_id; //echo $id_user; exit();

            $user_email = $this->order_model->get_user_email_for_custom_quote_mail($user_id);

            $email = $user_email->email;
            // echo $email; exit();

            $update_custom_status = $this->order_model->update_custom_status($order_status, $custom_quote_id, $user_id);

            $config = Array(       
                'mailtype' => 'html',
                'charset' => 'utf-8',
                 'priority' => '1'
            );

            $this->load->library('email', $config);

            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.sendgrid.net',
                'smtp_user' => 'Sultanul_Arefin',
                'smtp_pass' => '152154FT3939',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            ));

            // $body = 
            $data = array(
                'custom_quote_id' => $custom_quote_id,
                'user_info' => $user_email
            );

            // var_dump($data); exit();
            // $this->load->view('custom_quote_order_mail', $data, TRUE); exit();

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Custom Quote');
            // $this->email->message("Your Custom Order Id Is: ".$u_id);
            // $body = $this->load->view('custom_quote_order_mail.php',$data,TRUE);
            // $this->email->message($body);
            $this->email->message("Your  ".$custom_quote_id." no. custom order statush has changed to ".$order_status.". Please, check profile for track.");
            $this->email->send();

            $this->data = array(
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            // 'show_file' => $this->order_model->show_file(),
            // 'show_file' => $this->order_model->show_custom_quote(),
            'show_file' => $this->order_model->show_custom_quote(),
            'update_custom_status' => $this->order_model->update_custome_status($custom_quote_id),
            );
            // var_dump($this->data); exit();
            $this->page = 'order/custom_quote';
            $this->layout();
        }

        public function update_quote_status($custom_quote_id)
        {
        // $custom_quote_id = $this->input->post('custom_quote_id');
            $quote_status = $this->input->post('quote_status');

            $custom_quote_id = $custom_quote_id;
            // echo $custom_quote_id; exit();

            $user_id = $this->order_model->get_user_id_for_custom_quote_mail($custom_quote_id);
            $id_user = $user_id->user_id; //echo $id_user; exit();

            $user_email = $this->order_model->get_user_email_for_custom_quote_mail($id_user);

            $email = $user_email->email;
            // echo $email; exit();

            $change_quote_status = $this->order_model->change_quote_status($quote_status, $custom_quote_id, $id_user);

            $config = Array(       
                'mailtype' => 'html',
                'charset' => 'utf-8',
                 'priority' => '1'
            );

            $this->load->library('email', $config);

            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.sendgrid.net',
                'smtp_user' => 'Sultanul_Arefin',
                'smtp_pass' => '152154FT3939',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            ));

            // $body = 
            $data = array(
                'custom_quote_id' => $custom_quote_id,
                'user_info' => $user_email
            );

            // var_dump($data); exit();
            // $this->load->view('custom_quote_order_mail', $data, TRUE); exit();

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Custom Quote');
            // $this->email->message("Your Custom Order Id Is: ".$u_id);
            // $body = $this->load->view('custom_quote_order_mail.php',$data,TRUE);
            // $this->email->message($body);
            $this->email->message("Your Custom Quote Status has changed to ".$quote_status." .Check Your Profile to track");
            $this->email->send();

        $this->data = array(
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            // 'show_file' => $this->order_model->show_file(),
            // 'show_file' => $this->order_model->show_custom_quote(),
            'show_file' => $this->order_model->show_custom_quote(),
            'update_custom_status' => $this->order_model->update_custome_status($custom_quote_id),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/custom_quote';
        $this->layout();
    }

    public function update_regular_order_payment_status($order_id)
    {
        $payment_status = $this->input->post('payment_status');

            $order_id = $order_id;
            // echo $custom_quote_id; exit();

            $user_id = $this->order_model->get_user_id_for_regular_order_dashboard($order_id);
            $id_user = $user_id->user_id; //echo $id_user; exit();

            $user_email = $this->order_model->get_user_email_for_regular_order_dashboard($id_user);

            $email = $user_email->email;
            // echo $email; exit();

            $change_payment_status = $this->order_model->change_payment_status_for_regular_order($payment_status, $order_id, $id_user);

            $config = Array(       
                'mailtype' => 'html',
                'charset' => 'utf-8',
                 'priority' => '1'
            );

            $this->load->library('email', $config);

            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.sendgrid.net',
                'smtp_user' => 'Sultanul_Arefin',
                'smtp_pass' => '152154FT3939',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            ));

            // $body = 
            $data = array(
                'order_id' => $order_id,
                'user_info' => $user_email
            );

            // var_dump($data); exit();
            // $this->load->view('custom_quote_order_mail', $data, TRUE); exit();

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Photoot Payment Status');
            // $this->email->message("Your Custom Order Id Is: ".$u_id);
            // $body = $this->load->view('custom_quote_order_mail.php',$data,TRUE);
            // $this->email->message($body);
            $this->email->message("Your Regular Order Payment Status has changed to ".$payment_status." .Check Your Profile to track");
            $this->email->send();

            $this->data = array(
                'title' => 'All Orders',
                'user' => 'Fahim',
                'name' => 'Sultan',
                'created_at' => '2019-07-22 02:54:34',
                'show_file' => $this->order_model->show_file(),
            );
            // var_dump($this->data); exit();
            $this->page = 'order/all_orders';
            $this->layout();
    }

    public function update_payment_status($custom_quote_id)
        {
        // $custom_quote_id = $this->input->post('custom_quote_id');
            $payment_status = $this->input->post('payment_status');

            $custom_quote_id = $custom_quote_id;
            // echo $custom_quote_id; exit();

            $user_id = $this->order_model->get_user_id_for_custom_quote_mail($custom_quote_id);
            $user_id = $user_id->user_id; //echo $id_user; exit();

            $user_email = $this->order_model->get_user_email_for_custom_quote_mail($user_id);

            $email = $user_email->email;
            // echo $email; exit();

            $change_payment_status = $this->order_model->change_payment_status($payment_status, $custom_quote_id, $user_id);

            $config = Array(       
                'mailtype' => 'html',
                'charset' => 'utf-8',
                 'priority' => '1'
            );

            $this->load->library('email', $config);

            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.sendgrid.net',
                'smtp_user' => 'Sultanul_Arefin',
                'smtp_pass' => '152154FT3939',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            ));

            // $body = 
            $data = array(
                'custom_quote_id' => $custom_quote_id,
                'user_info' => $user_email
            );

            // var_dump($data); exit();
            // $this->load->view('custom_quote_order_mail', $data, TRUE); exit();

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Custom Quote');
            // $this->email->message("Your Custom Order Id Is: ".$u_id);
            // $body = $this->load->view('custom_quote_order_mail.php',$data,TRUE);
            // $this->email->message($body);
            $this->email->message("Your Custom Quote Payment Status has changed to ".$payment_status."Please, Pay & Contact With System Admin with transaction number .Check Your Profile for further information");
            $this->email->send();

        $this->data = array(
            'title' => 'All Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            // 'show_file' => $this->order_model->show_file(),
            // 'show_file' => $this->order_model->show_custom_quote(),
            'show_file' => $this->order_model->show_custom_quote(),
            'update_custom_status' => $this->order_model->update_custome_status($custom_quote_id),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/custom_quote';
        $this->layout();
    }

    public function view_custom_order($fixed_id)
    {
        $this->data = array(
            'title' => 'All Free Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            'individual_file' => $this->order_model->show_individual($fixed_id),
            'additional_info' => $this->order_model->additional_info($fixed_id),
            );
        // var_dump($this->data); exit();
        $this->page = 'order/view_custom_order';
        $this->layout();
    }

    public function upload_custom_order_file($fixed_id)
    {
        $this->data = array(
            'title' => 'View Orders',
            'user' => 'Fahim',
            'name' => 'Sultan',
            'created_at' => '2019-07-22 02:54:34',
            // 'upload_file' => $this->order_model->upload_custom_order_file($order_id),
            // 'file' => $this->order_model->file(),
            'fixed_id' => $fixed_id
            );
        // var_dump($this->data); exit();
        $this->page = 'order/custom_order_upload';
        $this->layout();
    }

    public function custom_order_file_upload()
    {
        if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
        {
            


            $vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
            $vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
            $vpb_file_size = $_FILES['upload_file']['size']; // File Size
            $vpb_uploaded_files_location = 'front_assets/custom_quote/upload_by_admin/'; //This is the directory where uploaded files are saved on your server
            $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
            //Without Validation and does not save filenames in the database
            if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
            {
                //Display the file id
                // echo $vpb_file_id;

                $data = $_POST;
                echo json_encode($data);
                $this->db->insert('custom_order_upload_by_admin',$data);

            }
            else
            {
                //Display general system error
                // echo 'general_system_error';
                echo json_encode('general_system_error');
            }

        }
    }

    // public function give_amount($fixed_id)
    // {
    //     $data = [
    //         'custom_quote_id' => $this->input->post('fixed_id'),
    //         'amount' => $this->input->post('amount')
    //     ];
    //     $fixed_id = $this->input->post('fixed_id');
    //     $update_amount = $this->order_model->update_amount($data, $fixed_id);
    //     $this->data = array(
    //     'title' => 'All Free Orders',
    //     'user' => 'Fahim',
    //     'name' => 'Sultan',
    //     'created_at' => '2019-07-22 02:54:34',
    //     'individual_file' => $this->order_model->show_individual($fixed_id),
    //     );
    //     // var_dump($this->data); exit();
    //     $this->page = 'order/view_custom_order';
    //     $this->layout();
    // }

    public function give_amount($custom_quote_id)
    {
        // echo $custom_quote_id; exit();
        $data = [
            'custom_quote_id' => $this->input->post('custom_quote_id'),
            'price' => $this->input->post('price')
        ];
        $custom_quote_id = $this->input->post('custom_quote_id');
        $update_amount = $this->order_model->update_amount($data, $custom_quote_id);
        if($update_amount){
            $fixed_id = $this->input->post('fixed_id');
            redirect('orders/view_custom_order/'.$fixed_id);
        }else{
            $fixed_id = $this->input->post('fixed_id');
            redirect('orders/view_custom_order/'.$fixed_id);
        }
        // $this->data = array(
        // 'title' => 'All Free Orders',
        // 'user' => 'Fahim',
        // 'name' => 'Sultan',
        // 'created_at' => '2019-07-22 02:54:34',
        // 'individual_file' => $this->order_model->show_individual($fixed_id),
        // );
        // // var_dump($this->data); exit();
        // $this->page = 'orders/view_custom_order/';
        // $this->layout();
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
