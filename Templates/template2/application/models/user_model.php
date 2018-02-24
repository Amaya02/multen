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
           
}
