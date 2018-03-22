<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
		$this->load->model('user_model');
	}
	
	public function dashboard()
	{
		// if the user is validated, then this function will run
		$data['metadata']=$this->session->userdata();
		$count = $this->user_model->getClients();
		$data['count']= count($count);
		$this->load->view('admin/admindashboard',$data);
	}
	
	public function client()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getClients();
		$this->load->view('admin/adminclient',$data);
	}
	
	public function viewclient($userid){
		// echo "Display student profile with ID=$id";
		
		//call the model
		$user = $this->user_model->getClients(array('userid'=>$userid));
		$configid = $user[0]['configid'];
		$config = $this->user_model->getClientsConfig(array('configid'=>$configid));
		
		if( count($user)>0){
			$data['company'] = $user;
			$data['configs'] = $config;
			//find the student record
			//load the view
			$this->load->view('admin/adminclientview',$data);		
		}		
		else{
			redirect('admin/client','refresh');
		}
	}
	
	public function bill()
	{
		// if the user is validated, then this function will run
		$data['posts'] = $this->user_model->getClients();
		$this->load->view('admin/adminbill',$data);
	}
	
	public function viewbill($userid){
		// echo "Display student profile with ID=$id";
		
		//call the model
		$user = $this->user_model->getClients(array('userid'=>$userid));
		$billid = $user[0]['billid'];
		$bill = $this->user_model->getClientsBill(array('billid'=>$billid));
		
		if( count($bill)>0 ){
			$data['bill'] = $bill;
			$data['company'] = $user;
			//find the student record
			//load the view
			$this->load->view('admin/adminbillview',$data);		
		}		
		else{
			redirect('admin/bill','refresh');
		}
	}
	
	public function search()
	{
		// if the user is validated, then this function will run
		$keyword = $this->input->get('keyword');
		$data['result']=$this->user_model->search($keyword);
		$data['key']=$keyword;
		$this->load->view('admin/adminsearch',$data);
	}
	
	public function setting()
	{
		// if the user is validated, then this function will run
		$data['metadata']=$this->session->userdata();
		$this->load->view('admin/adminsetting',$data);
	}
	
	public function editaccount()
	{
		// if the user is validated, then this function will run
		$data['metadata']=$this->session->userdata();
		$this->load->view('admin/admineditaccount',$data);
	}
	
	public function processedit()
	{
		// if the user is validated, then this function will run
		$id=$this->input->post('adminid');
		$email_check=$this->user_model->email_check($this->input->post('email'),$id);
		if($email_check){
			$email_check1=$this->user_model->email_check1($this->input->post('email'));
			if($email_check1){
				$this->user_model->updateadmin($id);
				$this->session->set_flashdata('success_msg', 'Updated successfully');
				redirect('admin/setting');
			}
			else{
				$this->session->set_flashdata('error_msg', 'email already exist!');
				redirect('admin/editaccount');
			}
		}
		else{
				$this->session->set_flashdata('error_msg', 'email already exist!');
				redirect('admin/editaccount');
			}
	}
	
	public function editpass()
	{
		$data['metadata']=$this->session->userdata();
		$this->load->view('admin/admineditpass',$data);
	
	}
	
	public function processeditpass()
	{
		$adminid = $this->session->userdata('adminid');
		$email_check=$this->user_model->pass_check($adminid);
		if($email_check){
			$this->user_model->updatepassword($adminid);
			$this->session->set_flashdata('success_msg', 'Updated successfully');
			redirect('admin/setting');
		}
		else{
				$this->session->set_flashdata('error_msg', 'Incorrect password!');
				redirect('admin/setting');
			}
	
	}
	
	public function logout(){
		$this->session->set_userdata('validatedadmin',false);
		$base=base_url();
		redirect($base);
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validatedadmin')){
			redirect('404_override');
		}
	}
	
	
		
}
?>