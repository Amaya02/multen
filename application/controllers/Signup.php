<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
  	 	$this->load->model('signup_model');
        $this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('signup');
	}
	
	public function process(){
	
	$this->check_isValidated();
 
	$email_check=$this->signup_model->email_check($this->input->post('email'));
	
	if($email_check){
		$check=$this->signup_model->checklogotype();
		if($check){
			$check=$this->signup_model->checklogosize();
			if($check){
				$check=$this->signup_model->checkwebsitename();
				if($check){
					$this->signup_model->register_user();
					
					$this->session->set_flashdata('success_msg', 'Registered successfully. Login to your account.');
					$base=base_url();
					redirect($base);
				}
				else{
					$this->session->set_flashdata('error_msg', 'Website already exist!');
					redirect('signup');
				}
				
			}
			else{
				$this->session->set_flashdata('error_msg', 'Logo is too large!');
				redirect('signup');
			}
		}
		else{
			$this->session->set_flashdata('error_msg', 'Logo is not a valid image!');
			redirect('signup');
		}
	}
	else{
		$this->session->set_flashdata('error_msg', 'Email Already Exist');
		redirect('signup');
 
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
	
