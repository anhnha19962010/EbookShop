<?php
/**
 * @author nguyenthanhnha , frontend nguyen an, javascript Ho dac quyen
 */
class My_Controller extends CI_Controller {

	public $active_menu = '';
	public $menu = 'dashboard';
	public $title = 'Ebooks';
	public $page_title = '';
	public $category;
	public $brand;
	public $canonical_url = NULL;
	public $theme_path = 'frontend/';

	function __construct() {
		parent::__construct();
		if ($this->uri->segment(1) != 'admin') {
			$this->load->library('cart');
			$this->cart->product_name_rules = '[:print:]';
			if ($this->config->item('maintenance_m[:print:]ode') == TRUE) {
				$output = $this->load->view('maintenance', '', TRUE);
				die($output);
			}
		}
		$this->_getAllBrandAnCategory();
		if ($this->session->userdata('userID')==null) {
			$id = time();
			$this->session->set_userdata('userID',$id);
		}
		
		
	}

	public function _is_admin() {
		if (!$this->session->userdata('is_admin')) {
			redirect(site_url('admin/login'));
		}
	}
	public function _is_user() {

		if ($this->session->userdata('is_admin') == null && $this->session->userdata('is_user') == null) {

			redirect('login');
		}
	}

	public function _renderAdminLayout($view, $data = NULL) {
		$this->load->vars($data);
		$this->load->view('admin/_part/top');
		$this->load->view('admin/_part/header');
		$this->load->view('admin/_part/sidebar', ['menu' => $this->menu]);
		$this->load->view($view);
		$this->load->view('admin/_part/footer');
		$this->load->view('admin/_part/bot');
	}

	public function _renderFrontLayout($views, $data = array(), $include_sidebar = FALSE) {
		$data['category'] = $this->category;
		$data['brand'] = $this->brand;
		$data['canonical_url'] = $this->canonical_url;
		$data['page_title'] = $this->page_title;

		$this->load->vars($data);
		$this->load->view($this->theme_path . '_part/top');
		$this->load->view($this->theme_path . '_part/header');
		$this->load->view($this->theme_path . $views);
		$this->load->view($this->theme_path . '_part/footer');
		$this->load->view($this->theme_path . '_part/bot');
	}

	public function _loadElement($view, $data = [], $html_output = FALSE) {
		if ($html_output) {
			return $this->load->view($this->theme_path . $view, $data, $html_output);
		} else {
			$this->load->view($this->theme_path . $view, $data, $html_output);
		}
	}
	public function _loadElementAdmin($view, $data = [], $html_output = FALSE) {
		if ($html_output) {
			return $this->load->view($view, $data, $html_output);
		} else {
			$this->load->view($view, $data, $html_output);
		}
	}

	public function _getAllBrandAnCategory()
	{
		$this->load->model('product_model');
		$data = $this->product_model->getAllCategoryAndBrand();
		$this->category = $data['categories'];
		$this->brand    = $data['brands'];
	}
}

?>