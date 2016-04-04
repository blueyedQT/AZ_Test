<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('admin/templates/header');
	}

	public function index() {	
		var_dump($this->session->all_userdata());
		// ## Check if logged in and if so redirect to dashboard ##
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
				$new_data = array (
					'id' => $result['id'],
					'logged_in' => true
					);
				$this->session->set_userdata($new_data);
				redirect('admin_dashboard');
			} 		
		}
		$this->session->set_flashdata('errors', 'Incorrect Login');
		redirect('admin');
	}

	public function dashboard() {
		// ## Check if user is loggedin.  If not direct back to login page, or normal home page ##
		// ## If logged in, get admin information and display ##
		// ## Get apporporite other information based on admin level and display ##
		var_dump($this->session->all_userdata());
		if($this->session->userdata('logged_in') == true) {
					$this->load->view('admin/dashboard');
		} else {
			redirect('admin');
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		// ## logout user and destroy session ##
		redirect('admin');
	}

}