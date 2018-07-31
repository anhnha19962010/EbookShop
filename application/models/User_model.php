<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/**
 *
 */
class User_model extends CI_Model {

	private $table = 'users';

	function __construct() {
		parent::__construct();

	}

	public function getUserByEmail($Email){
		$query = $this->db->get_where( $this->table , array('email' => $Email) );
		$user  = $query->row();
		return $user; 
	}

	
	
}

?>