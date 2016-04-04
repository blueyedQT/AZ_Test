<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$display['loggedin'] = $this->session->userdata('loggedin');
		$this->load->view('admin/templates/header', $display);
	}

	public function index() {	
		var_dump($this->session->all_userdata());
		// ## Check if logged in and if so redirect to dashboard ##
		// if($this->session->userdata('loggedin') == true) {
		// 	redirect('admin_dashboard');
		// }
		$display['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/login', $display);
	}

	public function login() {
		// ## Set Validations to be secure and correct! ##
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == TRUE) {
			$post = $this->input->post();
			$username = $post['username'];
			$password = $post['password'];
			$this->load->model('AdminModel');
			$admin = $this->AdminModel->check_login($username);
			if($admin != NULL) {
				if(crypt($password, $admin['password']) == $admin['password']) {
					$new_data = array (
						'id' => $admin['id'],
						'loggedin' => true,
						'admin' => true
						);
				// ## Also want to be sure that I am using sessions in the most secure way possible ##
					$this->session->set_userdata($new_data);
					redirect('admin_dashboard');
				}
			} 		
		}
		$this->session->set_flashdata('errors', 'Incorrect Login');
		redirect('admin');
	}

	public function dashboard() {
		// ## Check if user is loggedin.  If not direct back to login page, or normal home page ##
		// ## If logged in, get admin information and display ##
		// ## Get apporporite other information based on admin level and display ##
		$admin = $this->session->all_userdata();
		var_dump($admin);
		if($admin['loggedin'] == true && $admin['admin'] == true) {
					$this->load->model('AdminModel');
					$display['admins'] = $this->AdminModel->get_admins();
					$this->load->view('admin/dashboard', $display);
		} else {
			redirect('admin');
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		// ## logout user and destroy session ##
		$this->session->set_userdata('loggedin', FALSE);
		$this->session->set_userdata('admin', FALSE);
		redirect('admin');
	}

	public function add_admin() {
		$display['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/add_admin', $display);
	}

	public function register_admin() {
		// ## Validations! ##
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == TRUE) {
			$post = $this->input->post();
			// ## Double Check Password? ##
			// ## Check Session and redirect if no
			$post = $this->input->post();
			$pass = $post['password'];
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$hash = crypt($pass, $salt);

			$model = $post;
			$model['password'] = $hash;
			$model['admin'] = $this->session->userdata('id');

			$this->load->model('AdminModel');
			$new_admin = $this->AdminModel->register_admin($model);
			if($new_admin == FALSE) {
				$this->session->set_flashdata['errors'] = 'There was a system error, please try again.';
				redirect('add_admin');
			}
		}
		redirect('admin_dashboard');	
	}

	public function remove_admin() {
		$post = $this->input->post();
		var_dump($post);
	}

}