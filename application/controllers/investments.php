<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('templates/header');
	}

	public function index() {
		// $display['title'] = " - Welcome";
		// $this->load->view('templates/header', $display);

		$display['errors'] = $this->session->flashdata('errors');
		$display['message'] = $this->session->flashdata('message');
		$this->load->view('index', $display);
	}

	public function free_report_signup() {
		$this->form_validation->set_rules('first_name', 'Name', 'trim|min_length[2]|max+length[15]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
		if($this->form_validation->run() == FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('errors', $this->view_data['errors']);
			redirect('');
		} else {
			$this->load->model('InvestmentModel');
			$post = $this->input->post();
			$model = $post;
			$add_email = $this->InvestmentModel->add_user($model);
			if($add_email == FALSE) {
				$this->session->set_flashdata['errors'] = 'There was a system error, please try again.';
				redirect('');
			}
			// If successful send new customer to GetResponse API
			$this->load->library('GetResponse');
			$api = new GetResponse('929e79b37d3acd438f49957aab51521b'); // Testing Account
			$addContact = $api->addContact('pDm5M', $post['first_name'], $post['email']);

			// Optional message
			$message = "Success!";
			$this->session->set_flashdata('message', $message);

			redirect('free_report');
		}
	}

	public function free_report() {
		if($this->session->flashdata('message') == "Success!") {
			$this->load->view('free_land_scam_report');
		} else {
			redirect('');
		}
	}

	public function land() {
		$this->load->view('az_land');
	}

	public function contact() {
		$display = $this->session->flashdata('errors');

		$this->load->view('contact');
	}

	public function contact_form() {
		// ## Want to have it dsplay a success message on the form page ##
		// ## Load View? or Redirect Back? ##
		// var_dump($this->input->post());
		// die('Contact Form');
		// ## Form Validations ##
		// ## Need to find out what she is wanting to be required  (example either phone or email) ##
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max+length[15]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		// $this->form_validation->set_rules('phone', 'Phone Number', 'valid_phone_number_or_empty');
		if($this->form_validation->run() == FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('errors', $this->view_data['errors']);
					var_dump(validation_errors());
		die('Errors Back on Contact Form');
			redirect_back();
		}
		// ## If Successful Send and give success message ##
		// ## if not successful display message ##
		$this->load->view('contact', $message);
	}

	///////// Basic Structure, not yet using :)
	public function about() {
		// $display['title'] = " - About Us";
		// $this->load->view('templates/header', $display);
		$this->load->view('about');
	}

	public function invest() {
		// $display['title'] = " - Invest";
		// $this->load->view('templates/header', $display);
		$this->load->view('invest');
	}

	public function featured() {
		$this->load->view('featured');
	}

}