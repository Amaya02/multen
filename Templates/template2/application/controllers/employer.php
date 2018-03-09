<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isValidated();
	}
	
	public function index(){
		echo "Welcome employer!";
	}
	
	private function check_isValidated(){
		if(! $this->session->userdata('validated')){
			$base=base_url();
			redirect($base);
		}
	}
}