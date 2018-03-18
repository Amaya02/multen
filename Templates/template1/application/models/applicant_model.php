<?php

class applicant_model extends CI_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function register_user(){
		$date = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$date2=date("Y-m-d",strtotime($date));
		$applicant=array(
			'email' => $this->input->post('email'),
			'password' =>sha1($this->input->post('pass')),
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'nationality' => $_POST['nationality'],
			'bday' => $date2,
			'religion' => $this->input->post('religion'),
			'gender' => $_POST["selector1"],
			'status' => $_POST['status'],
			'cnumber' => $this->input->post('number'),
			'resume' => ""
		);
		$this->db->insert('applicant', $applicant);
	}
	
	public function email_check($email){
 
	  $this->db->select('*');
	  $this->db->from('applicant');
	  $this->db->where('email',$email);
	  $query=$this->db->get();
	 
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }
	 
	}
	
	public function email_check1($email){
 
	  $this->db->select('*');
	  $this->db->from('employer');
	  $this->db->where('email',$email);
	  $query=$this->db->get();
	 
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }
	 
	}
	
	public function email_check2($email,$id){
		$this->db->select('*');
		$this->db->from('applicant');
		$this->db->where('email',$email);
		$this->db->where_not_in('appid',$id);
		$query=$this->db->get();
 
		if($query->num_rows()>0){
			return false;
			}else{
			return true;
		}
 
	}
	
	public function getsavejobs($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('savedjobs');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'saveid' => $r['saveid'],
				'appid' => $r['appid'],
				'posid' => $r['posid']
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function getjobs($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('position');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'posid' => $r['posid'],
				'empid' => $r['empid'],
				'position' => $r['position'],
				'status' => $r['status']
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function getemployers($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('employer');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'empid' => $r['empid'],
				'email' => $r['email'],
				'companyname' => $r['companyname'],
				'password' => $r['password'],
				'address' => $r['address'],
				'city' => $r['city'],
				'state' => $r['state'],
				'zipcode' => $r['zipcode'],		
				'cnumber' => $r['cnumber'],	
				'conemail' => $r['conemail']			
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function getapplication($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('application');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'appliid' => $r['appliid'],
				'appid' => $r['appid'],
				'posid' => $r['posid'],
				'status' => $r['status']
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function unsavejob($condition=null) {
		$this->db->where($condition);
		$this->db->delete('savedjobs');
	}
	
	public function checkapply($condition=null){
	$this->db->select('*');
	$this->db->from('application');
	$this->db->where($condition);
	$query=$this->db->get();
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }

	}
	
	public function apply($posid, $appid){
		$user=array(
			'posid'=>$posid,
			'appid'=>$appid,
			'status'=>"preselection"
	  );
		$this->db->insert('application', $user);
	}
	
	public function checksave($condition=null){
	$this->db->select('*');
	$this->db->from('savedjobs');
	$this->db->where($condition);
	$query=$this->db->get();
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }

	}
	
	public function savejob($posid, $appid){
		$user=array(
			'posid'=>$posid,
			'appid'=>$appid,
	  );
		$this->db->insert('savedjobs', $user);
	}
	
	public function updateaboutme($id){
		$date = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$date2=date("Y-m-d",strtotime($date));
		$user=array(
			'fname'=>$this->input->post('fname'),
			'mname'=>$this->input->post('mname'),
			'lname'=>$this->input->post('lname'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'cnumber'=>$this->input->post('cnumber'),
			'nationality' => $_POST['nationality'],
			'bday' => $date2,
			'religion' => $this->input->post('religion'),
			'gender' => $_POST["gender"],
			'status' => $_POST['status']
	  );
		$this->session->set_userdata($user);
		$this->db->where('appid',$id);
		$this->db->update('applicant', $user);
	}
	
	public function getEduc($condition=null){		
		$applicant = array();
		$this->db->select('*');
		$this->db->from('education');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'educid' => $r['educid'],
					'appid' => $r['appid'],
					'level' => $r['level'],
					'school' => $r['school'],
					'address' => $r['address'],
					'startyear' => $r['startyear'],
					'endyear' => $r['endyear'],
					'honor' => $r['honor']
					);
					$applicant[] = $info;
		}
		
		return $applicant;
	}
	
	public function addeduc($appid){
		$user=array(
			'appid' => $appid,
			'level' => $_POST["level"],
			'school' => $this->input->post('school'),
			'address' => $this->input->post('address'),
			'startyear' =>  $_POST["startyear"],
			'endyear' =>  $_POST["endyear"],
			'honor' => $this->input->post('honor'),
	  );
		$this->db->insert('education', $user);
	}
	
	public function updateeduc($id){
		$user=array(
			'level' => $_POST["level"],
			'school' => $this->input->post('school'),
			'address' => $this->input->post('address'),
			'startyear' =>  $_POST["startyear"],
			'endyear' =>  $_POST["endyear"],
			'honor' => $this->input->post('honor'),
	  );
		$this->db->where('educid',$id);
		$this->db->update('education', $user);
	}
	
	public function deleteeduc($condition=null) {
		$this->db->where($condition);
		$this->db->delete('education');
	}
	
	public function getExp($condition=null){		
		$applicant = array();
		$this->db->select('*');
		$this->db->from('experience');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'expid' => $r['expid'],
					'appid' => $r['appid'],
					'job' => $r['job'],
					'years' => $r['years'],
					'company' => $r['company']
					);
					$applicant[] = $info;
		}
		return $applicant;
	}
	
	public function addexp($appid){
		$user=array(
			'appid' => $appid,
			'company' =>$this->input->post('company'),
			'years' => $this->input->post('years'),
			'job' => $this->input->post('job')
	  );
		$this->db->insert('experience', $user);
	}
	
	public function updateexp($id){
		$user=array(
			'company' =>$this->input->post('company'),
			'years' => $this->input->post('years'),
			'job' => $this->input->post('job')
	  );
		$this->db->where('expid',$id);
		$this->db->update('experience', $user);
	}
	
	public function deleteexp($condition=null) {
		$this->db->where($condition);
		$this->db->delete('experience');
	}
	
	public function getSkill($condition=null){		
		$applicant = array();
		$this->db->select('*');
		$this->db->from('skill');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'skillid' => $r['skillid'],
					'appid' => $r['appid'],
					'skill' => $r['skill'],
					);
					$applicant[] = $info;
		}
		return $applicant;
	}
	
	public function addskill($appid){
		$user=array(
			'appid' => $appid,
			'skill' =>$this->input->post('skill'),
	  );
		$this->db->insert('skill', $user);
	}
	
	public function deleteskill($condition=null) {
		$this->db->where($condition);
		$this->db->delete('skill');
	}
	
	public function updateskill($id){
		$user=array(
			'skill' =>$this->input->post('skill')
	  );
		$this->db->where('skillid',$id);
		$this->db->update('skill', $user);
	}
	
	public function updateresume($id){
		$target_file= $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$user=array(
			'resume' =>"resume".$id.".".$imageFileType
		);
		$this->session->set_userdata('resume',"resume".$id.".".$imageFileType);
		$this->db->where('appid',$id);
		$this->db->update('applicant', $user);
	}
	
	public function removeresume($id){
		$user=array(
			'resume' =>""
		);
		$this->session->set_userdata('resume',"");
		$this->db->where('appid',$id);
		$this->db->update('applicant', $user);
	}
	
	public function checkresumetype(){
	$file= $_FILES["fileToUpload"]["name"];
	$file=strtolower($file);
	$imageFileType=pathinfo($file,PATHINFO_EXTENSION);
	if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "txt"){
		return false;
	}
	else{
		return true;
	}

	}
	
	public function uploadresume($web,$appid){
	$target_dir = "C:/xampp/htdocs/".$web."/assets/resume/";
	$target_file= $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk=1;
	$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$newfilename="resume".$appid;
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$newfilename.".".$imageFileType);
	}
	
	public function withdrawjob($condition=null) {
		$this->db->where($condition);
		$this->db->delete('application');
		$this->db->where($condition);
		$this->db->delete('interview');
	}
	
	public function getinterview($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('interview');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'intid' => $r['intid'],
				'appliid' => $r['appliid'],
				'venue' => $r['venue'],
				'date' => $r['date'],
				'status' => $r['status']
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function acceptinterview($id){
		$user=array(
			'status' =>"ongoing"
		);
		$this->db->where('intid',$id);
		$this->db->update('interview', $user);
	}
	
	public function declineinterview($id){
		$user=array(
			'status' =>"decline"
		);
		$this->db->where('intid',$id);
		$this->db->update('interview', $user);
	}
	
	public function updateaccount($id){
		$user=array(
			'fname'=>$this->input->post('fname'),
			'mname'=>$this->input->post('mname'),
			'lname'=>$this->input->post('lname'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'cnumber'=>$this->input->post('cnumber'),
	  );
		$this->session->set_userdata($user);
		$this->db->where('appid',$id);
		$this->db->update('applicant', $user);
	}
	
	public function pass_check($appid){
 
	  $this->db->select('*');
	  $this->db->from('applicant');
	  $pass=sha1($this->input->post('password'));
	  $this->db->where('appid',$appid);
	  $this->db->where('password',$pass);
	  $query=$this->db->get();
	  if($query->num_rows()>0){
		return true;
	  }else{
		return false;
	  }
	 
	}
	
	public function updatepassword($id){
		$user=array(
			'password'=>sha1($this->input->post('password2')),
	  );
		$this->session->set_userdata($user);
		$this->db->where('appid',$id);
		$this->db->update('applicant', $user);
	}
	
	public function searchcompany($keyword){
		$this->db->like('companyname',$keyword);
		$query = $this->db->get('employer');
		return $query->result();
	}
	
	public function searchjob($keyword){
		$users = array();
		$this->db->like('position',$keyword);
		$query = $this->db->get('position');
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'posid' => $r['posid'],
				'empid' => $r['empid'],
				'position' => $r['position'],
				'status' => $r['status']
			);
			$users[] = $info;
		}
		
		return $users;
	}
           
}
