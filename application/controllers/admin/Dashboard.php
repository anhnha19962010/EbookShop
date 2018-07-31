<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct() {
		parent::__construct();
		// $this->_is_admin();
		$this->menu = 'dashboard';
		$this->page_title = 'Admin Dashboard';
		$this->load->helper(array('form', 'html', 'file', 'path', 'secure'));
		// $this->load->model('admin/users_model');
		// $this->load->model('admin/dashboard_model');
		$this->load->library('form_validation');
	}

	public function index() {
		// var_dump('expression');
		// exit();
		$data['page_title'] = 'Dashboard';
		// $email = $this->session->userdata('user_info')['email'];
		// $data['data'] = $this->users_model->get_record_by_email($email);
		$this->_renderAdminLayout('admin/dashboard');
	}
}
?>