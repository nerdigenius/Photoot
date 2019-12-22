<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->proTable   = 'products';
        $this->transTable = 'payments';
    }
    
    public function update_payment_status($user_id)
    {
        $this->db->where("user_id", $user_id)->limit(1)->order_by('order_id', 'desc');
        $this->db->update('pre_orders_info', array("payment_status" => '1', "payment_method" => 'paypal'));
    }

    public function update_custom_payment_status($user_id)
    {
        $this->db->where("user_id", $user_id)->limit(1)->order_by('custom_quote_id', 'desc');
        $this->db->update('pre_custom_quote', array("payment_status" => 'Paid', "payment_method" => 'paypal'));
    }
    
    /*
     * Insert data in the database
     * @param data array
     */
    public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
    }

    public function insertTransactionCustom($data){
        $insert = $this->db->insert('custom_payments',$data);
        return $insert?true:false;
    }

    public function get_email($user_id)
    {
        $query = $this->db->select('email')->from('user_info')->where('id', $user_id)->get();
        return $query->row()->email;
    }
    
}