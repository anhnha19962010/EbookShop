<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/**
 *
 */
class Product_model extends CI_Model {

	private $table = 'products';

	function __construct() {
		parent::__construct();
		$this->transTable = 'payments';

	}

	public function getAllProduct() {
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getProduct($page, $total_page) {
		$total = $this->db->count_all_results($this->table);
		$limit = $total_page;
		$start = ((int) $page <= 1) ? 0 : ($page - 1) * $limit;
		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'DESC');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->db->join('product_brand pb', 'p.id = pb.product_id', 'left');
		$this->db->join('brands b', 'b.id = pb.brand_id', 'left');
		$this->db->join('product_images pi', 'p.id = pi.product_id', 'left');
		$this->db->join('product_document pd', 'p.id = pd.product_id', 'left');
		$this->db->where('pi.active','Yes');
		$this->db->select('p.*, c.name as category, pi.path_img as image , pd.path as document,b.name as brand');
		$query    = $this->db->get();
		$products = $query->result();
		return ['total' => $total, 'products' => $products];
	}

	public function getAllCategoryAndBrand(){
		$this->db->from('categories c');
		$this->db->join('products p','p.category_id = c.id','left');
		$this->db->group_by('c.name');
		$this->db->select('c.name, count(p.id) as total, c.id');
		$query = $this->db->get();
		$categories = $query->result();
		
		$query = $this->db->get('brands');
		$brands = $query->result();

		return ['brands' => $brands, 'categories' => $categories];
	}

	public function getProductById($id = 0) {
		if ((int) $id > 0) {

			// Get product
			$this->db->select('p.*, c.name as category , c.id as category_id , b.id as brand_id');
			$this->db->join('categories c', 'c.id = p.category_id', 'left');
			$this->db->join('product_brand pb', 'p.id = pb.product_id', 'left');
			$this->db->join('brands b', 'b.id = pb.brand_id', 'left');
			$this->db->where('p.id', $id);
			$this->db->from($this->table . ' p');
			$query = $this->db->get();
			$product = $query->row();
			if (!$product) {
				return null;
			}

			//Get product images
			$this->db->select('active , path_img');
			$query = $this->db->get_where('product_images', array('product_id' => $id));
			$images = $query->result();
			$product->images = $images;

			//Get product document
			$this->db->select('path as path_doc');
			$query = $this->db->get_where('product_document', array('product_id' => $id));
			$docs = $query->row();
			$product->docs = $docs;

			return $product;
		} else {
			return NULL;
		}
	}

	public function insert() {
		$name = $this->input->post('name');

		$category_id = $this->input->post('category_id');
		$brand_id = $this->input->post('brand_id');
		$description = $this->input->post('description');
		$price = implode(explode(',', $this->input->post('price')));
		$now = date('Y-m-d H:i:s');

		$data = array(
			'name' => $name,
			'price' => $price,
			'category_id' => $category_id,
			'descriptions' => $description,
			'created_date' => $now,
		);
		if (!$this->db->insert($this->table, $data)) {
			return false;
		}

		$product_id = $this->db->insert_id();
		//add images
		$image = $this->input->post('image');
		$other_imgs = $this->input->post('other_img');
		$product_images = array(['product_id' => $product_id, 'active' => 'Yes', 'path_img' => $image]);
		if($other_imgs!=null){
			foreach ($other_imgs as $key => $img) {
				$product_images[] = [
					'product_id' => $product_id,
					'path_img' => $img,
					'active' => 'No',
				];
			}
		}
		
		$this->db->insert_batch('product_images', $product_images);

		//add document
		$docs = $this->input->post('docs');
		$product_document = array(['product_id' => $product_id, 'created_date' => $now, 'path' => $docs]);
		$this->db->insert_batch('product_document', $product_document);

		return $product_id;
	}

	public function update() {
		$id = $this->input->post('pid');
		$name = $this->input->post('name');

		$category_id = $this->input->post('category_id');
		$brand_id = $this->input->post('brand_id');
		$description = $this->input->post('description');
		$price = implode(explode(',', $this->input->post('price')));
		$now = date('Y-m-d H:i:s');

		$data = array(
			'name' => $name,
			'price' => $price,
			'category_id' => $category_id,
			'descriptions' => $description,
			'updated_date' => $now,
		);

		//Remove all old images
		$this->db->delete('product_images', ['product_id' => $id]);
		//Add Product images
		$image = $this->input->post('image');
		$other_imgs = $this->input->post('other_img');
		$product_images = array(['product_id' => $id, 'active' => 'Yes', 'path_img' => $image]);
		if($other_imgs!=null){
			foreach ($other_imgs as $key => $img) {
				$product_images[] = [
					'product_id' => $id,
					'path_img' => $img,
					'active' => 'No',
				];
			}
		}
		
		$this->db->insert_batch('product_images', $product_images);

		//Remove all old docs
		$this->db->delete('product_document', ['product_id' => $id]);
		//Add Product docs
		$docs = $this->input->post('docs');
		$product_document = array(['product_id' => $id, 'created_date' => $now, 'path' => $docs]);
		$this->db->insert_batch('product_document', $product_document);

		return $this->db->update($this->table, $data, array('id' => $id));
	}

	public function getFrontProducts($page = 0, $total_page = 30) {
		$this->db->select('id');
		$total = $this->db->count_all_results($this->table);
		$limit = ($total > $total_page) ? $total_page : $total;
		$start = ($page <= 1) ? 0 : ($page - 1) * $limit;
		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'DESC');
		$this->db->from('products p');
		$this->db->join('categories c', 'p.category_id = c.id', 'left');
		$this->db->join('product_images im', 'p.id = im.product_id', 'left');
		$this->db->where(array('im.featured' => 'Yes'));
		$this->db->select('p.id, p.name, p.price, p.slug, p.code, im.path as image, c.name as category');
		$query = $this->db->get();
		$products = $query->result();
		return ["total" => $total, "products" => $products];
	}

	// Insert transaction data
    public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
	
}

?>