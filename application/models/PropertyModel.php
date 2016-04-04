<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PropertyModel extends CI_Model {

	public function get_properties() {
		$query = "SELECT properties.id, addresses.address, cities.city FROM `properties` 
							LEFT JOIN addresses ON properties.address_id = addresses.id
							LEFT JOIN cities ON addresses.city_id = cities.id";
		return $this->db->query($query)->result_array();
	}

	public function get_cities() {
		$query = "SELECT * FROM cities";
		return $this->db->query($query)->result_array();
	}

	public function add_property($data) {
		$query1 = "INSERT INTO addresses (address, address2, city_id, created_at, created_by, updated_by) VALUES (?, ?, ?, NOW(), ?, ?)";
		$values1 = array($data['address1'], $data['address2'], $data['city'], $data['admin'], $data['admin']);
		$this->db->query($query1, $values1);
		$address = $this->db->insert_id();
		$query2 = "INSERT INTO properties (address_id, created_at, created_by, updated_by) VALUES (?, NOW(), ?, ?)";
		$values2 = array($address, $data['admin'], $data['admin']);
		$this->db->query($query2, $values2);
		return $this->db->insert_id();
	}
}