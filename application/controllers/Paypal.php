<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends My_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product_model');
     }
     
    function success(){
        // Get the transaction data
        $paypalInfo = $this->input->get();
        
        $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];
        
        // Pass the transaction data to view
        $this->_renderFrontLayout('thankyou/index', $data);
    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('thankyou/error');
     }
     
     function ipn(){
        // Paypal return transaction details array
        $paypalInfo = $this->input->post();

        $data['user_id']     = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result     = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        
        // Check whether the payment is verified
        // if(preg_match("/VERIFIED/",$result)){
            // Insert the transaction data into the database
            $this->product_model->insertTransaction($data);
        // }
        if($paypalInfo["payment_status"] == 'Completed'){
            $token = 'EBK'.rand().time();
            $password_hash_token = password_hash($token,PASSWORD_DEFAULT);
            $download_token = implode("", explode("/", implode("", explode(".", $password_hash_token))));
            $dowload_url    = site_url().'download/'.$download_token;
            $order          = $this->createOrder($paypalInfo['item_number'],$download_token);
            $data_email     = array('name' => $order->name, 'price' => $order->price, 'date' => $order->date,'download_url'=>$dowload_url,'total'=>$order->total_download);
            $message        = $this->load->view('frontend/thankyou/emaildownload', $data_email, TRUE);

            $from           = 'bakerybpotechhue@gmail.com' ;
            $to             = $paypalInfo["payer_email"];
            $sub            = 'Ebook-Shop giao hàng';
            $this->sendmail->sendmail($from, $to, null, null, $sub, $message);
        }
    }

    public function createOrder($id,$download_token = null){
        if($download_token != null){
        $order = [];
        $order['created_date'] = date('Y-m-d H:i:s');
        $order['order_code'] = 'ebk'.time();
        $order['download_token'] = $download_token;
        $order['total_download'] = 3;

            if (!$this->db->insert('orders', $order)) {
                show_error($order_error_msg, 500, ERROR_HEADING);
                redirect();
            }
           
            $order_id = $this->db->insert_id();
            $product = $this->db->get_where('products',array('id'=>$id))->row();
            $order_details = [];
                $order_item = array(
                    'order_id' => $order_id,
                    'product_id' => $id,
                    'qty' => 1,
                    'price' => $product->price,
                    'user_id' => 1,
                );
                $order_details[] = $order_item;

            if (!$this->db->insert_batch('order_detail', $order_details)) {
                $this->db->delete('orders', ['id' => $order_id]);
                show_error($order_error_msg, 500, ERROR_HEADING);
                redirect();
            }

            $this->db->select('p.name,p.price,od.created_date as date,od.total_download');
            $this->db->from('orders od');
            $this->db->join('order_detail dt', 'od.id = dt.order_id', 'left');
            $this->db->join('products p', 'dt.product_id = p.id', 'left');
            $this->db->where(array('od.id' => $order_id));

            $query = $this->db->get();
            $order_download = $query->row();
            return $order_download;
        }
        redirect();
    }
}