<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$display['loggedin'] = $this->session->userdata('loggedin');
		$this->load->view('admin/templates/header', $display);
	}

	public function index() {	
		// var_dump($this->session->all_userdata());
		// ## Check if logged in and if so redirect to dashboard ##
		if($this->session->userdata('loggedin') == true) {
			redirect('admin_dashboard');
		}
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
						'name' => $admin['first_name'],
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
		// var_dump($admin);
		if($admin['loggedin'] == true && $admin['admin'] == true) {
					$this->load->model('AdminModel');
					$display['admins'] = $this->AdminModel->get_admins();
					$display['name'] = $this->session->userdata('name');
					$display['id'] = $this->session->userdata('id');
					$this->load->view('admin/dashboard', $display);
		} else {
			redirect('admin');
		}
	}

	public function logout() {
		$this->session->set_userdata('loggedin', FALSE);
		$this->session->set_userdata('admin', FALSE);
		$this->session->sess_destroy();		
		redirect('admin');
	}

	public function add_admin() {
		if($this->session->userdata('admin') !== true && $this->session->userdata('loggedin') !== true) {
			redirect('admin');
		}
		$display['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/add_admin', $display);
	}

	public function register_admin() {
// ## Validations! ##
		if($this->session->userdata('admin') !== true && $this->session->userdata('loggedin') !== true) {
			redirect('admin');
		}
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == TRUE) {
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

	public function edit_admin($id) {
		if($this->session->userdata('admin') !== true && $this->session->userdata('loggedin') !== true) {
			redirect('admin');
		}
		$this->load->model('AdminModel');
		$display['admin'] = $this->AdminModel->get_admin($id);
		$display['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/edit_admin', $display);
	}

	public function update_admin() {
		if($this->session->userdata('admin') !== true && $this->session->userdata('loggedin') !== true) {
			redirect('admin');
		}
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		if($this->form_validation->run() == true) {
			$post = $this->input->post();
			$post['admin'] = $this->session->userdata('id');
			$this->load->model('AdminModel');
			$result = $this->AdminModel->update_admin($post);
			if($result == true) {
				redirect('admin_dashboard');
			} else {
				$this->set->flashdata('errors', 'There was an error, please try again');
				redirect_back();
			}
		}
	}

	public function delete_admin($id) {
		if($this->session->userdata('admin') !== true && $this->session->userdata('loggedin') !== true) {
			redirect('admin');
		}
		$this->load->model('AdminModel');
		$result = $this->AdminModel->delete_admin($id);
		if($result == true) {
			redirect('admin_dashboard');
		} else {
			$this->set->flashdata('errors', 'There was an error, please try again');
			redirect_back();
		}
	}

}