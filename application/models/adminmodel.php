<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function check_login($username) {
		$query = "SELECT * FROM admin WHERE username = '$username'";
		return $this->db->query($query)->row_array();
	}

// ## Just for development ## //
	public function any_admin() {
		$count = $this->db->count_all('admin');
		if($count < 1) {
			// create admin
			$pass = "admin";
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$hash = crypt($pass, $salt);

			$query = "INSERT INTO admin (first_name, last_name, username, password, created_at, created_by, updated_by) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, 0, 0)";
			$values = array('admin', 'admin', 'admin', $hash);
			$this->db->query($query, $values);
		}
		return;
	}
// ## End Development Code ## //

	public function get_admins() {
		// ## Get data that is applicable to the view ##
		$query = "SELECT * FROM admin";
		return $this->db->query($query)->result_array();
	}

	public function register_admin($data) {
		$query = "INSERT INTO admin (first_name, last_name, username, password, created_at, created_by, updated_by) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		$values = array($data['first_name'], $data['last_name'], $data['username'], $data['password'], $data['admin'], $data['admin']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_admin($id) {
		$query = "SELECT * FROM admin WHERE id = $id";
		return $this->db->query($query)->row_array();
	}

	public function update_admin($data) {
		$query = "UPDATE admin SET first_name = ?, last_name = ?, updated_by = ? WHERE id = ?";
		$values = array($data['first_name'], $data['last_name'], $data['admin'], $data['id']);
		return $this->db->query($query, $values);
	}

	public function delete_admin($id) {
		$query = "DELETE FROM admin WHERE id = $id";
		return $this->db->query($query);
	}
}