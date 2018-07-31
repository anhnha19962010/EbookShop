<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends My_Controller {

	public function __construct() {
		parent::__construct();
		$this->page_title = 'Trang Chi Tiết';
		$this->load->model('product_model');
		// $this->load->model('admin/category_model');
		$this->load->model('order_model');
	}

	public function index($id) {
		$this->canonical_url = site_url();
		// $data = $this->order_model->getMaxOrderByIdProduct();
		$data['all'] = $this->product_model->getProduct(1,30);
		$data['data'] = $this->product_model->getProductById($id);
		$this->_renderFrontLayout('detail/index',$data);
	}

}
