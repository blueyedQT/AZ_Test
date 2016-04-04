<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function check_login($user) {
		$query = "SELECT * FROM `admin` WHERE username = '$user[username]' AND password = '$user[password]'";
		return $this->db->query($query)->row_array();
	}
}