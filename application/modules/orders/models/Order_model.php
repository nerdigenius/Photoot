<?php

    class Order_model extends CI_Model{
        public function show(){
            
        }
        
        public function edit(){
            
        }
        
        public function update(){
            
        }

        public function show_file()
        {
            $where = "pre_orders_info.payment_method='paypal' OR pre_orders_info.payment_method='bank'";
            $this->db->select('*')->where($where);
            $this->db->from('pre_orders_info')->order_by('order_id', 'DESC');
            // $this->db->join('orders_status o', 'p.order_id = o.order_id'); 
            $query = $this->db->get();
            return $query->result();

        }

        public function show_free_order()
        {
            $this->db->select('*');
            $this->db->from('try_it_free t')->join('try_it_free_file f', 'f.fixed_id = t.try_it_free_id'); 
            $query = $this->db->get();
            return $query->result();
        }

        public function free_file_view($fixed_id)
        {
            $query = $this->db->select('*')->from('try_it_free_file')->where('fixed_id', $fixed_id)->get();
            return $query->result();
        }

        public function update_free_order_status($data, $fixed_id)
        {
            $this->db->where('fixed_id', $fixed_id);
            $this->db->update('try_it_free_file', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
        }

        public function view_file($order_id)
        {
        	$query = $this->db->select('*')->from('ordered_file')->where('order_id', $order_id)->order_by('file_id', 'desc')->get();
			return $query->result();
        }

        public function upload_file($order_id)
        {
            $query = $this->db->select('*')->where('payment_status', '1')->where('order_id', $order_id)->from('pre_orders_info')->get();
            return $query->result();
        }

        public function get_user_id_for_regular_order_dashboard($order_id)
        {
            $query = $this->db->select('*')->where('order_id', $order_id)->from('pre_orders_info')->get();
            return $query->row();
        }

        public function get_user_email_for_regular_order_dashboard($id_user)
        {
            $query = $this->db->select('*')->where('id', $id_user)->from('user_info')->get();
            return $query->row();
        }

        public function update_status($order_id)
        {
            $data = [
                // 'order_id' => $this->input->post('order_id'),
                'order_status' => $this->input->post('order_status')
            ];
            // var_dump($data); exit();
            $this->db->where('order_id', $order_id);
            $this->db->update('pre_orders_info', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
        }

        public function update_custome_status($custom_quote_id)
        {
            $data = [
                'order_status' => $this->input->post('order_status')
            ];
            $this->db->where('custom_quote_id', $custom_quote_id);
            $this->db->update('pre_custom_quote', $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
        }

        public function update_custom_status($order_status, $custom_quote_id, $user_id)
        {
            $data = [
                'order_status' => $order_status
            ];
            $this->db->where('custom_quote_id', $custom_quote_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('pre_custom_quote', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function change_quote_status($quote_status, $custom_quote_id, $id_user)
        {
            $data = [
                'quote_status' => $quote_status
            ];
            $this->db->where('custom_quote_id', $custom_quote_id);
            $this->db->where('user_id', $id_user);
            $this->db->update('pre_custom_quote', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function change_payment_status_for_regular_order($payment_status, $order_id, $id_user)
        {
            $data = [
                'payment_status' => $payment_status
            ];
            $this->db->where('order_id', $order_id);
            $this->db->where('user_id', $id_user);
            $this->db->update('pre_orders_info', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function change_payment_status($payment_status, $custom_quote_id, $user_id)
        {
            $data = [
                'payment_status' => $payment_status
            ];
            $this->db->where('custom_quote_id', $custom_quote_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('pre_custom_quote', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function get_user_id($fixed_id)
        {
            // $this->db->select('*');
            // $this->db->from('try_it_free t')->join('try_it_free_file f', 'f.fixed_id = t.try_it_free_id'); 
            // $query = $this->db->get();
            // return $query->result();
            $query = $this->db->select('user_id')->where('fixed_id', $fixed_id)->from('try_it_free_file')->get();
            return $query->row();
        }

        public function get_user_email($user_id)
        {
            $query = $this->db->select('email')->where('id', $user_id)->from('user_info')->get();
            return $query->row();
        }

        public function get_user_id_for_regular_order($order_id)
        {
            $query = $this->db->select('user_id')->where('order_id', $order_id)->from('pre_orders_info')->get();
            return $query->row();
        }

        public function get_user_email_for_regular_order($user_id)
        {
            $query = $this->db->select('email')->where('id', $user_id)->from('user_info')->get();
            return $query->row();
        }

        public function get_user_id_for_custom_quote($custom_quote_id)
        {
            $query = $this->db->select('user_id')->where('custom_quote_id', $custom_quote_id)->from('pre_custom_quote')->get();
            return $query->row();
        }

        public function get_user_id_for_custom_quote_mail($custom_quote_id)
        {
            $query = $this->db->select('*')->where('custom_quote_id', $custom_quote_id)->from('pre_custom_quote')->get();
            return $query->row();
        }

        public function get_user_email_for_custom_quote_mail($id_user)
        {
            $query = $this->db->select('*')->where('id', $id_user)->from('user_info')->get();
            return $query->row();
        }

        public function get_user_email_for_custom_quote($user_id)
        {
            $query = $this->db->select('email')->where('id', $user_id)->from('user_info')->get();
            return $query->row();
        }

        public function show_custom_quote()
        {
            $query = $this->db->select('*')->from('pre_custom_quote')->order_by('custom_quote_id', 'desc')->get();
            return $query->result();
        }

        public function show_individual($fixed_id)
        {
            $query = $this->db->select('*')->where('fixed_id', $fixed_id)->from('custom_quote')->get();
            return $query->result();
        }

        public function additional_info($fixed_id)
        {
            $query = $this->db->select('*')->where('custom_quote_id', $fixed_id)->from('pre_custom_quote')->get();
            return $query->result();
        }

        public function update_amount($data, $custom_quote_id)
        {
            $this->db->where('custom_quote_id', $custom_quote_id);
            $this->db->update('custom_quote', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
        }
    }

?>