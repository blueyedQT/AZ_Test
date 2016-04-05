<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PropertyModel extends CI_Model {

	public function get_properties() {
		$query = "SELECT properties.id, addresses.address, cities.city, images.file_name AS image FROM `properties` 
							LEFT JOIN addresses ON properties.address_id = addresses.id
							LEFT JOIN cities ON addresses.city_id = cities.id
							LEFT JOIN property_images ON properties.id = property_images.property_id
							LEFT JOIN images ON property_images.image_id = images.id
							ORDER BY properties.updated_at DESC
							LIMIT 5";
		return $this->db->query($query)->result_array();
	}

	public function get_cities() {
		$query = "SELECT * FROM cities";
		return $this->db->query($query)->result_array();
	}

	public function add_property($data) {
		$this->db->trans_start();
		$query1 = "INSERT INTO addresses (address, address2, city_id, created_at, created_by, updated_by) VALUES (?, ?, ?, NOW(), ?, ?)";
		$values1 = array($data['address1'], $data['address2'], $data['city'], $data['admin'], $data['admin']);
		$this->db->query($query1, $values1);

		$address = $this->db->insert_id();
		$query2 = "INSERT INTO images (file_name, created_by) VALUES (?, ?)";
		$values2 = array($data['image'], $data['admin']);
		$this->db->query($query2, $values2);
		$image_id = $this->db->insert_id();

		$query3 = "INSERT INTO properties (address_id, created_at, created_by, updated_by) VALUES (?, NOW(), ?, ?)";
		$values3 = array($address, $data['admin'], $data['admin']);
		$this->db->query($query3, $values3);
		$property_id = $this->db->insert_id();

		$query4 = "INSERT INTO property_images (property_id, image_id) VALUES (?, ?)";
		$values4 = array($property_id, $image_id);
		$this->db->query($query4, $values4);
		$result = $this->db->insert_id();
		if($this->db->trans_complete()) {
			return true;
		} else {
			return false;
		}
	}
}