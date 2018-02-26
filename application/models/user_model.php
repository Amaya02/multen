<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
    
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function validateadmin(){
		// grab user input
		$email = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean($this->input->post('password'));
		
		
		//prep the query
		$this->db->where('email like binary',$email);
		$this->db->where('password like binary',$password);
		
		//run the query
		$query = $this->db->get('admin');
		
		// check if there are any results
		if($query->num_rows()==1){
			//if there is a user, then create session data
			$row = $query->row();
			$data = array(
						'adminid' => $row->adminid,
						'username' => $row->username,
						'email' => $row->email,
						'validated' => true);
			$this->session->set_userdata($data);
			return true;
		}
		//if the previous process did not validate
		//then return false
		return false;
	}
	
	public function validateuser(){
		// grab user input
		$email = $this->security->xss_clean($this->input->post('email'));
		$password =  $this->security->xss_clean(sha1($this->input->post('password')));
		
		//prep the query
		$this->db->where('email like binary',$email);
		$this->db->where('password like binary',$password);
		
		//run the query
		$query = $this->db->get('users');
		
		// check if there are any results
		if($query->num_rows()==1){
			//if there is a user, then create session data
			$row = $query->row();
			$data = array(
						'userid' => $row->userid,
						'companyname' => $row->companyname,
						'email' => $row->email,
						'configid' => $row->configid,
						'validated' => true);
			$this->session->set_userdata($data);
			return true;
		}
		//if the previous process did not validate
		//then return false
		return false;
	}
}

?>
