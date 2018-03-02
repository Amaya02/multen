<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminclient extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
		
	}
	
	public function index()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getClients();
		$this->load->view('adminclient',$data);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
	
	public function viewclient($userid){
		// echo "Display student profile with ID=$id";
		
		//call the model
		$user = $this->user_model->getClients(array('userid'=>$userid));
		$config = $this->user_model->getClientsConfig(array('configid'=>$userid));
		
		if( count($user)>0 ){
			$data['company'] = $user;
			$data['configs'] = $config;
			//find the student record
			//load the view
			$this->load->view('adminclientview',$data);		
		}		
		else{
			redirect('adminclient','refresh');
		}
	}
		
}
?>