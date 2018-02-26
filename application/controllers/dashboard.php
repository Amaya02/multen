<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
	}
	
	public function index()
	{
		// if the user is validated, then this function will run
		$configid=$this->session->userdata('configid');
		$this->db->where('configid',$configid);
		$query = $this->db->get('config');
		if($query->num_rows()==1){
			//if there is a user, then create session data
			$row = $query->row();
			$websitename= $row->websitename;
		}
		echo "\nYour website is http://localhost/".$websitename;
		
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
		
	}
		
}
?>