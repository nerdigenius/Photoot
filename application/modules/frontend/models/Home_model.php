<?php

	class Home_model extends CI_Model{

		public function user_datas($user_id)
		{
			$query = $this->db->select('*')->where('id', $user_id)->from('user_info')->get();
			return $query->row();
		}

		public function fetch_category()
		{
			$query = $this->db->select('*')->from('categories')->join('sub_categories', 'sub_categories.category_id = categories.category_id', 'left')->get();
			return $query->result_array();
		}

		public function fetch_category_name($category_id)
		{
			$query = $this->db->select('*')->where('category_id', $category_id)->from('categories')->get();
			return $query->result();
		}

		public function sub_bread($sub_category_id)
		{
			$this->db->select('*');
			$this->db->from('sub_categories s');
			$this->db->join('categories c', 'c.category_id = s.category_id');
			$query = $this->db->get();
			$query_result = $query->row();
			return $query_result;
		}

		public function your_custom_order($custom_quote_id)
		{
			$query = $this->db->select('*')->where('fixed_id', $custom_quote_id)->from('custom_quote')->get();
            return $query->result();
		}

		public function delete_custom_file($custom_quote_id)
		{
			$this->db->where('custom_quote_id', $custom_quote_id)->delete('custom_quote');
		}

		public function sub_category()
		{
			$this->db->select('*')->from('sub_categories s')->join('categories c', 's.category_id = c.category_id');
			$query = $this->db->get();
			return $query->result();
		}

		public function fetch_services()
		{
			$query = $this->db->select('*')->from('services')->get();
			return $query->result();
		}

		public function fetch_sub_category($category_id)
		{
			$query = $this->db->select('*')->where('category_id', $category_id)->from('sub_categories')->get();
			return $query->result();
		} 

		public function fetch_product($sub_category_id)
		{
			$query = $this->db->select('*')->where('sub_category_id', $sub_category_id)->from('sub_categories')->get();
			return $query->result();
		}

		public function fetch_additional_services()
		{
			$query = $this->db->select('*')->from('additional_services')->get();
			return $query->result();
		}

		public function fetch_delivery_charge()
		{
			$query = $this->db->select('*')->from('delivery_charges')->get();
			return $query->result();
		}

		public function getRows($sub_category_id)
		{
			$this->db->select('*');
	        $this->db->from('sub_categories');
	        $this->db->where('sub_category_id', $sub_category_id);
	        $query = $this->db->get();
	        $result = $query->row_array();
	        
	        // Return fetched data
	        return !empty($result)?$result:false;
		}

		public function try_free($data)
		{
			$this->db->insert('try_it_free', $data);
		}

		public function addCustomQuote($data){
			$query = $this->db->insert('pre_custom_quote', $data['value']);
			if($this->db->affected_rows() > 0){
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
			// $insert_id = $this->db->insert_id();
   // 			return  $insert_id;
		}

		public function delete_custom_order($fixed_id)
		{
			$this->db->where('fixed_id', $fixed_id)->delete('custom_quote');
			$this->db->where('custom_quote_id', $fixed_id)->delete('pre_custom_quote');
		}

		public function addTryItFree($data)
		{
			$query = $this->db->insert('try_it_free', $data['value']);
			if($this->db->affected_rows() > 0){
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
		}

		public function free_order_file_by_admin($try_it_free_id)
		{
			$query = $this->db->select('*')->from('free_order_upload_by_admin')->where('fixed_id', $try_it_free_id)->get();
			return $query->result();
		}

		public function insert_pre_order($data)
		{
			$this->db->insert('pre_orders_info', $data['value']);

			if($this->db->affected_rows() > 0)
			{
				$insert_id = $this->db->insert_id();

   				return  $insert_id;
			}
			else
			{
				return false;
			}
			
			$i = 0;

			foreach($data as $key=>$val)
			{
				$value[$i]['product_id'] = $product_id[$key];
				$value[$i]['image'] = $image[$key];
				$value[$i]['product_name'] = $product_name[$key];
				$value[$i]['order_name'] = $order_name[$key];
				$value[$i]['sub_total'] = $sub_total[$key];
				$value[$i]['quantity'] = $quantity[$key];
				$value[$i]['number'] = $number[$key];
			}

			var_dump($data);

			var_dump($product_id, $image, $product_name, $order_name, $sub_total, $quantity, $number); exit();
		}

		public function get_order_info($user_id)
		{

			$query = $this->db->select('*')->from('pre_orders_info')->where('user_id', $user_id)->where('payment_status', '1')->order_by('order_id', 'DESC')->limit(1)->get();
			return $query->row_array();
		}

		public function order_info($order_id)
		{
			$query = $this->db->select('*')->from('pre_orders_info')->where('order_id', $order_id)->get();
			return $query->result();
		}

		public function data($user_id)
		{
			$results = array();
			$where = "p.payment_method='paypal' OR p.payment_method='bank'";
			$where2 = "p.payment_status='1' OR p.payment_status='0'";
			$query = $this->db->select('*')->from('pre_orders_info p')->where('p.user_id', $user_id)->where($where2)->where($where)->order_by('p.order_id', 'DESC')->get();
			if($query->num_rows() > 0)
			{
				$results = $query->result();
			}
			return $results;
		}

		public function order_detail($order_id, $user_id)
		{
			$query = $this->db->select('*')->where('order_id', $order_id)->where('user_id', $user_id)->from('pre_orders_info')->get();
			return $query->result();
		}

		public function user_data($user_id)
		{
			$query = $this->db->select('*')->where('id', $user_id)->from('user_info')->get();
			return $query->row();
		}

		public function file_uploaded_by_admin($order_id)
		{
			$query = $this->db->select('*')->where('order_id', $order_id)->from('upload_by_admin')->get();
			return $query->result();
		}

		public function custom_order_uploaded_by_admin($fixed_id)
		{
			$query = $this->db->select('*')->where('fixed_id', $fixed_id)->from('custom_order_upload_by_admin')->get();
			return $query->result();
		}

		public function get_autocomplete($search_data, $user_id)
		{
		    $this->db->select('*');
		    $this->db->where('user_id', $user_id)->where('payment_status', '1');
		    $this->db->like('order_id', $search_data);

		    return $this->db->get('pre_orders_info')->result();
		}

		public function paid_data($user_id)
		{
			$results = array();
			$query = $this->db->select('*')->from('pre_orders_info')->where('user_id', $user_id)->where('payment_status', '1')->order_by('order_id', 'DESC')->get();
			if($query->num_rows() > 0)
			{
				$results = $query->result();
			}
			return $results;
		}

		public function update_payment($user_id, $last_id)
		{
			$this->db->where('user_id', $user_id)->where('order_id', $last_id);
			$this->db->update('pre_orders_info', array("payment_method" => 'bank'));
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function update_payment_custom($user_id, $last_id)
		{
			$this->db->where('user_id', $user_id)->where('custom_quote_id', $last_id);
			$this->db->update('pre_custom_quote', array("payment_method" => 'bank'));
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function update_custom($fixed_id, $amount)
		{
			$this->db->where('custom_quote_id', $fixed_id);
			$this->db->update('pre_custom_quote', array("amount" => $amount));
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function custom_order($custom_quote_id)
		{
			$query = $this->db->select('*')->where('custom_quote_id', $custom_quote_id)->from('pre_custom_quote')->get();
			return $query->result();
		}

		public function fetch_data_custom($last_id, $user_id)
		{
			$query = $this->db->select('*')->from('pre_custom_quote p')->join('user_info u', 'u.id = p.user_id')->order_by('custom_quote_id', 'DESC')->limit(1)->get();
			return $query->result();
		}

		public function fetch_data($user_id)
		{
			$query = $this->db->select('*')->from('pre_orders_info p')->join('user_info u', 'u.id = p.user_id')->order_by('order_id', 'DESC')->limit(1)->get();
			return $query->result();
		}

		public function user_info($user_id)
		{
			$query = $this->db->select('*')->from('user_info')->where('id', $user_id)->get();
			return $query->row();
		}

		public function fetch_order_details($order_id)
		{
			$query = $this->db->select('*')->from('pre_orders_info')->where('order_id', $order_id)->get();
			
			return $query->result();
		}

		public function updateData($id, $data)
		{
			$this->db->where('id', $id);
			$this->db->update('user_info', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function file_add($data = array())
		{
			$result = $this->db->insert_batch('ordered_file', $data);
			return $result;
		}

		public function add_file($val)
		{
			$result = $this->db->insert('ordered_file', $val);

			return $result;
		}

		public function order_status($order_id, $order_status)
		{
			$this->db->where('order_id', $order_id)->update('pre_orders_info', $order_status);
		}

		public function show_file($user_id, $order_id, $product_id)
		{
			$query = $this->db->select('*')->from('ordered_file')->where('user_id', $user_id)->where('order_id', $order_id)->where('product_id', $product_id)->order_by('file_id', 'desc')->get();
			return $query->result();
		}

		public function delete_file($file_id)
		{
			$this->db->where('file_id', $file_id);
            $this->db->delete('ordered_file');
            if($this->db->affected_rows()>0){
                return true;
            } else{
                return false;
            }
		}

		public function save_newsletter($data)
		{
			$this->db->insert('newsletter', $data);
		}

		public function save_order_failed($data)
		{
			$this->db->insert('failedOrder', $data);
		}

		public function fetch_custom_quote($user_id)
		{
			$query = $this->db->select('*')->from('pre_custom_quote')->where('user_id', $user_id)->order_by('custom_quote_id', 'DESC')->get();
			return $query->result();
		}

		public function fetch_free_order($user_id){
			$query = $this->db->select('*')->from('try_it_free_file f')->join('try_it_free t', 't.try_it_free_id = f.fixed_id')->where('f.user_id', $user_id)->get();
			return $query->result();
		}

		public function search_key($key)
		{
			$query = $this->db->like('sub_category_name', $key)->get('sub_categories');
			return $query->result();
		}

		public function checkEmail($email)
		{
			$query = $this->db->select('id, email')->from('user_info')->where('email', $email)->get();
			return $query->row();
		}

		public function update_user_info($user_id, $number)
		{
			$data = [
				'forgotPassword' => $number,
			];
			$this->db->where('id', $user_id);
			$this->db->update('user_info', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function checkForgotPassword($forgotPassword, $user_id)
		{
			$this->db->select('*');
			$this->db->where('forgotPassword', $forgotPassword);
			$this->db->where('id', $user_id);
			$this->db->from('user_info');
			$query = $this->db->get();
			return $query->row();
		}

		public function changePasswordDone($user_id, $data)
		{
			$this->db->where('id', $user_id);
			$this->db->update('user_info', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
		}

		public function get_user_id_for_try_it_free($u_id)
		{
			$query = $this->db->select('*')->where('try_it_free', $u_id)->from('try_it_free')->get();
			return $query->row();
		}

		public function get_email_for_custom_quote_success($user_id)
		{
			$query = $this->db->select('*')->where('id', $user_id)->from('user_info')->get();
			return $query->row();	
		}

		public function get_user_email_for_try_it_free($id_user)
		{
			$query = $this->db->select('*')->where('id', $id_user)->from('user_info')->get();
			return $query->row();	
		}

		public function get_user_id_for_custom_quote($u_id)
		{
			$query = $this->db->select('*')->where('custom_quote_id', $u_id)->from('pre_custom_quote')->get();
			return $query->row();
		}

		public function get_user_email_for_custom_quote($id_user)
		{
			$query = $this->db->select('*')->where('id', $id_user)->from('user_info')->get();
			return $query->row();
		}
	}

?>
