<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal_custom extends CI_Controller{
    
     function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library(array('cart', 'paypal_custom_lib'));
        $this->load->model('product');
     }
     
    function success(){

        /* getting user_id to update the payment status on pre_orders_info table */
        $user_id = $this->session->userdata('id');

        // updating payment_status
        $payment_status = $this->product->update_custom_payment_status($user_id);

        // $email2 = $this->product->get_email($user_id);


        

        // Get the transaction data
        $paypalInfo = $this->input->get();

        // $data['item_name']      = $paypalInfo['item_name'];
        // $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["tx"];
        $data['payment_amt']    = $paypalInfo["amt"];
        $data['currency_code']  = $paypalInfo["cc"];
        $data['status']         = $paypalInfo["st"];

        $txn_id = $data['txn_id'];
        $amount = $data['payment_amt'];

        // var_dump($amount); exit();
        // Pass the transaction data to view
        $this->load->view('custom_paypal/success', $data);

    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('custom_paypal/cancel');
     }
     
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                // $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                $this->product->insertTransactionCustom($data);
            }
        }
    }

}