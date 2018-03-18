<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_control extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
  	 	$this->load->model('user_model');
	}
	
	public function index()
	{
		if($this->session->userdata('validatedapp')){
			redirect('applicant/dashboard');
		}
		else if($this->session->userdata('validatedemp')){
			redirect('employer/dashboard');
		}
		else{
			$data['posts'] = $this->user_model->getData();
			$this->load->view('homepage',$data);
		}
	}
	
	public function er404() {
		$data['posts'] = $this->user_model->getData();
		 $this->output->set_status_header('404'); 
		$this->load->view('errors/errorpage',$data);//loading in custom error view
	}
	
}
