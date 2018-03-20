<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employer extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->model('user_model');
			$this->load->model('employer_model');
			$this->check_isValidated();
		 
	}
	public function dashboard()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/employerdashboard',$data);
	}
	
	public function applicants(){
		$data['posts'] = $this->user_model->getData();
		$empid = $this->session->userdata('empid');
		$pos = $this->employer_model->getjobs(array('empid'=>$empid));
		$job = [];
		$count=0;
		for($i=0; $i<count($pos) ; $i++){
			$posid = $pos[$i]['posid'];
			$appli = $this->employer_model->getapplication(array('posid'=>$posid,'status !='=>'hired'));
			for($j=0; $j<count($appli) ; $j++){
				$appid = $appli[$j]['appid'];
				$app = $this->employer_model->getapplicant(array('appid'=>$appid));
				$job[$count]['appid'] = $app[0]['appid'];
				$job[$count]['appliid'] = $appli[$j]['appliid'];
				$job[$count]['fname'] = $app[0]['fname'];
				$job[$count]['mname'] = $app[0]['mname'];
				$job[$count]['lname'] = $app[0]['lname'];
				$job[$count]['posid'] = $pos[$i]['posid'];
				$job[$count]['position'] = $pos[$i]['position'];
				$count++;
			}
		}
		$data['job'] = $job;
		$this->load->view('employer/employerapplicant',$data);
	}
	
	public function applicantview($appid){
		$data['posts'] = $this->user_model->getData();
		$app = $this->employer_model->getapplicant(array('appid'=>$appid));
		$data['exp']= $this->employer_model->getExp(array('appid'=>$appid));
		$data['educ']= $this->employer_model->getEduc(array('appid'=>$appid));
		$data['skill']= $this->employer_model->getSkill(array('appid'=>$appid));
		$data['app']=$app;
		$this->load->view('employer/applicantview',$data);
	}
	
	public function jobs(){
		$data['posts'] = $this->user_model->getData();
		$empid = $this->session->userdata('empid');
		$pos = $this->employer_model->getjobs(array('empid'=>$empid));
		$data['pos']=$pos;
		$this->load->view('employer/employerjobs',$data);
	}
	
	public function viewjob($posid){
		$data['posts'] = $this->user_model->getData();
		$pos = $this->employer_model->getjobs(array('posid'=>$posid));
		$job[0]['position'] = $pos[0]['position'];
		$job[0]['posid'] = $pos[0]['posid'];
		$job[0]['companyname'] = $this->session->userdata('companyname');
		$job[0]['address'] = $this->session->userdata('address');
		$job[0]['city'] = $this->session->userdata('city');
		$job[0]['state'] = $this->session->userdata('state');
		$job[0]['jobdesc'] = $pos[0]['jobdesc'];
		$job[0]['jobreq'] = $pos[0]['jobreq'];
		$appli = $this->employer_model->getapplication(array('posid'=>$posid));
		$job[0]['num'] = count($appli);
		$job1 = [];
		$appli = $this->employer_model->getapplication(array('posid'=>$posid,'status !='=>'hired'));
		for($i=0; $i<count($appli) ; $i++){
			$appid = $appli[$i]['appid'];
			$app = $this->employer_model->getapplicant(array('appid'=>$appid));
			$job1[$i]['appid'] = $app[0]['appid'];
			$job1[$i]['fname'] = $app[0]['fname'];
			$job1[$i]['mname'] = $app[0]['mname'];
			$job1[$i]['lname'] = $app[0]['lname'];
		}
		$data['job']=$job;
		$data['job1']=$job1;
		$this->load->view('employer/viewjob',$data);
	}
	
	public function editjob($posid)
	{
		$pos = $this->employer_model->getjobs(array('posid'=>$posid));
		$data['pos'] = $pos;
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/editjob',$data);
	
	}
	
	public function updatejob($posid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->employer_model->updatejob($posid);
		$this->session->set_flashdata('success_msg', 'Updated successfully');
		redirect('employer/jobs');
	
	}
	
	public function deletejob($posid)
	{
		$this->employer_model->deletejob(array('posid'=>$posid));
		redirect('employer/jobs');
	
	}
	
	public function addjob()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('employer/addjob',$data);
	
	}
	
	public function saveaddjob()
	{
		$data['posts'] = $this->user_model->getData();
		$empid = $this->session->userdata('empid');
		$this->employer_model->addjob($empid);
		$this->session->set_flashdata('success_msg', 'Added successfully');
		redirect('employer/jobs');
	
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
		$empid = $this->session->userdata('empid');
		$pos = $this->employer_model->getjobs(array('empid'=>$empid));
		$job = [];
		$count=0;
		for($i=0; $i<count($pos) ; $i++){
			$posid = $pos[$i]['posid'];
			$appli = $this->employer_model->getapplication(array('posid'=>$posid,'status'=>'selected'));
			for($j=0; $j<count($appli) ; $j++){
				$appid = $appli[$j]['appid'];
				$app = $this->employer_model->getapplicant(array('appid'=>$appid));
				$job[$count]['appid'] = $app[0]['appid'];
				$job[$count]['appliid'] = $appli[$j]['appliid'];
				$job[$count]['fname'] = $app[0]['fname'];
				$job[$count]['mname'] = $app[0]['mname'];
				$job[$count]['lname'] = $app[0]['lname'];
				$job[$count]['posid'] = $pos[$i]['posid'];
				$job[$count]['position'] = $pos[$i]['position'];
				$count++;
			}
		}
		$data['job'] = $job;
		$this->load->view('employer/selected',$data);
	}
	
	public function preselect($appliid){
		$data['posts'] = $this->user_model->getData();
		$this->employer_model->preselect($appliid);
		redirect('employer/selected');
	}
	
	public function hire($appliid){
		$data['posts'] = $this->user_model->getData();
		$this->employer_model->hire($appliid);
		redirect('employer/selected');
	}
	
	public function hired(){
		$data['posts'] = $this->user_model->getData();
		$empid = $this->session->userdata('empid');
		$pos = $this->employer_model->getjobs(array('empid'=>$empid));
		$job = [];
		$count=0;
		for($i=0; $i<count($pos) ; $i++){
			$posid = $pos[$i]['posid'];
			$appli = $this->employer_model->getapplication(array('posid'=>$posid,'status'=>'hired'));
			for($j=0; $j<count($appli) ; $j++){
				$appid = $appli[$j]['appid'];
				$app = $this->employer_model->getapplicant(array('appid'=>$appid));
				$job[$count]['appid'] = $app[0]['appid'];
				$job[$count]['appliid'] = $appli[$j]['appliid'];
				$job[$count]['fname'] = $app[0]['fname'];
				$job[$count]['mname'] = $app[0]['mname'];
				$job[$count]['lname'] = $app[0]['lname'];
				$job[$count]['posid'] = $pos[$i]['posid'];
				$job[$count]['position'] = $pos[$i]['position'];
				$count++;
			}
		}
		$data['job'] = $job;
		$this->load->view('employer/hired',$data);
	}
	
	public function setting(){
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('employer/setting',$data);
	}
	
	public function savesetting(){
		$empid = $this->session->userdata('empid');
		$data['posts'] = $this->user_model->getData();
		$email_check=$this->employer_model->email_check2($this->input->post('email'),$empid);
		if($email_check){
			$email_check1=$this->employer_model->email_check1($this->input->post('email'));
			if($email_check1){
				$this->employer_model->updateaccount($empid);
				$this->session->set_flashdata('success_msg', 'Updated successfully');
				redirect('employer/setting');
			}
			else{
				$this->session->set_flashdata('error_msg', 'Email already exist!');
				redirect('employer/setting');
			}
		}
		else{
				$this->session->set_flashdata('error_msg', 'Email already exist!');
				redirect('employer/setting');
			}
	}
	
	public function editpassword()
	{
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('employer/editpassword',$data);
	
	}
	
	public function savepassword()
	{
		$empid = $this->session->userdata('empid');
		$data['posts'] = $this->user_model->getData();
		$email_check=$this->employer_model->pass_check($empid);
		if($email_check){
			$this->employer_model->updatepassword($empid);
			$this->session->set_flashdata('success_msg', 'Updated successfully');
			redirect('employer/setting');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Incorrect password!');
				redirect('employer/setting');
			}
	
	}
	
	public function editaccount(){
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('employer/editaccount',$data);
	}
	
	public function logout(){
		$this->session->set_userdata('validatedemp',false);
		$base=base_url();
		redirect($base);
	}
	
	public function downloadresume()
	{
		$filename= $_GET['nama'];
		$webs = $this->user_model->getWebsitename();
		$target_dir = "C:/xampp/htdocs/".$webs[0]['websitename']."/assets/resume/";
		$path = $target_dir.$filename;
		$size = filesize($path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		$file = @ fopen($path, 'rb');
		if ($file) {
		fpassthru($file);
		}
	}
	
	public function search()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getData();
		$keyword = $this->input->get('keyword');
		$empid = $this->session->userdata('empid');
		$posi = $this->employer_model->searchjob($keyword,$empid);
		$data['result2'] = $posi;
		$data['key']=$keyword;
		$this->load->view('employer/search',$data);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validatedemp')){
			redirect('404_override');
		}
	}

	
}
