<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('generatepdf');
	}
	
	public function pdfapp(){
		$this->generatepdf->tempapp();
	}

	public function pdfjob(){
		$this->generatepdf->tempjob();
	}

	public function pdfhired(){
		$this->generatepdf->temphired();
	}

	public function pdfselect(){
		$this->generatepdf->tempselect();
	}
	



		
}
?>