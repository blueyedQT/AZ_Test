<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('templates/header');
	}

	public function index() {
		// $display['title'] = " - Welcome";
		// $this->load->view('templates/header');

		$display['errors'] = $this->session->flashdata('errors');
		$display['message'] = $this->session->flashdata('message');
		$this->load->view('index', $display);
	}

	public function free_report_signup() {
		$this->form_validation->set_rules('first_name', 'Name', 'trim|min_length[2]|max+length[15]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('city', 'City', 'required');
		if($this->form_validation->run() == FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('errors', $this->view_data['errors']);
			redirect('');
		} else {
			$this->load->model('InvestmentModel');
			$post = $this->input->post();
			$add_email = $this->InvestmentModel->add_user($post);
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
		$display['errors'] = $this->session->flashdata('errors');
		$display['message'] = $this->session->flashdata('message');
		$this->load->view('contact', $display);
	}

	public function contact_form() {
		## Need to find out what she is wanting to be required and make as secure as possible! (example either phone or email) ##
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone Number', 'valid_phone_number_or_empty');
		$this->form_validation->set_rules('message', 'Message', 'min_length[5]|max_length[150]');
		if($this->form_validation->run() == FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('errors', $this->view_data['errors']);
		} else {
			// ## Testing EMAIL ##
			$post = $this->input->post();
			$this->load->library('email');
			// ## These can be added to config.php or even made into their own file ##
			$config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                   );
			$this->email->initialize($config);
			$this->email->from($post['email'], $post['name']);
			$this->email->to('katrina@kursodevelopment.com', 'Contact Us'); // ## Need to change to actual email address it will be sent to ##
			$this->email->subject('Contact Form Request');
			$body = $this->load->view('emails/contact', $post, true);
			$this->email->message($body);	
			$this->email->send();
			// ## End Testing ##

			$this->session->set_flashdata('message', 'Your message was sent!');
		}
		redirect_back();
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