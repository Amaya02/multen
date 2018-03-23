<?php

class generatepdf extends CI_Model {
    
	private $table = "persons";
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}

//for jobs
public function tempjob(){
		require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'fname', 'lname', 'position' from  applicant, position ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(56,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT fname, lname, position from  applicant, position ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(56,12,$column,1);
} }
$pdf->Output();
	}
       
//for applicant
public function tempapp(){
	require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'fname', 'lname', 'position' from  applicant ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(56,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT fname, lname, position from  applicant, position ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(56,12,$column,1);
} }
$pdf->Output();
	}

//for select
public function tempselect(){
		require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT  'position', 'fname', 'lname' from   position ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(56,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT  status, fname, lname from  position, applicant, ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(56,12,$column,1);
} }
$pdf->Output();
	}
//for hired
public function temphired(){
		require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'Job', 'First Name', 'Last Name' from  position ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(56,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT position, fname, lname from  position, applicant ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(56,12,$column,1);
} }
$pdf->Output();
	}


	

        
   


}       
?>