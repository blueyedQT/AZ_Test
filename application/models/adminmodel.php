<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function check_login($username) {
		$query = "SELECT * FROM admin WHERE username = '$username'";
		return $this->db->query($query)->row_array();
	}

	public function get_admins() {
		// ## Get data that is applicable to the view ##
		$query = "SELECT * FROM admin";
		return $this->db->query($query)->result_array();
	}

	public function register_admin($data) {
		$query = "INSERT INTO admin (username, password, created_at) VALUES (?, ?, CURRENT_TIMESTAMP)";
		$values = array($data['username'], $data['password']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}
}