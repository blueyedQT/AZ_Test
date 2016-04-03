<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('admin/templates/header');
	}

	public function index() {	
		$display['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/login', $display);
	}

	public function login() {
		var_dump($this->input->post());
	}

	public function dashboard() {

	}

}