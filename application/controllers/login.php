<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
	}
	
	public function index()
	{
		// load the model
		$this->load->model('user_model');
		// Validate the user can login
		$result = $this->user_model->validateadmin();
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show error message 
			$this->load->model('user_model');
			// Validate the user can login
			$result = $this->user_model->validateuser();
			// Now we verify the result
			if(! $result){
				$base=base_url();
				$this->session->set_flashdata('error_msg', 'Invalid email or password');
				redirect($base);
			}
			else{
				// If user did validate,
				// redirect to dashboard
				redirect('dashboard');
			}
		}
		else{
			// If user did validate,
			// redirect to dashboard
			redirect('admindashboard');
		}
	}
	
	private function check_isValidated(){
		$user = $this->input->post('email');
		$pass = $this->input->post('password');

		if(strlen($user)==0 || strlen ($pass)==0){
			$base=base_url();
			redirect($base);
		}
	}
}

?>
	
