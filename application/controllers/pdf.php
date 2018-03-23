<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('generatepdf');
	}
	
	public function pdfgen(){
		$this->generatepdf->gen();
	}
	
	public function pdfapp(){
		$this->generatepdf->genapp();
	}

	public function pdfpre(){
		$this->generatepdf->genpre();
	}

	public function pdfint(){
		$this->generatepdf->genint();
	}

	public function pdfselect(){
		$this->generatepdf->genselect();
	}

	public function pdfhired(){
		$this->generatepdf->genhired();
	}


		
}
?>