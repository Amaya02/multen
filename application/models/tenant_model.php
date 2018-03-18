<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tenant_model extends CI_Model {
    
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function getEmployers($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$employer = array();
		$db1->select('*');
		$db1->from('employer');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
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
			$employer[] = $info;
		}
		
		return $employer;
	}
	
	public function getApplicantList($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$sql =$condition;
		$query = $db1->query($sql);
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'appid' => $r['appid'],
					'appliid' => $r['appliid'],
					'posid' => $r['posid'],
					'fname' => $r['fname'],
					'mname' => $r['mname'],
					'lname' => $r['lname'],
					'position'=> $r['position'],
					'companyname'=> $r['companyname']
					);
			
					$applicant[] = $info;
		}
		
		return $applicant;
	}
	
	public function getInterviewList($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$sql =$condition;
		$query = $db1->query($sql);
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'appliid' => $r['appliid'],
					'appid' => $r['appid'],
					'intid' => $r['intid'],
					'posid' => $r['posid'],
					'fname' => $r['fname'],
					'mname' => $r['mname'],
					'lname' => $r['lname'],
					'position'=> $r['position'],
					'companyname'=> $r['companyname'],
					'date'=> $r['date'],
					'venue'=> $r['venue']
					);
			
					$applicant[] = $info;
		}
		
		return $applicant;
	}
	
	public function getApplicants($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$db1->select('*');
		$db1->from('applicant');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'appid' => $r['appid'],
					'email' => $r['email'],
					'password' => $r['password'],
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
					'resume' => $r['resume']
					);
			
					$applicant[] = $info;
		}
		
		return $applicant;
	}
	
	public function getApplicantsEduc($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$db1->select('*');
		$db1->from('education');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
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
	
	public function getApplicantsSkill($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$db1->select('*');
		$db1->from('skill');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
		$rs=$query->result_array();
		foreach($rs as $r){
					$info = array(
					'skillid' => $r['skillid'],
					'appid' => $r['appid'],
					'skill' => $r['skill']
					);
			
					$applicant[] = $info;
		}
		
		return $applicant;
	}
	
	public function getApplicantsExp($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$applicant = array();
		$db1->select('*');
		$db1->from('experience');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
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
	
	public function getPositions($condition=null){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$position = array();
		$db1->select('*');
		$db1->from('position');
		if( isset($condition) ) $db1->where($condition);
		//run the query
		$query = $db1->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'posid' => $r['posid'],
				'empid' => $r['empid'],
				'position' => $r['position']		
			);
			$position[] = $info;
		}
		
		return $position;
	}
	
	public function getClientsBill($condition=null) {
		$bill = array();
		$this->db->select('*');
		$this->db->from('bill');
		if( isset($condition) ) $this->db->where($condition);
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'billid' => $r['billid'],
				'subscription' => $r['subscription'],
				'amount' => $r['amount']		
			);
			$bill[] = $info;
		}
		
		return $bill;
	}
	
	public function insertinterview($appliid,$month,$day,$year,$place){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$date=$year.'-'.$month.'-'.$day;
		$date2=date("Y-m-d",strtotime($date));
		$interview=array(
			'appliid'=>$appliid,
			'date'=>$date2,
			'venue'=>$place,
			'status'=>"pending"
	  );
		$db1->insert('interview', $interview);
	}
	
	public function updatestatus($appliid, $status){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$application=array(
			'status'=>$status
		);
		$db1->where('appliid',$appliid);
		$db1->update('application', $application);
	}
	
	public function interviewupdatestatus($id){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$interview=array(
			'status'=>"done"
	  );
		$db1->where('intid',$id);
		$db1->update('interview', $interview);
	}
	
	public function searchcompany($keyword){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$db1->like('companyname',$keyword);
		$query = $db1->get('employer');
		return $query->result();
	}
	
	public function searchapplicant($keyword){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$db1->or_like(array('fname' => $keyword , 'mname' => $keyword, 'lname' => $keyword));
		$query = $db1->get('applicant');
		return $query->result();
	}
	
	public function checkcompanyname($id){
		$companyname=$this->input->post('companyname');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('companyname',$companyname);
		$this->db->where_not_in('userid',$id);
		$query=$this->db->get();
 
		if($query->num_rows()>0){
			return false;
			}else{
				return true;
		}
	}
	
	public function email_check($email,$id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where_not_in('userid',$id);
		$query=$this->db->get();
 
		if($query->num_rows()>0){
			return false;
			}else{
			return true;
		}
 
	}
	
	public function updateuser($id){
		$user=array(
			'userid'=>$this->input->post('userid'),
			'companyname'=>$this->input->post('companyname'),
			'email'=>$this->input->post('email'),
			'password'=>sha1($this->input->post('password')),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'cnumber'=>$this->input->post('cnumber'),
			'conemail'=>$this->input->post('conemail')
	  );
		$this->session->set_userdata($user);
		$this->db->where('userid',$id);
		$this->db->update('users', $user);
		
		$users="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$db1->where('userid',$id);
		$db1->update('agency', $user);
	}
	
	public function deleteinterview($appliid){
		$user="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$db1->where('appliid',$appliid);
		$db1->delete('interview');
	}
	
	public function pass_check($userid){
 
	  $this->db->select('*');
	  $this->db->from('users');
	  $pass=sha1($this->input->post('password'));
	  $this->db->where('userid',$userid);
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
		$this->db->where('userid',$id);
		$this->db->update('users', $user);
		
		$users="root";
		$password="";
		$localhost="localhost";
		$db1= $this->session->userdata('databasename');
		$dsn1 = 'mysqli://root:@localhost/'.$this->session->userdata('databasename');
		$db1 = $this->load->database($dsn1, true);     
		
		$db1->where('userid',$id);
		$db1->update('agency', $user);
	}
	
	
	
	
}