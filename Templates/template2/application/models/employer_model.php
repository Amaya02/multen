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
		'cnumber'=>$this->input->post('number'),
		'conemail'=>$this->input->post('conemail')
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
	
	
           
}
