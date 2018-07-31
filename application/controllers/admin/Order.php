<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Order extends My_Controller {

	function __construct() {
		parent::__construct();
		// $this->_is_admin();
		$this->load->model('order_model');
		$this->menu = 'order';
		$this->page_title = 'Đơn mua hàng';
		$this->load->helper(array('form', 'html', 'file', 'path'));
		$this->load->library('form_validation');
	}

	public function index() {
		if ($this->uri->segment(5) === False) {
			$page = 0;
		} else {
			$page = $this->uri->segment(5);
		}
		$data['total_price'] = $this->order_model->getTotalPaymenByMonth();
		$data['data'] = $this->order_model->getOrder($page, 10);

		$this->_renderAdminLayout('admin/order/index', $data);
	}

	public function edit($order_id = 0, $status = NULL) {
		if ((int) $order_id > 0) {
			$this->db->update('orders', array('status' => $status), array('order_id' => $order_id));
			redirect('admin/Order');
		}
		redirect('admin/Order');
	}

	public function delete($order_id = 0) {
		if ((int) $order_id > 0) {
			$this->db->delete('orders', array('order_id' => $order_id));
			$this->db->delete('order_detail', array('order_id' => $order_id));
			redirect('admin/Order');
		}
		redirect('admin/Order');
	}
	
}
?>