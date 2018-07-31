<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/**
 *
 */
class Brand_model extends CI_Model {
	private $table = 'brands';
	function __construct() {
		parent::__construct();

	}

	public function getAllBrands($order_by = 'id', $order_direction = 'ASC') {
		$this->db->order_by($order_by, $order_direction);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getBrand($page = 0) {
		$total = $this->db->count_all_results($this->table);
		$limit = $this->config->item('admin_per_page');
		$start = ($page < 1) ? 0 : ($page - 1) * $limit;

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get($this->table);
		$brands = $query->result();
		return ['total' => $total, 'brands' => $brands];
	}

	public function getBrandById($id = 0) {
		if ((int) $id > 0) {
			$query = $this->db->get_where($this->table, array('id' => $id));
			return $query->row();
		} else {
			return null;
		}
	}

	public function getBrandBySlug($slug = '') {
		if (!empty($slug)) {
			$query = $this->db->get_where($this->table, array('slug' => $slug));
			return $query->row();
		} else {
			return null;
		}
	}

	public function insert() {
		$name = $this->input->post('name');
		$now = date('Y:m:d H:i:s');
		$data = array(
			'name'         => $name,
			'created_date' => $now
		);
		return $this->db->insert($this->table, $data);
	}

	public function update() {
		$id = $this->input->post('bid');

		$name = $this->input->post('name');
		$data = array(
			'name' => $name,
		);
		return $this->db->update($this->table, $data, array('id' => $id));
	}

}
?>