<?php

	class Frontend extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model(array('home_model'));
			$this->load->library(array('cart', 'paypal_lib', 'paypal_custom_lib', 'pdf', 'form_validation'));
			$this->load->helper('form');
			$user_id = $this->session->userdata('id');
			$this->load->database();
			// $category['country'] = $this->country();
		}

		public function country()
	    {
	    	$json = file_get_contents('front_assets/country/country.json');
	    	$obj = json_decode($json);
	    	return $obj;
	    }

		/*index function*/
		public function index()
		{
			$user_id = $this->session->userdata('id');
		    $category['user_info'] = $this->home_model->user_info($user_id);
			$category['country'] = $this->country();
			// var_dump($category['country']); exit();

			$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->sub_category();
			$category['services'] = $this->home_model->fetch_services();	

			$this->load->view('index', $category);
		}

		/*header search option*/
		public function search()
		{
			$user_id = $this->session->userdata('id');
		    $category['user_info'] = $this->home_model->user_info($user_id);
			$key = $this->input->post('search');
			$category['country'] = $this->country();
			$category['data'] = $this->home_model->search_key($key);
			$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->sub_category();
			// var_dump($category['value']); exit();
			$this->load->view('search_result', $category);
		}

		/*custom quote view page*/
		public function custom_quote()
		{
			if($this->session->userdata('id')){
				$user_id = $this->session->userdata('id');
		    	$category['user_info'] = $this->home_model->user_info($user_id);
				$category['country'] = $this->country();
				$category['values'] = $this->home_model->fetch_category();
				// $category['additional_services'] = $this->home_model->fetch_additional_services();
				$category['delivery_charge'] = $this->home_model->fetch_delivery_charge();
				
				$category['user_id'] = $this->session->userdata('id');

				$this->load->view('custom_quote', $category);
			}
			else{
				redirect('frontend/custom_quote_login');
			}
		}

		public function custom_quote_login()
	    {
	    	if($this->session->userdata('id')){
	    		redirect('frontend/custom_quote');
	    	}
	    	else{
	    		$user_id = $this->session->userdata('id');
			    $category['user_info'] = $this->home_model->user_info($user_id);
		    	$category['country'] = $this->country();
		    	$this->load->view('custom_quote_login', $category);
	    	}
	    }

		/*custom quote order id generated*/
		public function addCustomQuote(){
			$amnt = $this->input->post('amnt');
			$j_name = $this->input->post('j_name');
			$additional_service = $this->input->post('additional_service');
			$d_charge = $this->input->post('d_charge');
			
			$data = array();

			$custom_quote_info = [
				'amnt' => $amnt,
				'j_name' => $j_name,
				'additional_service' => $additional_service,
				'd_charge' => $d_charge
			];

			$json = json_encode($custom_quote_info);

			$data['value'] = array(
				'user_id' => $this->session->userdata('id'),
				'custom_quote_info' => $json,
			);

			$data['custom_quote_info'] = $custom_quote_info;

			$datas = $this->home_model->addCustomQuote($data);
			// echo json_decode($datas); exit();
			if ($datas) {
				echo json_encode($datas);
			}
		}

		/*custom qutoe file uploaded*/
		public function custom_quote_upload()
		{
			if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
				$vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
				$vpb_file_size = $_FILES['upload_file']['size']; // File Size
				$vpb_uploaded_files_location = 'front_assets/custom_quote/uploads/'; //This is the directory where uploaded files are saved on your server
				$vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
				//Without Validation and does not save filenames in the database
				if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
				{
					$data = $_POST;
					echo json_encode($data);
					$this->db->insert('custom_quote',$data);
				}
				else
				{
					//Display general system error
					// echo 'general_system_error';
					echo json_encode('general_system_error');
				}
			}
		}

		public function your_custom_order_file($fixed_id)
		{
			$data['file'] = $this->home_model->custom_order_uploaded_by_admin($fixed_id);
			$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);

			$this->load->view('your_custom_order_file', $data);
		}

		public function delete_custom_order($fixed_id)
		{
			$this->home_model->delete_custom_order($fixed_id);
		}

		public function custom_quote_payment()
		{
			$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);
			$data['fixed_id'] = $this->input->post('fixed_id');
			$data['amount'] = $this->input->post('amount');
			$fixed_id = $this->input->post('fixed_id');
			$amount = $this->input->post('amount');
			$update_custom = $this->home_model->update_custom($fixed_id, $amount);
			$this->load->view('custom_quote_payment', $data);
		}

		public function custom_quote_payment_paypal()
		{
			// Set variables for paypal form
	        $returnURL = base_url().'frontend/paypal_custom/success';
	        $cancelURL = base_url().'frontend/paypal_custom/cancel';
	        $notifyURL = base_url().'frontend/paypal_custom/ipn';
	        
	        // Get current user ID from the session
	        $userID = $this->session->userdata('id');
	        $total = $this->input->post('total');

	        // Add fields to paypal form
	        $this->paypal_custom_lib->add_field('return', $returnURL);
	        $this->paypal_custom_lib->add_field('cancel_return', $cancelURL);
	        $this->paypal_custom_lib->add_field('notify_url', $notifyURL);
	        // $this->paypal_lib->add_field('item_name', $product['name']);
	        $this->paypal_custom_lib->add_field('custom', $userID);
	        // $this->paypal_lib->add_field('item_number',  $product['id']);
	        $this->paypal_custom_lib->add_field('amount',  $total);
	        
	        // Render paypal form
	        $this->paypal_custom_lib->paypal_auto_forms();
		}

		public function custom_quote_payment_bank()
		{
			//destroy cart data after a successfull transaction
	        $this->cart->destroy();

	        /* getting user_id to update the payment status on pre_orders_info table */
	        $user_id = $this->session->userdata('id');

	        $last_id = $this->input->post('last_id');

	        $data['update'] = $this->home_model->update_payment_custom($user_id, $last_id);
	        // $data['update'] = $this->home_model->update_payment($user_id, $last_id);
	        $data['values'] = $this->home_model->fetch_data_custom($last_id, $user_id);
	        // $data['values'] = $this->home_model->fetch_data($user_id);

	        // var_dump($data); exit();

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

            
            $user_email = $this->home_model->get_email_for_custom_quote_success($user_id);
            $email = $user_email->email;
            // echo $email; exit();

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Custom Quote');
            $this->email->message("Your Custom Order Payment is Scheduled for Bank. Please pay through bank & contact with us in email");
            if($this->email->send())
            {
                echo "";
            }
            else
            {
                echo "Error occured";
            }
            $user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);

			$this->load->view('success_custom', $data);
		}

		/*try it free options page*/
		public function try_it_free()
		{
			if($this->session->userdata('id')){
				$user_id = $this->session->userdata('id');
				$category['user_info'] = $this->home_model->user_info($user_id);
				$category['country'] = $this->country();
				$category['values'] = $this->home_model->fetch_category();
				// $category['sub_category'] = $this->home_model->fetch_sub_category();
				// $category['bread'] = $this->home_model->fetch_category_name(1);
				$category['services'] = $this->home_model->fetch_services();
				// var_dump($category['services']); exit;

				$this->load->view('try_it_free', $category);
			}
			else{
				redirect('frontend/try_it_free_login');
			}
		}

		public function try_it_free_login()
	    {
	    	if($this->session->userdata('id')){
	    		redirect('try_it_free');
	    	}
	    	else{	
	    		$user_id = $this->session->userdata('id');
				$category['user_info'] = $this->home_model->user_info($user_id);
	    		$category['country'] = $this->country();
	    		$this->load->view('try_it_free_login', $category);
	    	}
	    }

		/*try it free order page*/
		public function try_free_order($id)
		{
			$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
			$category['country'] = $this->country();
			$category['user_id'] = $this->session->userdata('id');
			$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->fetch_sub_category(1);
			$category['delivery_charge'] = $this->home_model->fetch_delivery_charge();
			$this->load->view('try_free_order', $category);
		}

		/*try it free order id generated*/
		public function free_order()
		{
			$amnt = $this->input->post('amnt');
			$j_name = $this->input->post('j_name');
			// $additional_service = $this->input->post('additional_service');
			$d_charge = $this->input->post('d_charge');
			
			$data = array();

			$custom_quote_info = [
				'amnt' => $amnt,
				'j_name' => $j_name,
				// 'additional_service' => $additional_service,
				'd_charge' => $d_charge
			];

			$json = json_encode($custom_quote_info);

			$data['value'] = array(
				'user_id' => $this->session->userdata('id'),
				'try_it_free_info' => $json,
			);

			$data['custom_quote_info'] = $custom_quote_info;

			$datas = $this->home_model->addTryItFree($data);
			// echo json_decode($datas); exit();
			if ($datas) {
				echo json_encode($datas);
			}
		}

		/*try it free file uploaded*/
		public function try_it_free_upload()
		{
			if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
				$vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
				$vpb_file_size = $_FILES['upload_file']['size']; // File Size
				$vpb_uploaded_files_location = 'front_assets/try_it_free/uploads/'; //This is the directory where uploaded files are saved on your server
				$vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
				//Without Validation and does not save filenames in the database
				if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
				{
					$data = $_POST;
					echo json_encode($data);
					$this->db->insert('try_it_free_file',$data);
				}
				else
				{
					//Display general system error
					// echo 'general_system_error';
					echo json_encode('general_system_error');
				}
			}
		}

		/*all categories function*/
		public function to_category($category_id)
		{
			$category['country'] = $this->country();
			$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
			$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->fetch_sub_category($category_id);
			$category['bread'] = $this->home_model->fetch_category_name($category_id);

			$this->load->view('to_category', $category);
		}

		/*all sub categories function*/
		public function single_product($sub_category_id)
		{
			$category['country'] = $this->country();
			$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
			$category['values'] = $this->home_model->fetch_category();
			$category['product'] = $this->home_model->fetch_product($sub_category_id);
			$category['additional_services'] = $this->home_model->fetch_additional_services();
			$category['delivery_charge'] = $this->home_model->fetch_delivery_charge();
			$category['sub_bread'] = $this->home_model->sub_bread($sub_category_id);
			
			$this->load->view('single_product', $category);
		}

		/*file added to cart*/
		public function addToCart()
		{
			$sub_category_id = $this->input->post('sub_category_id');
			$product = $this->home_model->getRows($sub_category_id);
			$data['number'] = $this->input->post('number');
			$data['name'] = $this->input->post('order_name');
			$data['total'] = $this->input->post('sub_total');
			$data['additional_service'] = $this->input->post('additional_service');
			$data['additional_service_value'] = $this->input->post('additional_service_value');
			$data['vat'] = $this->input->post('vat');
			$data['delivery_price'] = $this->input->post('delivery_price');
			$data['totalphotoamount'] = $this->input->post('TotalPhotoAmount');


			$data = array(
				// 'u_id' => rand(10,100),
				'id' => rand(10,100),
				'product_id' => $product['sub_category_id'],
				'qty' => 1,
				'product_name' => $product['sub_category_name'],
				'image' => $product['sub_category_image'],
				'number' => $data['number'],
				'additional_service' => $data['additional_service'],
				'price' => $data['total'],
				'name' => $data['name'],
				'additional_service_value' => $data['additional_service_value'],
				'vat' => $data['vat'],
				'delivery_price' => $data['delivery_price'],
				'totalphotoamount' => $data['totalphotoamount'],
			);

			$this->cart->insert($data);
			$data['cartItems'] = $this->cart->total_items();

			if ($data['cartItems'] != null) {
				echo json_encode($data['cartItems']);
			}
		}

		/*View Cart*/
		public function cart()
		{
			$data = array();
			$data['country'] = $this->country();
			$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);
			$data['cartItems'] = $this->cart->contents();
			// var_dump($data['cartItems']); exit();
			$this->load->view('cart', $data);
		}

		/*Cart Updated which is disabled*/
		public function updateItemQty(){
			$update = 0;
			$rowid = $this->input->get('rowid');
			$number = $this->input->get('number');

			if(!empty($rowid) && !empty($number))
			{
				$data = array(
					'rowid' => $rowid,
					'number' => $number
				);
				$update = $this->cart->update($data);
			}
			echo $update?'ok':'err';
		}

		/*Cart Item remove function.*/
		public function removeItem($rowid)
		{
			$remove = $this->cart->remove($rowid);

			redirect('frontend/cart');
		}


		/*From Cart to Checkout page where info save in db*/
		public function checkout()
		{
			if($this->cart->total_items() > 0){
				if($this->session->userdata('id'))
				{	
					// $order_info[] = array(
					// 	'product_id' => $this->input->post('product_id'),
					// 	'image' => $this->input->post('image'),
					// 	'product_name' => $this->input->post('product_name'),
					// 	'order_name' => $this->input->post('order_name'),
					// 	'additional_service' => $this->input->post('additional_service'),
					// 	'sub_total' => $this->input->post('sub_total'),
					// 	'quantity' => $this->input->post('qty'),
					// 	'number' => $this->input->post('number'),
					// 	'additional_service_value' => $this->input->post('additional_service_value'),
					// 	'vat' => $this->input->post('vat'),
					// 	'delivery_price' => $this->input->post('delivery_price'),
					// 	'totalphotoamount' => $this->input->post('totalphotoamount'),
					// 	'order_status' => "Pending",
					// );

					$id = $this->input->post('product_id');
					$product_id = $this->input->post('product_id');
					$image = $this->input->post('image');
					$product_name = $this->input->post('product_name');
					$order_name = $this->input->post('order_name');
					$additional_service = $this->input->post('additional_service');
					// var_dump($additional_service); exit();
					$sub_total = $this->input->post('sub_total');
					$quantity = $this->input->post('qty');
					$number = $this->input->post('number');
					$additional_service_value = $this->input->post('additional_service_value');
					$vat = $this->input->post('vat');
					$delivery_price = $this->input->post('delivery_price');
					$totalphotoamount = $this->input->post('totalphotoamount');

					$data = array();

					foreach($id as $key=>$value)
					{
						$order_info[] = array(
							'product_id' => $product_id[$key],
							'product_image' => $image[$key],
							'product_name' => $product_name[$key],
							'order_name' => $order_name[$key],
							'additional_service' => $additional_service[$key],
							'sub_total' => $sub_total[$key],
							'quantity' => $quantity[$key],
							'number' => $number[$key],
							'additional_service_value' => $additional_service_value[$key],
							'vat' => $vat[$key],
							'delivery_price' => $delivery_price[$key],
							'totalphotoamount' => $totalphotoamount[$key],
							'order_status' => "Pending",
						);
					}

					$json = json_encode($order_info);

					// var_dump($json); exit();

					$data['value'] = array(
						'order_info' => $json,
						'user_id' => $this->session->userdata('id')
					);

					$data['order_info'] = $order_info;

					$insert = $this->home_model->insert_pre_order($data);
					$data['last_id'] = $insert; 
					$data['cartItems'] = $this->cart->contents();	
					$user_id = $this->session->userdata('id');
					$data['user_data'] = $this->home_model->user_data($user_id);
					$user_id = $this->session->userdata('id');
					$data['user_info'] = $this->home_model->user_info($user_id);

					$this->load->view('checkout', $data);
				}
				else
				{
					redirect('frontend/login');
				}
			}
			else{
				redirect('frontend/cart');
			}
		}

		/*If selects bank transfer*/
		public function bank()
		{
			if($this->cart->total_items() > 0){
				//destroy cart data after a successfull transaction
		        $this->cart->destroy();

		        /* getting user_id to update the payment status on pre_orders_info table */
		        $user_id = $this->session->userdata('id');

		        $last_id = $this->input->post('last_id');

		        $data['update'] = $this->home_model->update_payment($user_id, $last_id);

		        $data['values'] = $this->home_model->fetch_data($user_id);

		        // var_dump($data); exit();
		        $user_id = $this->session->userdata('id');
				$data['user_info'] = $this->home_model->user_info($user_id);

				$this->load->view('success', $data);
			}
			else{
				redirect('frontend/cart');
			}
		}

		/*If Selects Paypal transfer*/
		public function buy()
		{

			// $data = $_POST;
			// $data['redirect'] = base_url('frontend/buy/');
			// echo json_encode($data);
			// exit;

	        // Set variables for paypal form
	        $returnURL = base_url().'frontend/paypal/success';
	        $cancelURL = base_url().'frontend/paypal/cancel';
	        $notifyURL = base_url().'frontend/paypal/ipn';
	        
	        // Get current user ID from the session
	        $userID = $this->session->userdata('id');
	        $total = $this->input->post('total');

	        // Add fields to paypal form
	        $this->paypal_lib->add_field('return', $returnURL);
	        $this->paypal_lib->add_field('cancel_return', $cancelURL);
	        $this->paypal_lib->add_field('notify_url', $notifyURL);
	        // $this->paypal_lib->add_field('item_name', $product['name']);
	        $this->paypal_lib->add_field('custom', $userID);
	        // $this->paypal_lib->add_field('item_number',  $product['id']);
	        $this->paypal_lib->add_field('amount',  $total);
	        
	        // Render paypal form
	        $this->paypal_lib->paypal_auto_form();
	    }

	    /*User Profile*/
	    public function profile()
	    {
	    	if($this->session->userdata('id'))
	    	{
	    		$user_id = $this->session->userdata('id');
		    	$data['results'] = $this->home_model->data($user_id);
		    	$data['paid_data'] = $this->home_model->paid_data($user_id);
		    	$data['user_info'] = $this->home_model->user_info($user_id);
		    	$data['custom_quote'] = $this->home_model->fetch_custom_quote($user_id);
		    	$data['free_order'] = $this->home_model->fetch_free_order($user_id);
		    	
		    	// var_dump($data['free_order']); exit();

		    	$this->load->view('user', $data);
	    	}
	    	else
	    	{
	    		$this->session->set_flashdata('please_log', 'Please log in first');
	    		redirect('frontend/cart');
	    	}
	    }

	    public function order_detail($order_id)
	    {
	    	$user_id = $this->session->userdata('id');
	    	$data['user_info'] = $this->home_model->user_info($user_id);
	    	$data['order_detail'] = $this->home_model->order_detail($order_id, $user_id);
	    	// var_dump($data); exit();
	    	$this->load->view('order_detail', $data);
	    }

	    public function your_custom_order($custom_quote_id)
	    {
	    	$user_id = $this->session->userdata('id');
			$file['user_info'] = $this->home_model->user_info($user_id);
	    	$file['files'] = $this->home_model->your_custom_order($custom_quote_id);
	    	$file['custom_quote'] = $this->home_model->custom_order($custom_quote_id);
	    	// var_dump($file['custom_quote']); exit();
	    	$this->load->view('frontend/your_custom_order', $file);
	    }

	    public function delete_custom_file($custom_quote_id, $fixed_id)
	    {
	    	$delete_custom_file = $this->home_model->delete_custom_file($custom_quote_id);
	    	if($delete_custom_file){
	    		redirect('frontend/your_custom_order/'.$fixed_id);
	    	}
	    	else{
	    		redirect('frontend/your_custom_order/'.$fixed_id);
	    	}
	    }

	    public function free_file($try_it_free_id)
	    {
	    	$data['free_order_file_by_admin'] = $this->home_model->free_order_file_by_admin($try_it_free_id);
	    	// var_dump($data); exit();
	    	$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);

	    	$this->load->view('your_free_file', $data);

	    }

	    public function failedOrder()
	    {
	    	$user_id = $this->session->userdata('id');
			$search_data = $this->input->post('search_data');


		    $result = $this->home_model->get_autocomplete($search_data, $user_id);
		    // echo json_encode($result); exit();

		    if (!empty($result))
		    {
		        foreach ($result as $row):
		            echo "<li><a href='#'>" . $row->order_id . "</a></li>";
		            $data = json_decode($row->order_info);
		            foreach($data as $value):
		                echo "<h3 style='color: red;'>Order Information: </h3>";
		                echo "<table>";
		               	  echo "<tr style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>";
				               echo "<th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Product ID:</td>";
				               echo "<th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Product Name:</td>";
				               echo "<th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>Job Name:</td>";
				               echo "<th style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>A Services:</td>";
				          echo "</tr>";

			               echo "<tr>";
			               	   echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>". $value->product_id ."</td>";
				               echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>". $value->product_name ."</td>";
				               echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>". $value->order_name ."</td>";
				               echo "<td style='border: 1px solid #dddddd; text-align: center; padding: 8px;'>". $value->additional_service ."</td>";
			               echo "</tr>";
			               echo "</table>";
		           		endforeach;
		           	   echo "<h2 style='color: red'>Enter Your Product Id & Image Name & Complain about file: </h2>";
		           	   echo "<form id='submit_fail_order' method='post'>";
		           	   echo "<textarea name='failedOrderData' cols='50' rows='4' placeholder='Enter Your Product Id, Image Name with extension & Write about your file'></textarea>";
		           	   echo "<div class='text-center' style='margin-top: 10px'><button type='submit' class='btn btn-info'>Submit Complain</button></div>";
		           	   echo "</form>";
		          endforeach;
		     }
		     else
		     {
		           echo "<li> <em> Not found ... </em> </li>";
		     }
	    }

	    public function saveFailedOrder()
	    {
	    	$this->form_validation->set_rules('failedOrderData', 'failedOrderData', 'trim|required',
    			array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.',
                'valid_email'	=> '%s must be valid'
        		)
    		);

    		if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                echo json_encode(['error' => $er]);
            }else{
                echo json_encode(['success' => 'Complain Accepted Successfully']);

                $data = [
                	'failedOrderData' => $this->input->post('failedOrderData')
                ];
                
                $result = $this->home_model->save_order_failed($data);
	    	}
	    }

	    public function add_order($order_id, $product_id)
	    {
	    	// echo $order_id;
	    	// echo $product_id;
	    	// $data['order'] = $this->input->post('order_id');
	    	// $data['user'] = $this->input->post('user_id');
	    	// $data['product_id'] = $this->input->post('product_id');

	    	$data['order_info'] = $this->home_model->order_info($order_id);
	    	// var_dump($data);exit();
	    	$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);

	    	$this->load->view('upload_file', $data);
	    }

		public function upload()
		{
			if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
				$vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
				$vpb_file_size = $_FILES['upload_file']['size']; // File Size
				$vpb_uploaded_files_location = 'front_assets/upload_file/uploads/'; //This is the directory where uploaded files are saved on your server
				$vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
				//Without Validation and does not save filenames in the database
				if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
				{
					$data = $_POST;
					echo json_encode($data);
					$this->db->insert('ordered_file',$data);
				}
				else
				{
					//Display general system error
					// echo 'general_system_error';
					echo json_encode('general_system_error');
				}
			}
		}

		public function show_file($order_id, $product_id)
	    {
	    	$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
			$file['user_info'] = $this->home_model->user_info($user_id);
	    	$file['files'] = $this->home_model->show_file($user_id, $order_id, $product_id);
	    	$this->load->view('frontend/file', $file);
	    }

	    public function delete_file($file_id)
	    {
	    	$delete_file = $this->home_model->delete_file($file_id);
	    	if($delete_file)
	    	{
	    		redirect('frontend/profile');
	    	}
	    	else{
	    		redirect();
	    	}
	    }

	    /*file uploaded by admin*/
	    public function your_file($order_id)
	    {
	    	$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);
	    	$data['file'] = $this->home_model->file_uploaded_by_admin($order_id);

	    	$this->load->view('your_file', $data);
	    }

	    /*pdf*/
	    public function invoice()
	    {
	    	if($this->uri->segment(3)){
	    		$order_id = $this->uri->segment(3);
	    		$html_content = $this->home_model->fetch_order_details($order_id);
	    		$output = '<img src="front_assets/images/logo/logo.png" style="margin-left: 37%" alt="No Image Found" height="100px" width="200px" />';
	    		$output .= '<h3 align="center">Order Details</h3>';

				foreach($html_content as $row){
	    			$output .= '
					     <p><b style="color: red">ID : </b>'.$row->order_id.'</p>
					     <p><b>User ID : </b>'.$row->user_id.'</p>
					     <p><b>Payment Status : </b>'.$row->payment_status.'</p>
					     <p><b>Payment Method : </b> '.$row->payment_method.' </p>';
					


					     $output .= '<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 80%;">
					     			 <tr>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Product Id</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Product Name</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Order Name</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Additional Service</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Sub Total</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Quantity</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Number</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Additional Service Value</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Vat</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Delivery Price</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Total Photo Amount</th>
						 			 <th style="border: 1px solid #dddddd; text-align: left; padding: 2px;">Order Status</th>
						 			 </tr>';
						$data = json_decode($row->order_info);
						foreach($data as $value){
	    			
						$output .= '<tr>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->product_id .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->product_name .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->order_name .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->additional_service .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->sub_total .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->quantity .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->number .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->additional_service_value .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->vat .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->delivery_price .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->totalphotoamount .'</td>
									<td style="border: 1px solid #dddddd; text-align: left; padding: 2px;">'. $value->order_status .'</td>
									</tr></table>';
					}
				}
					  
	    		
    		    $this->pdf->loadHtml($output);
			    $this->pdf->render();
			    $this->pdf->stream("photoot_order_no_".$order_id.".pdf", array("Attachment"=>0));
	    	}
	    }

	    /*Update Profile*/
	    public function update_profile()
	    {
	    	$id = $this->input->post('id');
	    	$typeRadio = $this->input->post('typeRadio');

            $this->load->helper('form');
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('typeRadio', 'Account type', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            // $this->form_validation->set_rules('r_email', 'Re-email', 'trim|required|matches[email]');
            // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');
            // $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
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
            // $this->form_validation->set_rules('typeAgree', 'Accept', 'trim|required');

            if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                // $er = 'Test Validation';
                echo json_encode(['error' => $er]);
            }else{                
                $data = [
	    		'typeRadio' => $this->input->post('typeRadio'),
	    		'd_name' => $this->input->post('d_name'),
	    		'd_surname' => $this->input->post('d_surname'),
	    		'email' => $this->input->post('email'),
	    		'd_address' => $this->input->post('d_address'),
	    		'd_city' => $this->input->post('d_city'),
	    		'd_zip' => $this->input->post('d_zip'),
	    		'd_country' => $this->input->post('d_country'),
	    		'c_name' => $this->input->post('c_name'),
	    		'd_vat' => $this->input->post('d_vat'),
	    		'pec' => $this->input->post('pec'),
	    		'sdi' => $this->input->post('sdi'),
	    		'fiscal' => $this->input->post('fiscal'),
	    		'telephone' => $this->input->post('telephone'),
	    		'fax' => $this->input->post('fax'),
	    	];
	    	// var_dump($data); exit();

                $result = $this->home_model->updateData($id, $data);

                if($result)
                {
                	redirect('frontend/profile');
                }
                else{
                	redirect('frontend/profile');
                }

	    	}
	    }

	    public function forgotPassword()
	    {
	    	if($this->session->userdata('id')){
	    		redirect('frontend/profile');
	    	}
	    	else{
	    		$this->load->view('forgotPassword');
	    	}
	    }

	    public function forgotPasswordValidation()
	    {
	    	$email = $this->input->post('email');

	    	$checkEmail = $this->home_model->checkEmail($email);

	    	if($checkEmail){
	    		$user_id = $checkEmail->id;
	    		$number=rand();
	    		$email = $checkEmail->email;

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

	            

	            $this->email->from('admin@photoot.com', 'photoot');
	            $this->email->to($email);
	            $this->email->cc('1');
	            $this->email->bcc('2');
	            $this->email->subject('Your Pin');
	            $this->email->message("Your Verification Number Is: ".$number);
	            $this->email->send();

	    		$update_data = $this->home_model->update_user_info($user_id, $number);
	    		
	    		if($update_data){
	    			$data['id'] = $user_id;
	    			$data['email'] = $checkEmail->email;
	    			$this->load->view('updatePassword', $data);
	    		} 
	    	}
	    	else{
	    		$this->session->set_flashdata('noEmail', 'No Account is registered with this email');
	    		redirect('frontend/forgotPassword');
	    	}
	    }

	    public function forgotPasswordValidationDone()
	    {
	    	$forgotPassword = $this->input->post('forgotPassword');
	    	$user_id = $this->input->post('id');
	    	$email = $this->input->post('email');

	    	$check = $this->home_model->checkForgotPassword($forgotPassword, $user_id);
	    	// var_dump($check); exit();

	    	if($check){
	    		$data['id'] = $user_id;
	    		$data['country'] = $this->country();
	    		$this->load->view('changePassword', $data);
	    	}
	    	else{
	    		$this->session->set_flashdata('noPassword', 'Code Error');
	    		$data['id'] = $user_id;
	    		$data['email'] = $email;
	    		$data['country'] = $this->country();
	    		$this->load->view('updatePassword', $data);
	    	}
	    }

	    public function changePasswordValidation()
	    {
	    	$this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
            	$data['id'] = $this->input->post('id');
            	$data['country'] = $this->country();
                $this->load->view('changePassword', $data);
            }
            else
            {
            	$data = [
            		'password' => md5($this->input->post('password'))
            	];
            	$user_id = $this->input->post('id');
            	$change = $this->home_model->changePasswordDone($user_id, $data);
            	$this->session->set_flashdata('passwordChanged', 'Password Has Successfully Changed');
                redirect('login');
            }
	    }

	    

	    public function login()
    	{
    		if($this->session->userdata('id')){
    			redirect('frontend/profile');
    		}
    		else{
    			$category['country'] = $this->country();
    			$this->load->view('login_form', $category);
    		}
    	}	

    	// public function registration()
    	// {
    	// 	$this->load->view('registration_form');
    	// }

    	public function privacy()
    	{
    		$category['values'] = $this->home_model->fetch_category();
    		$category['country'] = $this->country();
    		$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
    		$this->load->view('privacy', $category);
    	}

    	public function cookie_policy()
    	{
    		$category['values'] = $this->home_model->fetch_category();
    		$category['country'] = $this->country();
    		$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
    		$this->load->view('cookie_policy', $category);
    	}

    	public function legal_information()
    	{
    		$category['values'] = $this->home_model->fetch_category();
    		$category['country'] = $this->country();
    		$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
    		$this->load->view('legal_information', $category);
    	}

    	public function how_it_works()
    	{
    		$category['country'] = $this->country();
    		$category['values'] = $this->home_model->fetch_category();
    		$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
    		$this->load->view('how_it_works', $category);
    	}

    	public function copyright_images()
    	{
    		$category['country'] = $this->country();
    		$category['values'] = $this->home_model->fetch_category();
    		$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
    		$this->load->view('copyright_images', $category);
    	}

    	public function newsletter()
    	{
    		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[newsletter.email]|valid_email',
    			array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.',
                'valid_email'	=> '%s must be valid'
        		)
    		);

    		if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                echo json_encode(['error' => $er]);
            }else{
                echo json_encode(['success' => 'Subscription Completed Successfully']);

                $data = [
                	'email' => $this->input->post('email')
                ];
                
                $result = $this->home_model->save_newsletter($data);

                //email
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

		        $username = "fahim";
		        // $user_email = $this->product->get_email($user_id);;
		        // $password = "12345";
		        // $field = "web";
		        // echo $user_email; exit();

		        // var_dump($user_email);exit();

		        $this->email->from('admin@photoot.com', 'photoot');
		        $this->email->to($email);
		        $this->email->cc('hello');
		        $this->email->bcc('world');
		        $this->email->subject('Newsletter');
		        $this->email->message("You're successfully subscribed to photoot.com");
		        $this->email->send();
            }
    	}

    	public function why_choose_us(){
    		$category['country'] = $this->country();
    		$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->sub_category();
			$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
			// $category['services'] = $this->home_model->fetch_services();	

			$this->load->view('frontend/why_choose_us', $category);
    	}

    	public function checkout_validation()
    	{
    		

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('payment', 'Payment Method', 'required');
            $this->form_validation->set_rules('checkAgree', 'Agree', 'required');
            
           
           
            
 
            if( $this->form_validation->run() == FALSE ){
                $er = validation_errors();
                // $er = 'Test Validation';
                echo json_encode(['error' => $er]);
            }else{
                echo json_encode(['success' => 'Form Submitted Successfully']);

               }

               
    	}

		

		

		

		

		

		

		

		

		public function getdata()
		{
			$data = $this->home_model->data();
			var_dump(json_decode($data[0]->order_info)); exit();
			var_dump($data); exit();
		}

		

	    

	    

	    public function failedOrderDetails($order_id)
	    {
	    	echo $order_id;
	    }

	    

	    

	    


	    public function mail()
	    {
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
			$email = "fahimsultan4@gmail.com";
			$password = "12345";
			$field = "web";

			$this->email->from('admin@photoot.com', 'photoot');
			$this->email->to($email);
			$this->email->cc('hello');
			$this->email->bcc('world');
			$this->email->subject('Email Test');
			$this->email->message("Username: ".$username."\n Email: ".$email."\n Password: ".$password."\n Selected field: ".$field);
			if($this->email->send())
			{
				echo "Email sent";
			}
			else
			{
				echo "Error occured";
			}
	    }

	    

	    public function upload_file()
	    {
	    	$data = array();

	        if($this->input->post('submitForm') && !empty($_FILES['files']['name']))
	        {
	            $filesCount = count($_FILES['files']['name']);

	            for($i = 0; $i < $filesCount; $i++)
        		{ 
	        		$_FILES['upload_File']['name'] = $_FILES['files']['name'][$i]; 
	        		$_FILES['upload_File']['type'] = $_FILES['files']['type'][$i]; 
	        		$_FILES['upload_File']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
	        		$_FILES['upload_File']['error'] = $_FILES['files']['error'][$i]; 
	        		$_FILES['upload_File']['size'] = $_FILES['files']['size'][$i]; 
	        		$uploadPath = 'assets/zip/'; 
	        		$config['upload_path'] = $uploadPath; 
	        		$config['allowed_types'] = 'gif|jpg|png|mp4';
	        		$this->load->library('upload', $config);
	            
	            	$this->upload->initialize($config);
	                
	                if($this->upload->do_upload('upload_File')){
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['user_id'] = $this->input->post('user_id');
	                    $uploadData[$i]['order_id'] = $this->input->post('order_id');
	                    $uploadData[$i]['product_id'] = $this->input->post('product_id');
	                    $uploadData[$i]['file'] = $fileData['file_name'];
	                    $uploadData[$i]['created_on'] = date("Y-m-d H:i:s");
	                    $uploadData[$i]['updated_on'] = date("Y-m-d H:i:s");
	                }
	            }
	            if(!empty($uploadData))
	            {
	            	var_dump($uploadData);
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

	        $data['order'] = $this->input->post('order_id');
	    	$data['user'] = $this->input->post('user_id');
	    	$data['product_id'] = $this->input->post('product_id');
	    	$user_id = $this->session->userdata('id');
			$data['user_info'] = $this->home_model->user_info($user_id);

	        $this->load->view('upload_file', $data);
	    }


	    

	    private function do_up($value)
	    {
	        $type = explode('.', $_FILES[$value]["name"]);
	        $type = $type[count($type)-1];
	        $url = "./dropbox/".uniqid(rand()).'.'.$type;
	        if(in_array($type, array("jpg","jpeg","gif","png")))
	            if(is_uploaded_file($_FILES[$value]["tmp_name"]))
	                if(move_uploaded_file($_FILES[$value]["tmp_name"], $url))
	                    return $url;
	        return "";
	    }

	    public function htmlmail(){
	    	$this->load->library('email');

			$subject = 'This is a test';
			$message = '
			    <p>This message has been sent for testing purposes.</p>

			    <!-- Attaching an image example - an inline logo. -->
			    <p><img src="cid:logo_src" /></p>
			';

			// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
			    <title>' . html_escape($subject) . '</title>
			    <style type="text/css">
			        body {
			            font-family: Arial, Verdana, Helvetica, sans-serif;
			            font-size: 16px;
			        }
			    </style>
			</head>
			<body>
			' . $message . '
			</body>
			</html>';
			// Also, for getting full html you may use the following internal method:
			//$body = $this->email->full_html($subject, $message);

			// Attaching the logo first.
			$file_logo = FCPATH.'apple-touch-icon-precomposed.png';  // Change the path accordingly.
			// The last additional parameter is set to true in order
			// the image (logo) to appear inline, within the message text:
			$this->email->attach($file_logo, 'inline', null, '', true);
			$cid_logo = $this->email->get_attachment_cid($file_logo);
			$body = str_replace('cid:logo_src', 'cid:'.$cid_logo, $body);
			// End attaching the logo.

			$result = $this->email
			    ->from('yourusername@gmail.com')
			    ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
			    ->to('fahimsultan4@gmail.com')
			    ->subject($subject)
			    ->message($body)
			    ->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;
	    }

	    public function success_alert_free_order($id)
	    {
	    	$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
	    	$category['id'] = $id;
	    	$category['country'] = $this->country();
	    	$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->sub_category();

			$u_id = $id;
			// echo $u_id; exit();

			$user_id = $this->home_model->get_user_id_for_try_it_free($u_id);
			$id_user = $user_id->user_id;

			$user_email = $this->home_model->get_user_email_for_try_it_free($id_user);

			$email = $user_email->email;

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
			$this->email->subject('Try It Free');
			$this->email->message("Your Free Order Id Is: ".$u_id);
			$this->email->send();

	    	$this->load->view('frontend/try_it_free_success', $category);
	    }

	    public function success_alert_custom_order($id)
	    {
	    	$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
	    	$category['id'] = $id;
	    	$category['country'] = $this->country();
	    	$category['values'] = $this->home_model->fetch_category();
			$category['sub_category'] = $this->home_model->sub_category();

	    	$u_id = $id;
			// echo $u_id; exit();

			$user_id = $this->home_model->get_user_id_for_custom_quote($u_id);
		    $id_user = $user_id->user_id; //echo $id_user; exit();

			$user_email = $this->home_model->get_user_email_for_custom_quote($id_user);

			$email = $user_email->email;
			// echo $email; exit();

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
	            'custom_quote_id' => $u_id,
	            'user_info' => $user_email
	        );

			$this->email->from('admin@photoot.com', 'photoot');
			$this->email->to($email);
			$this->email->cc('hello');
			$this->email->bcc('world');
			$this->email->subject('Custom Quote');
			// $this->email->message("Your Custom Order Id Is: ".$u_id);
			$body = $this->load->view('custom_quote_email.php',$data,TRUE);
			$this->email->message($body);
			$this->email->send();

	    	

	    	$this->load->view('frontend/custom_quote_success', $category);
	    }

	    public function example()
	    {
	    	$user_id = $this->session->userdata('id');
			$category['user_info'] = $this->home_model->user_info($user_id);
	    	$category['country'] = $this->country();
	    	$this->load->view('example_page', $category);
	    }

	    public function helloMail(){
	      $userEmail='fahimsultan4@gmail.com';
	        $subject='Test';
	        $config = Array(       
	            'mailtype' => 'html',
	             'charset' => 'utf-8',
	             'priority' => '1'
	        );
	        $this->load->library('email', $config);
	    	$this->email->set_newline("\r\n");
	   
	        $this->email->from('admin@photoot.com', 'Photoot Clipping System');
	        $data = array(
	             'userName'=> 'Photoot Clipping System'
	                 );
	        $this->email->to($userEmail);  // replace it with receiver mail id
	    	$this->email->subject($subject); // replace it with relevant subject
	   
	        $body = $this->load->view('email_template.php',$data,TRUE);
	    	$this->email->message($body);  
	        if($this->email->send()){

               echo "Done";
            }
            else{
               echo "Not Done";
			}
		}
	}

?>
