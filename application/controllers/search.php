<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
	}
	
	public function index()
	{
		// if the user is validated, then this function will run
		$this->load->view('usersearch');
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
		
}
?>