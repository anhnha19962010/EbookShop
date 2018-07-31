<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends My_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product_model');
        $this->load->model('user_model');
        $this->load->model('sendmail');
            
        $this->load->library('form_validation');
        $this->load->helper('form');
     }
     
     function buy($id){
         // Set variables for paypal form
         $returnURL = base_url().'paypal/success'; //payment success url
         $cancelURL = base_url().'paypal/cancel'; //payment cancel url
         $notifyURL = base_url().'paypal/ipn'; //ipn url
        
    //     // Get product data
        $payment = $this->input->post('save');
        if ($payment != null) {
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $name  = $this->input->post('name');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('phone', 'Phone', 'required|integer|trim');
            if($this->form_validation->run() == FALSE){
                redirect();
            }else{
                if($this->user_model->getUserByEmail($email) == null){
                    $this->db->insert('users',array(
                        'name'  => $name,
                        'email' => $email,
                        'phone' => $phone
                    ));

                    $userID = $this->db->insert_id();

                }else{
                    $user = $this->user_model->getUserByEmail($email);
                    $userID = $user->id;
                }
                $product = $this->product_model->getProductById($id);
                 // Add fields to paypal form
                $this->paypal_lib->add_field('return', $returnURL);
                $this->paypal_lib->add_field('cancel_return', $cancelURL);
                $this->paypal_lib->add_field('notify_url', $notifyURL);
                $this->paypal_lib->add_field('item_name', $product->name);
                $this->paypal_lib->add_field('custom', $userID);
                $this->paypal_lib->add_field('item_number',  $product->id);
                $this->paypal_lib->add_field('amount',  $product->price);
                
                 // Load paypal form
                $this->paypal_lib->paypal_auto_form();
            }
        }else{
            $data['data'] = $this->product_model->getProductById($id);
            $this->_renderFrontLayout('order/payment',$data);
        }

    } 
}