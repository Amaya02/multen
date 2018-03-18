<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_control extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL)
	{
		if($this->session->userdata('validateduser')){
			redirect('user/dashboard');
		}
		else if($this->session->userdata('validatedadmin')){
			redirect('admin/dashboard');
		}
		else{
		$this->load->view('homepage');
		}
	}
	
	public function er404() {
		 $this->output->set_status_header('404'); 
		$this->load->view('errors/errorpage');//loading in custom error view
	}
	
}

?>
	
