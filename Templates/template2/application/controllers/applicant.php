<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class applicant extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
		$this->load->model('applicant_model');
	}
	
	public function dashboard()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$save = $this->applicant_model->getsavejobs(array('appid'=>$appid));
		$job = [];
		for($i=0; $i<count($save) ; $i++){
			$posid = $save[$i]['posid'];
			$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
			$empid = $pos[0]['empid'];
			$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
			$job[$i]['position'] = $pos[0]['position'];
			$job[$i]['posid'] = $pos[0]['posid'];
			$job[$i]['status'] = $pos[0]['status'];
			$job[$i]['companyname'] = $emp[0]['companyname'];
			
		}
		$data['job'] = $job;

		$pend = $this->applicant_model->getinterview(array('status'=>'pending'));
		$job1 = [];
		$count=0;
		for($i=0; $i<count($pend) ; $i++){
			$appliid = $pend[$i]['appliid'];
			$appli = $this->applicant_model->getapplication(array('appliid'=>$appliid));
			$appid2 = $appli[0]['appid'];
			if($appid2==$appid){
				$count=$count+1;
			}
		}
		$data['count']=$count;
		$this->load->view('applicants/applicantdashboard',$data);
	}
	
	public function profile()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$data['exp']= $this->applicant_model->getExp(array('appid'=>$appid));
		$data['educ']= $this->applicant_model->getEduc(array('appid'=>$appid));
		$data['skill']= $this->applicant_model->getSkill(array('appid'=>$appid));
		$this->load->view('applicants/applicantprofile',$data);
	
	}
	
	public function aboutme()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/editapplicantprofile',$data);
	
	}
	
	public function experiences()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$data['exp']= $this->applicant_model->getExp(array('appid'=>$appid));
		$this->load->view('applicants/experiences',$data);
	
	}
	
	public function addexp()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/addexperience',$data);
	
	}
	
	public function saveaddexp()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$this->applicant_model->addexp($appid);
		$this->session->set_flashdata('success_msg', 'Added successfully');
		redirect('applicant/experiences');
	
	}
	
	public function editexperience($expid)
	{
		$educ = $this->applicant_model->getExp(array('expid'=>$expid));
		$data['exp'] = $educ;
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/editexp',$data);
	
	}
	
	public function updateexp($expid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->updateexp($expid);
		$this->session->set_flashdata('success_msg', 'Updated successfully');
		redirect('applicant/experiences');
	
	}
	
	public function deleteexp($expid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->deleteexp(array('expid'=>$expid));
		redirect('applicant/experiences');
	
	}
	
	public function skills()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$data['skill']= $this->applicant_model->getSkill(array('appid'=>$appid));
		$this->load->view('applicants/skills',$data);
	
	}
	
	public function addskill()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/addskill',$data);
	
	}
	
	public function saveaddskill()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$this->applicant_model->addskill($appid);
		$this->session->set_flashdata('success_msg', 'Added successfully');
		redirect('applicant/skills');
	
	}
	
	public function deleteskill($skillid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->deleteskill(array('skillid'=>$skillid));
		redirect('applicant/skills');
	
	}
	
	public function editskill($skillid)
	{
		$skill= $this->applicant_model->getSkill(array('skillid'=>$skillid));
		$data['skill'] = $skill;
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/editskill',$data);
	
	}
	
	public function updateskill($skillid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->updateskill($skillid);
		$this->session->set_flashdata('success_msg', 'Updated successfully');
		redirect('applicant/skills');
	
	}
	
	public function resume()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/resume',$data);
	
	}
	
	public function uploadresume()
	{
		$appid = $this->session->userdata('appid');
		$data['posts'] = $this->user_model->getData();
		$webs = $this->user_model->getWebsitename();
		$check=$this->applicant_model->checkresumetype();
		if($check){
			$this->applicant_model->uploadresume($webs[0]['websitename'],$appid);
			$this->applicant_model->updateresume($appid);
			$this->session->set_flashdata('success_msg', 'Uploaded successfully');
			redirect('applicant/resume');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Invalid file type!');
				redirect('applicant/resume');
			}
	
	}
	
	public function uploadpicture()
	{
		$appid = $this->session->userdata('appid');
		$data['posts'] = $this->user_model->getData();
		$webs = $this->user_model->getWebsitename();
		$check=$this->applicant_model->checkpicturetype();
		if($check){
			$this->applicant_model->uploadpicture($webs[0]['websitename'],$appid);
			$this->applicant_model->updatepicture($appid);
			$this->session->set_flashdata('success_msg', 'Uploaded successfully');
			redirect('applicant/aboutme');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Invalid file type!');
				redirect('applicant/aboutme');
			}
	
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
	
	public function removeresume()
	{
		$filename= $_GET['nama'];
		$webs = $this->user_model->getWebsitename();
		$target_dir = "C:/xampp/htdocs/".$webs[0]['websitename']."/assets/resume/";
		$path = $target_dir.$filename;
		unlink($path);
		$appid = $this->session->userdata('appid');
		$this->applicant_model->removeresume($appid);
		$this->session->set_flashdata('success_msg', 'Removed successfully');
			redirect('applicant/resume');
		
	}
	
	public function removepicture()
	{
		$filename= $_GET['nama'];
		$webs = $this->user_model->getWebsitename();
		$target_dir = "C:/xampp/htdocs/".$webs[0]['websitename']."/assets/img/picture/";
		$path = $target_dir.$filename;
		unlink($path);
		$appid = $this->session->userdata('appid');
		$this->applicant_model->removepicture($appid);
		$this->session->set_flashdata('success_msg', 'Removed successfully');
			redirect('applicant/aboutme');
		
	}
	
	public function education()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$data['educ']= $this->applicant_model->getEduc(array('appid'=>$appid));
		$this->load->view('applicants/education',$data);
	
	}
	
	public function addeduc()
	{
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/addeducation',$data);
	
	}
	
	public function editeducation($educid)
	{
		$educ = $this->applicant_model->getEduc(array('educid'=>$educid));
		$data['educ'] = $educ;
		$data['posts'] = $this->user_model->getData();
		$this->load->view('applicants/editeduc',$data);
	
	}
	
	public function deleteeduc($educid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->deleteeduc(array('educid'=>$educid));
		redirect('applicant/education');
	
	}
	
	public function saveaddeduc()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$this->applicant_model->addeduc($appid);
		$this->session->set_flashdata('success_msg', 'Added successfully');
		redirect('applicant/education');
	
	}
	
	public function updateeduc($educid)
	{
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->updateeduc($educid);
		$this->session->set_flashdata('success_msg', 'Updated successfully');
		redirect('applicant/education');
	
	}
	
	public function saveaboutme()
	{
		$appid = $this->session->userdata('appid');
		$data['posts'] = $this->user_model->getData();
		$email_check=$this->applicant_model->email_check2($this->input->post('email'),$appid);
		if($email_check){
			$this->applicant_model->updateaboutme($appid);
			$this->session->set_flashdata('success_msg', 'Updated successfully');
			redirect('applicant/aboutme');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Email already exist!');
				redirect('applicant/aboutme');
			}
	
	}
	
	public function editaboutme()
	{
		$data['metadata']=$this->session->userdata();
		$data['posts'] = $this->user_model->getData();
		$time = strtotime($data['metadata']['bday']);
		$data['year'] = date('Y', $time);
		$data['month'] = date('m', $time);
		$data['day'] = date('d', $time);
		$this->load->view('applicants/editaboutme',$data);
	
	}
	
	public function applications()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$save = $this->applicant_model->getapplication(array('appid'=>$appid, 'status !='=>'hired'));
		$job = [];
		for($i=0; $i<count($save) ; $i++){
			$posid = $save[$i]['posid'];
			$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
			$empid = $pos[0]['empid'];
			$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
			$job[$i]['position'] = $pos[0]['position'];
			$job[$i]['status'] = $pos[0]['status'];
			$job[$i]['posid'] = $pos[0]['posid'];
			$job[$i]['appliid'] = $save[$i]['appliid'];
			$job[$i]['companyname'] = $emp[0]['companyname'];
			
		}
		$data['job'] = $job;
		$this->load->view('applicants/applicantapplications',$data);
	
	}
	
	public function withdrawjob($appliid)
	{
		$this->applicant_model->withdrawjob(array('appliid'=>$appliid));
		redirect('applicant/applications');
	
	}
	
	public function interviews()
	{
		$data['posts'] = $this->user_model->getData();
		$appid = $this->session->userdata('appid');
		$pend = $this->applicant_model->getinterview(array('status'=>'pending'));
		$accept = $this->applicant_model->getinterview(array('status' =>'ongoing'));
		$done = $this->applicant_model->getinterview(array('status' =>'done'));
		$decline = $this->applicant_model->getinterview(array('status'=>'decline'));
		$job = [];
		$job1 = [];
		$job2 = [];
		$job3 = [];
		for($i=0; $i<count($pend) ; $i++){
			$appliid = $pend[$i]['appliid'];
			$appli = $this->applicant_model->getapplication(array('appliid'=>$appliid));
			$appid2 = $appli[0]['appid'];
			if($appid2==$appid){
				$posid = $appli[0]['posid'];
				$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
				$empid = $pos[0]['empid'];
				$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
				$job[$i]['position'] = $pos[0]['position'];
				$job[$i]['posid'] = $pos[0]['posid'];
				$job[$i]['companyname'] = $emp[0]['companyname'];
				$job[$i]['date'] = $pend[$i]['date'];
				$job[$i]['venue'] = $pend[$i]['venue'];
				$job[$i]['time'] = $pend[$i]['time'];
				$job[$i]['intid'] = $pend[$i]['intid'];
			}
			
		}
		for($i=0; $i<count($accept) ; $i++){
			$appliid = $accept[$i]['appliid'];
			$appli = $this->applicant_model->getapplication(array('appliid'=>$appliid));
			$appid2 = $appli[0]['appid'];
			if($appid2==$appid){
				$posid = $appli[0]['posid'];
				$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
				$empid = $pos[0]['empid'];
				$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
				$job1[$i]['position'] = $pos[0]['position'];
				$job1[$i]['posid'] = $pos[0]['posid'];
				$job1[$i]['companyname'] = $emp[0]['companyname'];
				$job1[$i]['date'] = $accept[$i]['date'];
				$job1[$i]['venue'] = $accept[$i]['venue'];
				$job1[$i]['time'] = $accept[$i]['time'];
				$job1[$i]['intid'] = $accept[$i]['intid'];
			}
			
		}
		for($i=0; $i<count($done) ; $i++){
			$appliid = $done[$i]['appliid'];
			$appli = $this->applicant_model->getapplication(array('appliid'=>$appliid));
			$appid2 = $appli[0]['appid'];
			if($appid2==$appid){
				$posid = $appli[0]['posid'];
				$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
				$empid = $pos[0]['empid'];
				$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
				$job3[$i]['position'] = $pos[0]['position'];
				$job3[$i]['posid'] = $pos[0]['posid'];
				$job3[$i]['companyname'] = $emp[0]['companyname'];
				$job3[$i]['date'] = $done[$i]['date'];
				$job3[$i]['venue'] = $done[$i]['venue'];
				$job3[$i]['time'] = $done[$i]['time'];
				$job3[$i]['intid'] = $done[$i]['intid'];
			}
			
		}
		
		for($i=0; $i<count($decline) ; $i++){
			$appliid =$decline[$i]['appliid'];
			$appli = $this->applicant_model->getapplication(array('appliid'=>$appliid));
			$appid2 = $appli[0]['appid'];
			if($appid2==$appid){
				$posid = $appli[0]['posid'];
				$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
				$empid = $pos[0]['empid'];
				$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
				$job2[$i]['position'] = $pos[0]['position'];
				$job2[$i]['posid'] = $pos[0]['posid'];
				$job2[$i]['companyname'] = $emp[0]['companyname'];
				$job2[$i]['date'] = $decline[$i]['date'];
				$job2[$i]['venue'] = $decline[$i]['venue'];
				$job2[$i]['intid'] = $decline[$i]['intid'];
			}
			
		}
		$data['job'] = $job;
		$data['job1'] = $job1;
		$data['job2'] = $job2;
		$data['job3'] = $job3;
		$this->load->view('applicants/interviews',$data);
	
	}
	
	public function acceptinterview($intid){
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->acceptinterview($intid);
		redirect('applicant/interviews');
	}
	
	public function declineinterview($intid){
		$data['posts'] = $this->user_model->getData();
		$this->applicant_model->declineinterview($intid);
		redirect('applicant/interviews');
	}
	
	public function jobs()
	{
		$data['posts'] = $this->user_model->getData();
		$pos = $this->applicant_model->getjobs();
		$job = [];
		for($i=0; $i<count($pos) ; $i++){
			$empid = $pos[$i]['empid'];
			$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
			$job[$i]['position'] = $pos[$i]['position'];
			$job[$i]['status'] = $pos[$i]['status'];
			$job[$i]['posid'] = $pos[$i]['posid'];
			$job[$i]['companyname'] = $emp[0]['companyname'];
			
		}
		$data['job'] = $job;
		$this->load->view('applicants/jobs',$data);
	
	}
	
	public function viewjob($posid)
	{
		$data['posts'] = $this->user_model->getData();
		$pos = $this->applicant_model->getjobs(array('posid'=>$posid));
		$empid = $pos[0]['empid'];
		$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
		$job[0]['position'] = $pos[0]['position'];
		$job[0]['status'] = $pos[0]['status'];
		$job[0]['posid'] = $pos[0]['posid'];
		$job[0]['companyname'] = $emp[0]['companyname'];
		$job[0]['address'] = $emp[0]['address'];
		$job[0]['city'] = $emp[0]['city'];
		$job[0]['state'] = $emp[0]['state'];
		$job[0]['jobdesc'] = $pos[0]['jobdesc'];
		$job[0]['jobreq'] = $pos[0]['jobreq'];
		$appli = $this->applicant_model->getapplication(array('posid'=>$posid));
		$job[0]['num'] = count($appli);
		$data['job']=$job;
		$this->load->view('applicants/viewjob',$data);
	
	}
	
	public function unsavejob($posid)
	{
		$this->applicant_model->unsavejob(array('posid'=>$posid));
		redirect('applicant/dashboard');
	
	}
	
	public function apply($posid)
	{
		$appid = $this->session->userdata('appid');
		$check = $this->applicant_model->checkapply(array('posid'=>$posid,'appid'=>$appid));
		if($check){
			$this->applicant_model->apply($posid,$appid);
			$this->session->set_flashdata('success_msg', 'Application sent successfully');
			redirect('applicant/viewjob/'.$posid);
		}
		else{
			$this->session->set_flashdata('error_msg', 'You have already applied to this job!');
			redirect('applicant/viewjob/'.$posid);
		}
	
	}
	
	public function savejob($posid)
	{
		$appid = $this->session->userdata('appid');
		$check = $this->applicant_model->checksave(array('posid'=>$posid,'appid'=>$appid));
		if($check){
			$this->applicant_model->savejob($posid,$appid);
			$this->session->set_flashdata('success_msg', 'Saved successfully');
			redirect('applicant/viewjob/'.$posid);
		}
		else{
			$this->session->set_flashdata('error_msg', 'You have already saved this job!');
			redirect('applicant/viewjob/'.$posid);
		}
	
	}

	public function companyprofiles()
	{
		$data['posts'] = $this->user_model->getData();
		$data['employer'] = $this->applicant_model->getemployers();
		$this->load->view('applicants/company',$data);
	
	}
	
	public function viewemployer($empid)
	{
		$data['posts'] = $this->user_model->getData();
		$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
		$pos = $this->applicant_model->getjobs(array('empid'=>$empid));
		$data['emp']=$emp;
		$data['pos']=$pos;
		$this->load->view('applicants/viewemployer',$data);
	
	}
	
	public function setting()
	{
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('applicants/setting',$data);
	
	}
	
	public function editsetting()
	{
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('applicants/editsetting',$data);
	
	}
	
	public function savesetting()
	{
		$appid = $this->session->userdata('appid');
		$data['posts'] = $this->user_model->getData();
		$email_check=$this->applicant_model->email_check2($this->input->post('email'),$appid);
		if($email_check){
			$email_check1=$this->applicant_model->email_check1($this->input->post('email'));
			if($email_check1){
				$this->applicant_model->updateaccount($appid);
				$this->session->set_flashdata('success_msg', 'Updated successfully');
				redirect('applicant/setting');
			}
			else{
				$this->session->set_flashdata('error_msg', 'Email already exist!');
				redirect('applicant/setting');
			}
		}
		else{
				$this->session->set_flashdata('error_msg', 'Email already exist!');
				redirect('applicant/setting');
			}
	
	}
	
	public function editpassword()
	{
		$data['posts'] = $this->user_model->getData();
		$data['metadata']=$this->session->userdata();
		$this->load->view('applicants/editpassword',$data);
	
	}
	
	public function savepassword()
	{
		$appid = $this->session->userdata('appid');
		$data['posts'] = $this->user_model->getData();
		$email_check=$this->applicant_model->pass_check($appid);
		if($email_check){
			$this->applicant_model->updatepassword($appid);
			$this->session->set_flashdata('success_msg', 'Updated successfully');
			redirect('applicant/setting');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Incorrect password!');
				redirect('applicant/setting');
			}
	
	}
	
	public function search()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getData();
		$keyword = $this->input->get('keyword');
		$data['result1']=$this->applicant_model->searchcompany($keyword);
		$pos=$this->applicant_model->searchjob($keyword);
		$job = [];
		for($i=0; $i<count($pos) ; $i++){
			$empid = $pos[$i]['empid'];
			$emp = $this->applicant_model->getemployers(array('empid'=>$empid));
			$job[$i]['position'] = $pos[$i]['position'];
			$job[$i]['posid'] = $pos[$i]['posid'];
			$job[$i]['companyname'] = $emp[0]['companyname'];
			
		}
		$data['result2'] = $job;
		$data['key']=$keyword;
		$this->load->view('applicants/search',$data);
	}
	
	public function logout(){
		$this->session->set_userdata('validatedapp',false);
		$base=base_url();
		redirect($base);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validatedapp')){
			redirect('404_override');
		}
	}
	
	
	
}