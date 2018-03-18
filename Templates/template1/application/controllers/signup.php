<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
  	 	$this->load->model('user_model');
		$this->load->model('employer_model');
		$this->load->model('applicant_model');
        $this->load->library('session');
	}
	
	public function applicant(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/signup',$data);
	}
	
	public function employer(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/signup',$data);
	}
	
	public function employerprocess(){
	
	$this->check_isValidated();
	
	$email_check=$this->employer_model->email_check($this->input->post('email'));
	
	if($email_check){
		$email_check1=$this->employer_model->email_check1($this->input->post('email'));
		if($email_check1){
			$check=$this->employer_model->checkcompanyname();
			if($check){
				$this->employer_model->register_user();
				$this->session->set_flashdata('success_msg', 'Registered successfully. Login to your account.');
				$base=base_url();
				redirect($base);
			}
			else{
				$this->session->set_flashdata('error_msg', 'Company Already Exist!');
				redirect('signup/employer');
			}
		}
		else{
			$this->session->set_flashdata('error_msg', 'Email Already Exist!');
			redirect('signup/employer');
		}
	}
	else{
		$this->session->set_flashdata('error_msg', 'Email Already Exist!');
		redirect('signup/employer');
	}
		
 
	}
	
	public function applicantprocess(){
	
	$this->check_isValidated();
	
	$email_check=$this->applicant_model->email_check($this->input->post('email'));
	
	if($email_check){
		$email_check1=$this->applicant_model->email_check1($this->input->post('email'));
		if($email_check1){
			$this->applicant_model->register_user();
			$this->session->set_flashdata('success_msg', 'Registered successfully. Login to your account.');
			$base=base_url();
			redirect($base);
		}
		else{
			$this->session->set_flashdata('error_msg', 'Email Already Exist!');
			redirect('signup/applicant');
		}
	}
	else{
		$this->session->set_flashdata('error_msg', 'Email Already Exist!');
		redirect('signup/applicant');
	}
		
	}
	
	private function check_isValidated(){
		$user = $this->input->post('email');
		$pass = $this->input->post('pass');

		if(strlen($user)==0 || strlen ($pass)==0){
			$base=base_url();
			redirect($base);
		}
	}
}

?>
	
