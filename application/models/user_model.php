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
		$password =  $this->security->xss_clean(sha1($this->input->post('password')));
		
		
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
						'password' => $row->password,
						'fname' => $row->fname,
						'lname' => $row->lname,
						'address' => $row->address,
						'city' => $row->city,
						'state' => $row->state,
						'zipcode' => $row->zipcode,
						'cnum' => $row->cnum,
						'validatedadmin' => true,
						'validateduser' => false);
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
						'username' => $row->username,
						'email' => $row->email,
						'password' => $row->password,
						'address' => $row->address,
						'state' => $row->state,
						'city' => $row->city,
						'zipcode' => $row->zipcode,
						'conemail' => $row->conemail,
						'cnumber' => $row->cnumber,
						'billid' => $row->billid,
						'configid' => $row->configid,
						'validatedadmin' => false,
						'validateduser' => true);
			$this->session->set_userdata($data);
			return true;
		}
		//if the previous process did not validate
		//then return false
		return false;
	}
	
	public function getClients($condition=null) {
		$users = array();
		$this->db->select('*');
		$this->db->from('users');
		if( isset($condition) ) $this->db->where($condition);
		//run the query
		$query = $this->db->get();
		$rs=$query->result_array();
		foreach($rs as $r){
			$info = array(
				'userid' => $r['userid'],
				'email' => $r['email'],
				'companyname' => $r['companyname'],
				'password' => $r['password'],
				'address' => $r['address'],
				'city' => $r['city'],
				'state' => $r['state'],
				'zipcode' => $r['zipcode'],		
				'cnumber' => $r['cnumber'],	
				'billid' => $r['billid'],	
				'configid' => $r['configid'],			
			);
			$users[] = $info;
		}
		
		return $users;
	}
	
	public function getClientsConfig($condition=null) {
		$config = array();
		$this->db->select('*');
		$this->db->from('config');
		if( isset($condition) ) $this->db->where($condition);
		$query = $this->db->get();
		$rs=$query->result_array();
		$website="http://localhost/";
		foreach($rs as $r){
			$info = array(
				'configid' => $r['configid'],
				'websitename' => $website.$r['websitename'],
				'databasename' => $r['databasename'],
				'template' => $r['template'],
				'websitename1' => $r['websitename']			
			);
			$config[] = $info;
			$this->session->set_userdata($info);
		}
		
		return $config;
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
	
	public function search($keyword){
		$this->db->like('companyname',$keyword);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	public function updateadmin($id){
		$admin=array(
			'adminid'=>$this->input->post('adminid'),
			'fname'=>$this->input->post('fname'),
			'lname'=>$this->input->post('lname'),
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'cnum'=>$this->input->post('cnum')
	  );
		$this->session->set_userdata($admin);
		$this->db->where('adminid',$id);
		$this->db->update('admin', $admin);
	}
	
	public function email_check($email,$id){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email',$email);
		$this->db->where_not_in('adminid',$id);
		$query=$this->db->get();
 
		if($query->num_rows()>0){
			return false;
			}else{
			return true;
		}
 
	}
	
	public function pass_check($id){
 
	  $this->db->select('*');
	  $this->db->from('admin');
	  $pass=sha1($this->input->post('password'));
	  $this->db->where('adminid',$id);
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
		$this->db->where('adminid',$id);
		$this->db->update('admin', $user);
	}
	
	public function email_check1($email){
 
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
}

?>
