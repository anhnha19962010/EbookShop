<?php
 defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );


 class Filemanager extends My_Controller {

  public function __construct() {
   parent::__construct ();
   $this->load->helper('download');
   $this->load->model('order_model');
  }
 
  public function index() {
   $this->load->view ( 'welcome', $data );
  }
 
  public function download($download_token = NULL) { 
      $product = $this->order_model->getProductbyDownloadToken($download_token);
      if($product != null){
          $id       = $product->id;
          $fileName = $product->path;
          $total    = $product->total_download;
          $fileName_array = explode("/",$fileName);
          $filename = $fileName_array[3];
          $file = realpath($fileName);
          // check file exists    
          if (file_exists ( $file )) {
            // get file content
            $data = file_get_contents ( $file );
            echo $data;
            if( $total > 1 ){
              $total = $total - 1;
              $this->db->update('orders',array('total_download'=>$total),array('id'=>$id));
            }else if( $total == 1 ){
              $total = $total - 1;
              $this->db->update('orders',array('total_download'=>$total,'download_token'=>''),array('id'=>$id));
            }
           //force download
            force_download ( $filename, $data );
            
          } else {
            // Redirect to base url
              redirect ( base_url () );
          }
      }else{
              exit('Bạn đã dùng hết lượt tải.');
      }
      


      
      
  }
}