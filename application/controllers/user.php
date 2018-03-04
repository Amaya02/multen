<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
	}
	
	public function dashboard(){
		$data['metadata']=$this->session->userdata();
		$configid = $this->session->userdata('configid');
		$data['config']=$this->user_model->getClientsConfig(array('configid'=>$configid));
		$this->load->view('user/userdashboard',$data);
	}
	
	public function applicants()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userapplicant');
	}
	
	public function applicantview()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userapplicantview');
	}
	
	public function bills()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userbill');
	}
	
	public function employers()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/useremployer');
	}
	
	public function employerview()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/useremployerview');
	}
	
	public function hired()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userhired');
	}
	
	public function interview()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userinterview');
	}
	
	public function interviewapplicant()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userinterviewapplicant');
	}
	
	public function preselection()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userpreselection');
	}
	
	public function search()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/usersearch');
	}
	
	public function setting()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/usersetting');
	}
	
	public function editaccount()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/usersettingedit');
	}
	
	public function selected()
	{
		// if the user is validated, then this function will run
		$this->load->view('user/userselected');
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
			
}
?>