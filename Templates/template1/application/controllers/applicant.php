<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class applicant extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
	}
	
	public function dashboard()
	{
		
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/applicantdashboard',$data);
	}
	
	public function profile()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/applicantprofile',$data);
	
	}
	
	public function applications()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/applicantapplications',$data);
	
	}
	
	public function interviews()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/interviews',$data);
	
	}
	
	public function jobs()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/jobs',$data);
	
	}
	
	public function companyprofiles()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/company',$data);
	
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
	
	
}