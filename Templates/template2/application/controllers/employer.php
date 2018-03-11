<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employer extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->model('user_model');
			$this->check_isValidated();
		 
	}
	public function dashboard()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/employerdashboard',$data);

		
	}
	
	public function applicants(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/employerapplicant',$data);
	}
	
	public function applicantview(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/applicantview',$data);
	}
	
	public function jobs(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/employerjobs',$data);
	}
	
	public function viewjob(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/viewjob',$data);
	}
	
	public function preselection(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/pre-selection',$data);
	}
	public function interview(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/interview',$data);
	}
	
	public function interviewapplicant(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/interviewapplicant',$data);
	}
	
	public function selected(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/selected',$data);
	}
	
	public function hired(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/hired',$data);
	}
	
	public function setting(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/setting',$data);
	}
	
	public function editaccount(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/editaccount',$data);
	}
	
	public function search(){
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/search',$data);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}

	
}
