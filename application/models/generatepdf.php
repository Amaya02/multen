  <?php

class generatepdf extends CI_Model {
    
	private $table = "persons";
	
	// Constructor
	public function __construct()
	{
		parent::__construct();		
	}
//for employers
public function gen(){
		require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'id', 'company name' from  applicant ";
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
$sql = "SELECT empid, companyname from  employer ";
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
public function genapp(){
		require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'appid', 'fname','mname','lname' from  applicant ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(45,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT appid, fname, mname, lname from  applicant ";
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
		$pdf->Cell(45,12,$column,1);
} }
$pdf->Output();
	
}
        
//for pre-selection
public function genpre(){
require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'Position', 'company name', 'fname', 'lname' from  applicant ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(46,12,$column_heading,1);
}}

//code for print data
$sql = "SELECT position, companyname, fname, lname from  position, employer, applicant ";
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
		$pdf->Cell(46,12,$column,1);
} }
$pdf->Output();

}      

//for interview
public function genint(){
require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'Job', 'Company', 'First Name', 'Last Name', 'Date', 'Time', 'Place' from  applicant ";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(27,12,$column_heading,1);
}}

//code for print data
$sql = "SELECT position, companyname, fname, lname, date, time, venue from  position, employer, interview ";
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
		$pdf->Cell(27,12,$column,1);
} }
$pdf->Output();

} 

//for selected
public function genselect(){
require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT  'position', 'id', 'companyname' from  position, applicant ";
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
$sql = "SELECT position, empid, companyname from  position, employer ";
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

//for hired applicant
public function genhired(){
require_once("config.php");
require('fpdf181/fpdf.php');
$dbname= $this->session->userdata('databasename');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT 'id', 'companyname' from  applicant ";
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
$sql = "SELECT empid, companyname from  employer ";
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