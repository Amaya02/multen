<?php

class employer_model extends CI_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function register_user(){
		$employer=array(
		'email'=>$this->input->post('email'),
		'companyname'=>$this->input->post('companyname'),
		'password'=>sha1($this->input->post('pass')),
		'address'=>$this->input->post('address'),
		'city'=>$this->input->post('city'),
		'state'=>$this->input->post('state'),
		'zipcode'=>$this->input->post('zipcode'),
		'cnumber'=>$this->input->post('number')
		);
		$this->db->insert('employer', $employer);
	}
	
	public function email_check($email){
 
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
	
	public function email_check1($email){
 
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
	
	public function email_check2($email,$id){
		$this->db->select('*');
		$this->db->from('employer');
		$this->db->where('email',$email);
		$this->db->where_not_in('empid',$id);
		$query=$this->db->get();
 
		if($query->num_rows()>0){
			return false;
			}else{
			return true;
		}
 
	}

	public function checkcompanyname(){
	  $companyname=$this->input->post('companyname');
	  $this->db->select('*');
	  $this->db->from('employer');
	  $this->db->where('companyname',$companyname);
	  $query=$this->db->get();
	 
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }
	 
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
				'status' => $r['status'],
				'jobreq' => $r['jobreq'],
				'jobdesc' => $r['jobdesc']
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
	
	public function getapplicant($condition=null){
		$users = array();
		$this->db->select('*');
		$this->db->from('applicant');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
			'appid' => $r['appid'],
			'email' => $r['email'],
			'fname' => $r['fname'],
			'mname' => $r['mname'],
			'lname' => $r['lname'],
			'address' => $r['address'],
			'city' => $r['city'],
			'state' => $r['state'],
			'zipcode' => $r['zipcode'],
			'nationality' => $r['nationality'],
			'bday' => $r['bday'],
			'religion' => $r['religion'],
			'gender' => $r['gender'],
			'status' => $r['status'],
			'cnumber' => $r['cnumber'],
			'resume' =>  $r['resume'],
			'picture' =>  $r['picture']
			);
			
			$users[] = $info;
		}
		
		return $users;
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
	
	public function updatejob($id){
		$user=array(
			'position' =>$this->input->post('position'),
			'status' => $_POST['status'],
			'jobreq' => $this->input->post('jobreq'),
			'jobdesc' => $this->input->post('jobdesc')
	  );
		$this->db->where('posid',$id);
		$this->db->update('position', $user);
	}
	
	public function deletejob($condition=null) {
		$this->db->where($condition);
		$this->db->delete('position');
		$this->db->where($condition);
		$this->db->delete('application');
		$this->db->where($condition);
		$this->db->delete('savedjobs');
	}
	
	public function addjob($empid){
		$user=array(
			'empid' => $empid,
			'position' =>$this->input->post('position'),
			'status' => $_POST['status'],
			'jobreq' => $this->input->post('jobreq'),
			'jobdesc' => $this->input->post('jobdesc')
	  );
		$this->db->insert('position', $user);
	}
	
	public function preselect($id){
		$user=array(
			'status' => "preselection",
	  );
		$this->db->where('appliid',$id);
		$this->db->update('application', $user);
	}
	
	public function hire($id){
		$user=array(
			'status' => "hired",
	  );
		$this->db->where('appliid',$id);
		$this->db->update('application', $user);
	}
	
	public function searchapplicant($keyword){
		$users = array();
		$this->db->or_like(array('fname' => $keyword , 'mname' => $keyword, 'lname' => $keyword));
		$query = $this->db->get('applicant');
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'appid' => $r['appid'],
				'fname' => $r['fname'],
				'lname' => $r['lname'],
				'mname' => $r['mname']
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function searchjob($keyword,$id){
		$users = array();
		$this->db->where('empid',$id);
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
	
	public function updateaccount($id){
		$user=array(
			'companyname'=>$this->input->post('companyname'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'cnumber'=>$this->input->post('cnumber')
	  );
		$this->session->set_userdata($user);
		$this->db->where('empid',$id);
		$this->db->update('employer', $user);
	}
	
	public function pass_check($empid){
 
	  $this->db->select('*');
	  $this->db->from('employer');
	  $pass=sha1($this->input->post('password'));
	  $this->db->where('empid',$empid);
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
		$this->db->where('empid',$id);
		$this->db->update('employer', $user);
	}
           
}
