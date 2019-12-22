<?php 

	class User_auth extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model(array('user_model'));
		}

		public function registration()
        {
            $typeRadio = $this->input->post('typeRadio');

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('typeRadio', 'Account type', 'required');
            if($this->form_validation->run() == FALSE){
                $er = validation_errors();
                echo json_encode(['error' => $er]);
            }
            else{
                $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user_info.email]|valid_email');
                $this->form_validation->set_rules('r_email', 'Re-email', 'trim|required|matches[email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');
                $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
                $this->form_validation->set_rules('d_name', 'Details Name', 'trim|required');
                $this->form_validation->set_rules('d_surname', 'Details Surname', 'trim|required');
                $this->form_validation->set_rules('d_address', 'Details Address', 'trim|required');
                $this->form_validation->set_rules('d_city', 'Details City', 'trim|required');
                $this->form_validation->set_rules('d_zip', 'Details Zip', 'trim|required');
                $this->form_validation->set_rules('d_country', 'Details Country', 'trim|required');
                if($typeRadio != "private"){
                    $this->form_validation->set_rules('c_name', 'Company Name', 'trim|required');
                    $this->form_validation->set_rules('d_vat', 'Details Vat', 'trim|required');
                    $this->form_validation->set_rules('pec', 'PEC', 'trim|required');
                    $this->form_validation->set_rules('sdi', 'SDI', 'trim|required');
                    $this->form_validation->set_rules('fiscal', 'Fiscal Code', 'trim|required');
                }
                $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('fax', 'Fax', 'trim');
                $this->form_validation->set_rules('typeAgree', 'Accept', 'trim');    
                
     
                if( $this->form_validation->run() == FALSE ){
                    $er = validation_errors();
                    // $er = 'Test Validation';
                    echo json_encode(['error' => $er]);
                }else{
                    echo json_encode(['success' => 'Form Submitted Successfully']);

                    $data = [
                        'typeRadio' => $this->input->post('typeRadio'),
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                        'd_name' => $this->input->post('d_name'),
                        'd_surname' => $this->input->post('d_surname'),
                        'c_name' => $this->input->post('c_name'),
                        'd_vat' => $this->input->post('d_vat'),
                        'd_address' => $this->input->post('d_address'),
                        'd_city' => $this->input->post('d_city'),
                        'd_zip' => $this->input->post('d_zip'),
                        'd_country' => $this->input->post('d_country'),
                        'pec' => $this->input->post('pec'),
                        'sdi' => $this->input->post('sdi'),
                        'fiscal' => $this->input->post('fiscal'),
                        'telephone' => $this->input->post('telephone'),
                        'fax' => $this->input->post('fax'),
                        'typeAgree' => $this->input->post('typeAgree')
                    ];

                    $result = $this->user_model->saveData($data);

                    $email = $this->input->post('email');

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

                    $this->email->from('admin@photoot.com', 'photoot');
                    $this->email->to($email);
                    $this->email->cc('hello');
                    $this->email->bcc('world');
                    $this->email->subject('Registration Done');
                    $this->email->message("Thank You For Your Registration");
                    if($this->email->send())
                    {
                        echo "";
                    }
                    else
                    {
                        echo "Error occured";
                    }

                    // var_dump($data);
                    // $dateTime = date('Y-m-d H:i:s');
                    // $table = 'package_plan';
                    // $pkgData = array(
                    //  'pName' => $this->input->post('pkg-name'),
                    //  'pSName' => $this->input->post('pkg-sn'),
                    //  'pPrice' => $this->input->post('pkg-price'),
                    //  'pDateCrtd' => $dateTime,
                    // );
                    // $res = $this->admin_model->saveData( $pkgData, $table );
     
                    // if($res > 0){
                    //  echo json_encode(['success' => 'Package added successfully.']);
                    // }else{
                    //  echo json_encode(['error' => 'Something went wrong. Please try again']);
                    // }
                }
            }
            
        }

		public function checkReg()
		{
			$data = "Fahim";
			echo json_encode($data);
		}

		public function login()
		{

            $this->load->helper('form');
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('typeRadio', 'Account type', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            // $this->form_validation->set_rules('r_email', 'Re-email', 'trim|required|matches[email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');

            if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                // $er = 'Test Validation';
                echo json_encode(['error' => $er]);
            }else{
                // echo json_encode(['success' => 'Form Submitted Successfully']);

    			$email = $this->input->post('email');
    			$password = $this->input->post('password');

    			$check = $this->user_model->check($email, $password);

    			if($check)
    			{

    				$this->session->set_userdata('name', $check[0]->d_name);
    				$this->session->set_userdata('id', $check[0]->id);
    				// $this->session->set_flashdata('logged', 'Successfully logged in');
    				
                    echo json_encode(['success' => 'You\'re logged in successfully']);
                    // redirect('frontend/profile');

    			} else
    			{
                    echo json_encode(['error' => 'Credentials doesn\'t match.']);
    				// echo "Error";
    			}
		}
    }

        public function try_it_free_login()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('typeRadio', 'Account type', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            // $this->form_validation->set_rules('r_email', 'Re-email', 'trim|required|matches[email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');

            if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                // $er = 'Test Validation';
                echo json_encode(['error' => $er]);
            }else{
                // echo json_encode(['success' => 'Form Submitted Successfully']);

                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $check = $this->user_model->check($email, $password);

                if($check)
                {

                    $this->session->set_userdata('name', $check[0]->d_name);
                    $this->session->set_userdata('id', $check[0]->id);
                    // $this->session->set_flashdata('logged', 'Successfully logged in');
                    
                    echo json_encode(['success' => 'You\'re logged in successfully']);
                    // redirect('frontend/profile');

                } else
                {
                    echo json_encode(['error' => 'Credentials doesn\'t match.']);
                    // echo "Error";
                }
            }
        }

		public function logout()
		{
			$this->session->unset_userdata("name");
			$this->session->sess_destroy();
			redirect('frontend/');
		}
	}

?>