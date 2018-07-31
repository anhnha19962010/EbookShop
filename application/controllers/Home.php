<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

	public function __construct() {
		parent::__construct();
		$this->page_title = 'Trang chủ';
		$this->load->model('product_model');
		// $this->load->model('admin/category_model');
		$this->load->model('order_model');
	}

	public function index($page = 1) {
		$this->canonical_url = site_url();
		// $data = $this->order_model->getMaxOrderByIdProduct();
		$data['all'] = $this->product_model->getProduct($page,30);
		$this->_renderFrontLayout('home/index',$data);
	}

}
