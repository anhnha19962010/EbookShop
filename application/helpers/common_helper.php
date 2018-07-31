<?php

if (!function_exists('custom_debug')) {

	function custom_debug($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}

}
if (!function_exists('debug_sql')) {
	function debug_sql() {
		$CI = &get_instance();
		echo ($CI->db->last_query());
	}
}

if (!function_exists('custom_pagination')) {

	function custom_pagination($uri, $total_row, $per_page = NULL) {
		$CI = &get_instance();
		$CI->load->library('pagination');

		$per_page = $per_page;

		$config['base_url'] = $uri . "/page";
		$config['total_rows'] = $total_row;
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config["full_tag_close"] = '</ul>';
		$config["cur_tag_open"] = '<li>';
		$config["cur_tag_close"] = '</li>';
		$config["num_tag_open"] = '<li>';
		$config["num_tag_close"] = '</li>';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_tag_open"] = '<li>';
		$config["prev_tag_close"] = '</li>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config["cur_tag_open"] = '<li class="active"><a>';
		$config["cur_tag_close"] = '</a></li>';
		$config["first_url"] = $uri;
		$config["first_link"] = '<<';
		$config["last_link"] = '>>';

		$CI->pagination->initialize($config);
		return $CI->pagination->create_links();
	}

}

if (!function_exists('active_class')) {

	function active_class($menu = NULL, $array = NULL) {
		if ($menu && in_array($menu, $array)) {
			return 'active';
		}
		return '';
	}

}

if (!function_exists('breadcrumb')) {

	function breadcrumb($controller, $category_id) {
		$CI = &get_instance();
		$breadcrumb = '<ol class="breadcrumb">';

		$breadcrumb .= '<li><a href="' . getFriendlyUrl($coltroller, $uri) . '">' . $category_name . '</a></li>';

		$breadcrumb .= '</ol>';
		return $breadcrumb;
	}

}

function stringInsert($str, $insertstr, $pos) {
	$str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
	return $str;
}


if (!function_exists('get_category_by_id')) {

	function get_category_by_id($id, $is_project = FALSE) {
		$CI = &get_instance();
		$table = ($is_project) ? 'project_categories' : 'categories';
		$query = $CI->db->get_where($table, ['id' => $id]);
		$category = $query->row_object();
		return $category;
	}

}

if (!function_exists('load_element')) {
	function load_element($view, $data = [], $html_output = FALSE) {
		$CI = &get_instance();
		$CI->load->view($view, $data, $html_output);
	}
}
if (!function_exists('checkLogin')) {

	function checkLogin() {
		$CI = &get_instance();
		if ($CI->session->userdata('user_info') == null) {
			$str = sprintf('<li class="active">
                          <a href="%1$s" class="link-menu-head">
                            Đăng nhập
                          </a>
                        </li>', site_url('login'));
			return $str;
		}
	}

}

?>