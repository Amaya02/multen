<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
		$this->load->model('tenant_model');
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
		$data['applicants'] = $this->tenant_model->getApplicants();
		$this->load->view('user/userapplicant',$data);
	}
	
	public function applicantview($appid)
	{
		// if the user is validated, then this function will run
		$app = $this->tenant_model->getApplicants(array('appid'=>$appid));
		$educ = $this->tenant_model->getApplicantsEduc(array('appid'=>$appid));
		$skill = $this->tenant_model->getApplicantsSkill(array('appid'=>$appid));
		$exp = $this->tenant_model->getApplicantsExp(array('appid'=>$appid));
		if( count($app)>0){
			$data['app'] = $app;
			$data['educ'] = $educ;
			$data['skill'] = $skill;
			$data['exp'] = $exp;
			//find the student record
			//load the view
			$this->load->view('user/userapplicantview',$data);		
		}		
		else{
			redirect('user/applicants','refresh');
		}
	}
	
	public function bills()
	{
		// if the user is validated, then this function will run
		$billid = $this->session->userdata('billid');
		$data['bill']=$this->user_model->getClientsBill(array('billid'=>$billid));
		$data['metadata']=$this->session->userdata();
		$this->load->view('user/userbill',$data);
	}
	
	public function employers()
	{
		// if the user is validated, then this function will run
		$data['employers'] = $this->tenant_model->getEmployers();
		$this->load->view('user/useremployer',$data);
	}
	
	public function employerview($empid)
	{
		// if the user is validated, then this function will run
		$emp = $this->tenant_model->getEmployers(array('empid'=>$empid));
		if( count($emp)>0){
			$data['emp'] = $emp;
			//find the student record
			//load the view
			$this->load->view('user/useremployerview',$data);		
		}		
		else{
			redirect('user/employers','refresh');
		}
		
	}
	
	public function hired()
	{
		// if the user is validated, then this function will run
		$data['applicants'] = $this->tenant_model->getApplicantList("select DISTINCT a.*, p.position, p.posid, p.empid, app.appid, app.status, app.posid, app.appliid, e.empid, e.companyname from applicant a, position p, application app, employer e where a.appid = app.appid and p.posid = app.posid and e.empid = p.empid and app.status='hired'");
		$data['position'] = $this->tenant_model->getPositions();
		$this->load->view('user/userhired',$data);
	}
	
	public function interview()
	{
		// if the user is validated, then this function will run
		$data['interview'] = $this->tenant_model->getInterviewList("select DISTINCT a.fname, a.mname, a.lname, a.appid, p.position, e.companyname, app.status, p.posid, i.* from position p, employer e, applicant a, interview i, application app where i.status='ongoing' and app.status='interview' and app.appliid = i.appliid and app.appid = a.appid and app.posid = p.posid and p.empid = e.empid");
		$data['position'] = $this->tenant_model->getPositions();
		$data['interview2'] = $this->tenant_model->getInterviewList("select DISTINCT a.fname, a.mname, a.lname, a.appid, p.position, e.companyname, app.status, p.posid, i.* from position p, employer e, applicant a, interview i, application app where i.status='done' and app.status='interview' and app.appliid = i.appliid and app.appid = a.appid and app.posid = p.posid and p.empid = e.empid");
		$this->load->view('user/userinterview',$data);
	}
	
	public function interviewupdatestatus($id)
	{
		// if the user is validated, then this function will run
		$this->tenant_model->interviewupdatestatus($id);
		redirect('user/interview');
	}
	
	public function updatestatus($appliid,$status)
	{
		// if the user is validated, then this function will run
		if($status=="selected" || $status=="failed"){
			$this->tenant_model->deleteinterview($appliid);
		}
		$this->tenant_model->updatestatus($appliid,$status);
		redirect('user/preselection');
	}
	
	public function interviewapplicant($posid,$appid,$appliid)
	{
		// if the user is validated, then this function will run
		if($posid == NULL && $appid==NULL && $appliid==NULL){
			redirect('user/interview');
		}
		$data['appliid']=$appliid;
		$data['id']=$appid;
		$data['posid']=$posid;
		$this->load->view('user/userinterviewapplicant',$data);
	}
	
	public function processinterview($appliid)
	{
		// if the user is validated, then this function will run
		$id=$this->input->post('appid');
		$posid=$this->input->post('posid');
		$month=$_POST['month'];
		$day=$_POST['day'];
		$year=$_POST['year'];
		$place=$this->input->post('place');
		$this->tenant_model->insertinterview($appliid,$month,$day,$year,$place);
		$status = "interview";
		$this->tenant_model->updatestatus($appliid,$status);
		$this->session->set_flashdata('success_msg', 'Interview created successfully');
		redirect('user/interview');
	}
	
	public function preselection()
	{
		// if the user is validated, then this function will run
		$data['applicants'] = $this->tenant_model->getApplicantList("select DISTINCT a.*, p.position, p.posid, p.empid, app.appid, app.status, app.posid, app.appliid, e.empid, e.companyname from applicant a, position p, application app, employer e where a.appid = app.appid and p.posid = app.posid and e.empid = p.empid and app.status='preselection'");
		$data['position'] = $this->tenant_model->getPositions();
		$this->load->view('user/userpreselection',$data);
	}
	
	public function search()
	{
		// if the user is validated, then this function will run
		$keyword = $this->input->get('keyword');
		$data['result1']=$this->tenant_model->searchcompany($keyword);
		$data['result2']=$this->tenant_model->searchapplicant($keyword);
		$data['key']=$keyword;
		$this->load->view('user/usersearch',$data);
	}
	
	public function setting()
	{
		// if the user is validated, then this function will run
		$data['metadata']=$this->session->userdata();
		$this->load->view('user/usersetting',$data);
	}
	
	public function editaccount()
	{
		// if the user is validated, then this function will run
		$data['metadata']=$this->session->userdata();
		$this->load->view('user/usersettingedit',$data);
	}
	
	public function processedit()
	{
		// if the user is validated, then this function will run
		$id=$this->input->post('userid');
		$email_check=$this->tenant_model->email_check($this->input->post('email'),$id);
		
		if($email_check){
			$email_check1=$this->tenant_model->email_check1($this->input->post('email'));
			if($email_check1){
				$check=$this->tenant_model->checkcompanyname($id);
				if($check){
					$this->tenant_model->updateuser($id);
					$this->session->set_flashdata('success_msg', 'Updated successfully');
					redirect('user/setting');
				}
				else{
					$this->session->set_flashdata('error_msg', 'Companyname already exist!');
					redirect('user/editaccount');
				}
			}
			else{
				$this->session->set_flashdata('error_msg', 'email already exist!');
				redirect('user/editaccount');
			}
		}
		else{
				$this->session->set_flashdata('error_msg', 'email already exist!');
				redirect('user/editaccount');
			}
	}
	
	public function selected()
	{
		// if the user is validated, then this function will run
		$data['applicants'] = $this->tenant_model->getApplicantList("select DISTINCT a.*, p.position, p.posid, p.empid, app.appid, app.status, app.posid, app.appliid, e.empid, e.companyname from applicant a, position p, application app, employer e where a.appid = app.appid and p.posid = app.posid and e.empid = p.empid and app.status='selected'");
		$data['position'] = $this->tenant_model->getPositions();
		$this->load->view('user/userselected',$data);
	}
	
	public function downloadresume()
	{
		$filename= $_GET['nama'];
		$configid = $this->session->userdata('configid');
		$web=$this->user_model->getClientsConfig(array('configid'=>$configid));
		$target_dir = "C:/xampp/htdocs/".$web[0]['websitename1']."/assets/resume/";
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
	
	public function editpass()
	{
		$data['metadata']=$this->session->userdata();
		$this->load->view('user/userpassedit',$data);
	
	}
	
	public function processeditpass()
	{
		$userid = $this->session->userdata('userid');
		$email_check=$this->tenant_model->pass_check($userid);
		if($email_check){
			$this->tenant_model->updatepassword($userid);
			$this->session->set_flashdata('success_msg', 'Updated successfully');
			redirect('user/setting');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Incorrect password!');
				redirect('user/setting');
			}
	
	}
	
	public function logout(){
		$this->session->set_userdata('validateduser',false);
		$base=base_url();
		redirect($base);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validateduser')){
			redirect('404_override');
		}
	}
			
}
?>