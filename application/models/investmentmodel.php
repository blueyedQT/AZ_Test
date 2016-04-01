<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InvestmentModel extends CI_Model {

	public function add_user($user) {
		$query = "INSERT INTO users (first_name, email) VALUES ('$user[first_name]', '$user[email]')";
		$this->db->query($query);
		return $this->db->insert_id();
	}
}