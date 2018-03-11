<?php

class user_model extends CI_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function getData(){
		$this->db->select('companyname');
		$this->db->from('agency');
		//run the query
		$query = $this->db->get();
		return $query->result();
	}
	
	public function validateapplicant(){
		// grab user input
		$email = $this->security->xss_clean($this->input->post('email'));
		$password =  $this->security->xss_clean(sha1($this->input->post('password')));
		
		
		//prep the query
		$this->db->where('email like binary',$email);
		$this->db->where('password like binary',$password);
		
		//run the query
		$query = $this->db->get('applicant');
		
		// check if there are any results
		if($query->num_rows()==1){
			//if there is a user, then create session data
			$row = $query->row();
			$data = array(
						'appid' => $row->appid,
						'email' => $row->email,
						'username' => $row->username,
						'password' => $row->password,
						'fname' => $row->fname,
						'mname' => $row->mname,
						'lname' => $row->lname,
						'address' => $row->address,
						'city' => $row->city,
						'state' => $row->state,
						'zipcode' => $row->zipcode,	
						'nationality' => $row->nationality,
						'bday' => $row->bday,
						'religion' => $row->religion,
						'gender' => $row->gender,
						'status' => $row->status,
						'cnumber' => $row->cnumber,
						'validated' => true);
			$this->session->set_userdata($data);
			return true;
		}
		//if the previous process did not validate
		//then return false
		return false;
	}
	
	public function validateemployer(){
		// grab user input
		$email = $this->security->xss_clean($this->input->post('email'));
		$password =  $this->security->xss_clean(sha1($this->input->post('password')));
		
		//prep the query
		$this->db->where('email like binary',$email);
		$this->db->where('password like binary',$password);
		
		//run the query
		$query = $this->db->get('employer');
		
		// check if there are any results
		if($query->num_rows()==1){
			//if there is a user, then create session data
			$row = $query->row();
			$data = array(
						'empid' => $row->empid,
						'email' => $row->email,
						'companyname' => $row->companyname,
						'password' => $row->password,
						'address' => $row->address,
						'city' => $row->city,
						'state' => $row->state,
						'zipcode' => $row->zipcode,		
						'cnumber' => $row->cnumber,	
						'conemail' => $row->conemail,
						'validated' => true);
			$this->session->set_userdata($data);
			return true;
		}
		//if the previous process did not validate
		//then return false
		return false;
	}
           
}
