<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{
    
     function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library(array('cart', 'paypal_lib'));
        $this->load->model('product');
     }
     
    function success(){
        if($this->cart->total_items() > 0){
            //destroy cart data after a successfull transaction
            $this->cart->destroy();

            /* getting user_id to update the payment status on pre_orders_info table */
            $user_id = $this->session->userdata('id');

            // updating payment_status
            $payment_status = $this->product->update_payment_status($user_id);

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
            $user_email = $this->product->get_email($user_id);
            // $password = "12345";
            // $field = "web";
            // echo $user_email; exit();

            // var_dump($user_email);exit();

            $full_email = '<html>';

                $full_email .= '<head>';  
                $full_email .= '<title>A Responsive Email Template</title>';
                $full_email .= '<meta charset="utf-8">';
                $full_email .= '<meta name="viewport" content="width=device-width, initial-scale=1">';
                $full_email .= '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
                $full_email .= '</head>';
                $full_email .= '<body style="max-width: 900px;">';
                $full_email .= '<table border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-collapse:separate;border-spacing:0 15px;">';    
                $full_email .= '<tr bgcolor="#F9F9F9" style="border-bottom: 1px solid #000000;overflow: hidden;">';
                $full_email .= '<td style="border-bottom: 1px solid #000000;overflow: hidden;">&nbsp;</td>';
                $full_email .= '<td align="right" style="border-bottom: 1px solid #000000;overflow: hidden;">';
                $full_email .= '<img src="front_assets/images/logo/logo.png" width="200px" height="60px">';
                $full_email .=  '</td>';
                $full_email .= '</tr>';

                            $full_email .='<tr>';
                                $full_email .='<td>&nbsp;</td>';
                                $full_email .='<td align="right" style="padding: 20px 0 0 0; font-style: bold; font-size: 18px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">';
                                $full_email .='<h1>Your order has been completed!</h1>';
                                
                               $full_email .='</td>';
                            $full_email .='</tr>';
                            $full_email .='<tr>';
                                $full_email .='<td>&nbsp;</td>';
                                $full_email .='<td align="right" style="padding: 20px 0 0 0; font-size: 16px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">Hi Aminul,';
                                    $full_email .='<p>in reference to your order No.<span style="color:#F11411;"><b>700</b></span><br>
                                        we inform you that the following works are completed';
                                         $full_email .='<br>and have been uploaded to My personal area</p>';
                                        

                                    $full_email .='</td>';
                                $full_email .='</tr>';
                                $full_email .='<tr>';
                                    $full_email .='<td>&nbsp;</td>';
                                    $full_email .='<td align="right">';
                                        $full_email .='<button style="background-color: #f11411; width: 365px; height: 57px; border-radius: 8px; margin-top: 35px; margin-bottom: 35px;"><a href="#" style="color: #fff; font-size: 22px; text-decoration: none;">My personal area ></a></button>';
                                    $full_email .='</td>';
                                $full_email .='</tr>';

                                $full_email .='<tr>';
                                 $full_email .='<td colspan="2" style=" border: 2px solid red; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0; margin-bottom: 35px;">';
                                  $full_email .='<img src="p.png" width="95%">';
                                $full_email .='</td>';
                               $full_email .='</tr>';
                               $full_email .='<tr>';
                                 $full_email .='<td colspan="2" style=" border: 2px solid #666665; background: #666665; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0;">';
                                    $full_email .='<img src="p2.png" width="98%">';
                                $full_email .='</td>';
                              $full_email .='</tr>';

                              $full_email .='<tr>';
                                $full_email .='<td colspan="2" style=" border: 2px solid #2C52A4; background: #2C52A4; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0; margin-top: 10px;">';
                                  $full_email .='<img src="p3.png" width="98%">';
                               $full_email .='</td>';
                            $full_email .='</tr>';
                              $full_email .='<tr>';
                                   $full_email .='<td colspan="2" style="text-align: center; font-size: 18px; padding-top: 8px;padding-bottom: 8px; border-top: 2px solid #ddd; width: 100%; border-bottom: 2px solid #ddd; margin-top: 35px">This email is sent automatically, so please do not reply to this address.';
                                   $full_email .='</td>';
                             $full_email .='</tr>';

                             $full_email .='<tr>';
                                $full_email .='<td>';
                                $full_email .='<p>';
                                $full_email .='DIDIACT<br>';
                                $full_email .='Sede Legale: Via Monte Gallo 3, 35143 Padova (PD) Italia<br>';
                                $full_email .='P. IVA 04249970270<br>';
                                $full_email .='REA RM - ------<br>';
                                $full_email .='C/C bancario presso UNICREDIT Banca<br>';
                                $full_email .='IBAN: IT94R0200812100000041334787<br>';
                                $full_email .='BIC/SWIFT: UNCRITM1920<br>';
                                $full_email .='Sito Web: www.photoot.com<br>';
                                $full_email .='Official Facebook Page<br>';
                                $full_email .='INFOLINE: 0490000 (Lun/Ven 8-20 Orario Continuato)<br>';
                                $full_email .='</p>';

                                $full_email .='</td>';
                            $full_email .='</tr>';

                        $full_email .='</table>';



                          
                $full_email .= '</body>
                </html>';

            $this->email->from('admin@photoot.com', 'photoot');
            $this->email->to($user_email);
            $this->email->cc('hello');
            $this->email->bcc('world');
            $this->email->subject('Email Test');
            $this->email->message("Email: ".$user_email."\n Paid: ".$amount."\n Transaction Id: ".$txn_id."\n Full Email: ".$full_email);
            if($this->email->send())
            {
                echo "";
            }
            else
            {
                echo "Error occured";
            }
            
            // Pass the transaction data to view
            $this->load->view('paypal/success', $data);
        }
        else{
            redirect('frontend/cart');
        }

    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
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

                $this->product->insertTransaction($data);
            }
        }
    }

}