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
			'username' => $this->input->post('username'),
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
			'religion' => $_POST['religion'],
			'gender' => $_POST["selector1"],
			'status' => $_POST['status'],
			'cnumber' => $this->input->post('number')
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
           
}
