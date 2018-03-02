<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminbill extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
	}
	
	public function index()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getClients();
		$this->load->view('adminbill',$data);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
	
	public function viewbill($billid){
		// echo "Display student profile with ID=$id";
		
		//call the model
		$bill = $this->user_model->getClientsBill(array('billid'=>$billid));
		
		if( count($bill)>0 ){
			$data['bill'] = $bill;
			//find the student record
			//load the view
			$this->load->view('adminbillview',$data);		
		}		
		else{
			redirect('adminbill','refresh');
		}
	}
		
}
?>