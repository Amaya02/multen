<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		// load the model
		$this->load->model('user_model');
		// Validate the user can login
		$result = $this->user_model->validateadmin();
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show error message 
			$this->load->model('user_model');
			// Validate the user can login
			$result = $this->user_model->validateuser();
			// Now we verify the result
			if(! $result){
				$msg = 'Invalid email or password';
				$base=base_url();
				echo "<script type='text/javascript'>alert('$msg');</script>";
				echo "<script type='text/javascript'>setTimeout(\"location.href='$base';\");</script>";
			}
			else{
				// If user did validate,
				// redirect to dashboard
				redirect('dashboard');
			}
		}
		else{
			// If user did validate,
			// redirect to dashboard
			redirect('admindashboard');
		}
	}
}

?>
	
