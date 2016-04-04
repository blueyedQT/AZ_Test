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
		// ## Set Validations to be secure and correct! ##
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == TRUE) {
			$post = $this->input->post();
			$this->load->model('AdminModel');
			$result = $this->AdminModel->check_login($post);
			if($result != NULL) {
				redirect('admin_dashboard');
			} 		
		}
		$this->session->set_flashdata('errors', 'Incorrect Login');
		redirect('admin');
	}

	public function dashboard() {
		// ## Check if user is loggedin.  If not direct back to login page, or normal home page ##
		$this->load->view('admin/dashboard');
	}

}