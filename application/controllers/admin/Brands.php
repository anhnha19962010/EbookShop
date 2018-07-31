<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends My_Controller {

	public function __construct() {
		parent::__construct();
		// $this->_is_admin();
		$this->menu = 'brands';
		$this->page_title = 'Hãng';
		$this->load->helper(array('form', 'html', 'file', 'path'));
		$this->load->library('form_validation');
		$this->load->model('brand_model');
	}

	public function index($page = 1) {
		$this->canonical_url = site_url();
		$data['data'] = $this->brand_model->getBrand($page);
		$this->_renderAdminLayout('admin/brand/index',$data);
	}

	public function add($value='')
	{
		if ($this->input->post('save')) {
			$this->save();
		} else {
			$data['controller'] = $this;
			$this->_renderAdminLayout('admin/brand/add');
		}
	}

	public function edit($id)
	{
		$data['brands'] = $this->brand_model->getBrandById($id);
		$data['controller'] = $this;
		$data['bid'] = $this->input->post('cid');
		if ($this->input->post('save')) {
			$this->save();
		} else {
			$this->_renderAdminLayout('admin/brand/edit', $data);
		}
	}

	public function save()
	{
		$id = $this->input->post('bid');
		if ((int) $id > 0) {
			if ($this->brand_model->update()) {
				$this->session->set_flashdata('msg', 'Hãng đã được cập nhật');
				redirect('admin/Brands');
			}
			$this->session->set_flashdata('msg', 'Hãng cập nhật thất bại');
			redirect('admin/Brands');
		} else {
			if ($this->brand_model->insert()) {
				$this->session->set_flashdata('msg', 'Hãng mới đã được thêm vào');
				redirect('admin/Brands');
			}
			$this->session->set_flashdata('msg', 'Hãng mới đã được thêm vào');
			redirect('admin/Brands');
		}
	}

	public function delete($id)
	{
		$this->db->delete('brands', array('id' => $id));
		$this->session->set_flashdata('msg', 'Hãng đã được xóa thành công');
		redirect('admin/Brands');
	}

	public function action() {
		$val = $this->input->post('val');
		$action = $this->input->post('hidAction');
		if ($action == 'delete') {
			$in = implode(',', $val);
			$this->db->where("id in ($in)");
			$this->db->delete('brands');
		}
		redirect('admin/Brands');
	}

}