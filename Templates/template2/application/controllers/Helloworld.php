<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helloworld extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{

		if( $_SERVER['REQUEST_METHOD']=='POST' ){
			print_r($_POST);
		}
		
		$this->load->model('people_model');
		
		$people = $this->people_model->read_people();
		print_r($people);
		
		$data['title'] = "Hello World";
		
		$this->load->view("template/header", $data);
		$this->load->view("dashboard", $data);
		$this->load->view("template/footer", $data);		
	}
	
	public function save(){
		if( $_SERVER['REQUEST_METHOD']=='POST' ){
			$validate = array (
				array('field'=>'first_name','label'=>'First Name','rules'=>'trim|required|min_length[2]'),
				array('field'=>'last_name','label'=>'Last Name','rules'=>'trim|required|min_length[2]'),
				array('field'=>'email','label'=>'Email Address','rules'=>'trim|required|is_unique[persons.email]|valid_email|min_length[10]'),
			);

			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()===FALSE) 
			{
				$info['success']=FALSE;
				$info['errors']=validation_errors();
				echo $info['errors'];
			}
			else
			{
				echo "form was validated";
			}
		}
		else{
			echo "you are lost";
		}	
	}
	
	public function method1($arg1=null,$arg2=null){
		echo "hello method $arg1 $arg2";
	}
}
