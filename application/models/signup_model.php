<?php ini_set('max_execution_time',300);
class signup_model extends CI_model{
 
 function __construct(){
		parent::__construct();
}
 
public function register_user(){

$websitename=str_replace(' ','',$this->input->post('websitename'));
$subscription = $_POST['creditcard'];
$this->db->where('subscription',$subscription);
$query = $this->db->get('bill');
if($query->num_rows()==1){
	//if there is a user, then create session data
	$row = $query->row();
	$billid=$row->billid;
}
$tenant="tenant";
$config=array(
      'websitename'=>$websitename,
      'template'=>$_POST['template']
);

$this->db->insert('config', $config);

$user=array(
      'email'=>$this->input->post('email'),
      'companyname'=>$this->input->post('companyname'),
      'password'=>sha1($this->input->post('password')),
      'address'=>$this->input->post('address'),
      'city'=>$this->input->post('city'),
	  'state'=>$this->input->post('state'),
	  'zipcode'=>$this->input->post('zipcode'),
      'cnumber'=>$this->input->post('cnumber'),
	  'conemail'=>$this->input->post('conemail'),
	  'billid'=>$billid,
	  'configid'=>$this->db->insert_id()
	  
);
$this->db->insert('users', $user);
$userid=$this->db->insert_id();

$config=array(
      'websitename'=>$websitename,
	  'databasename'=>$tenant.$userid,
      'template'=>$_POST['template']
);

$this->db->where('configid',$user['configid']);
$this->db->update('config', $config);

$this->createwebsite($config,$user,$userid);
}
 
public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}

public function checkcompanyname(){
  $companyname=$this->input->post('companyname');
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('companyname',$companyname);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}

public function checklogotype(){
	$file= $_FILES["fileToUpload"]["name"];
	$file=strtolower($file);
	$imageFileType=pathinfo($file,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
		return false;
	}
	else{
		return true;
	}

}

public function checklogosize(){
	$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$image_width=$check[0];
	$image_height=$check[1];
	if($image_width >200 && $image_height >60){
		return false;
	}
	else{
		return true;
	}

}

public function checkwebsitename(){
	$websitename=str_replace(' ','',$this->input->post('websitename'));
	$this->db->select('*');
  $this->db->from('config');
  $this->db->where('websitename',$websitename);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function createwebsite($config,$user,$userid){
	$this->recurse_copy("C:/xampp/htdocs/multen/Templates/".$config['template'],"C:/xampp/htdocs/".$config[websitename]);
	$this->uploadlogo($config);
	$this->editconfig($config);
	$this->createdatabase($config);
	$this->createtable($config);
	$this->inserttotable($config,$user,$userid);
	
}

private function recurse_copy($src,$dst){
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ($file = readdir($dir))){
		if(($file != '.') && ($file !='..')){
			if(is_dir($src . '/' . $file)){
				$this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
			}
			else{
				copy($src . '/' . $file,$dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}

private function uploadlogo($config){
	$target_dir = "C:/xampp/htdocs/".$config['websitename']."/assets/img/logos/";
	$target_file= $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk=1;
	$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$newfilename="logo";
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$newfilename.".".$imageFileType);
}

private function editconfig($config){
	$file = "C:/xampp/htdocs/".$config['websitename']."/application/config/config.php";
	$current = file_get_contents($file);
	$current .= '$config';
	$current .= "['base_url'] = ";
	$current .= "'http://localhost/";
	$current .= $config['websitename'];
	$current .= "/';";
	file_put_contents($file, $current);
	$file = "C:/xampp/htdocs/".$config['websitename']."/application/config/database.php";
	$current = file_get_contents($file);
	$current .= $config['databasename'];
	$current .= "' );";
	file_put_contents($file, $current);
}

private function createdatabase($config){
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	$conn = new mysqli($servername,$username,$password);
	if($conn->connect_error){
		die("Connection failed:" . $conn->connect_error);
	}
	$sql ="CREATE DATABASE ".$config['databasename'];
	$conn->query($sql);
	$conn->close();
}

private function createtable($config){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = $config['databasename'];
	
	$conn = new mysqli($servername,$username,$password, $dbname);
	if($conn->connect_error){
		die("Connection failed:" . $conn->connect_error);
	}
	$sql = "CREATE TABLE agency (
		userid int(20) NOT NULL,
		email varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		companyname varchar(50) NOT NULL,
		address varchar(50) NOT NULL,
		city varchar(50) NOT NULL,
		state varchar(50) NOT NULL,
		zipcode varchar(50) NOT NULL,
		cnumber varchar(50) NOT NULL,
		conemail varchar(50) NOT NULL,
		billid int(50) NOT NULL,
		configid int(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `agency`
			ADD PRIMARY KEY (`userid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE bill (
		billid int(50) NOT NULL,
		subscription varchar(50) NOT NULL,
		amount int(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `bill`
			ADD PRIMARY KEY (`billid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE employer (
		empid int(20) NOT NULL,
		email varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		companyname varchar(50) NOT NULL,
		address varchar(50) NOT NULL,
		city varchar(50) NOT NULL,
		state varchar(50) NOT NULL,
		zipcode varchar(50) NOT NULL,
		cnumber varchar(50) NOT NULL,
		conemail varchar(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `employer`
			ADD PRIMARY KEY (`empid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE applicant (
		appid int(20) NOT NULL,
		email varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		username varchar(50) NOT NULL,
		fname varchar(50) NOT NULL,
		lname varchar(50) NOT NULL,
		mname varchar(50) NOT NULL,
		address varchar(50) NOT NULL,
		city varchar(50) NOT NULL,
		state varchar(50) NOT NULL,
		zipcode varchar(50) NOT NULL,
		nationality varchar(50) NOT NULL,
		bday DATE NOT NULL,
		religion varchar(50) NOT NULL,
		gender varchar(50) NOT NULL,
		status varchar(50) NOT NULL,
		cnumber varchar(50) NOT NULL,
		expid varchar(50) NOT NULL,
		skillid varchar(50) NOT NULL,
		educid varchar(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `applicant`
			ADD PRIMARY KEY (`appid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE experience (
		expid int(20) NOT NULL,
		job varchar(50) NOT NULL,
		years int(20) NOT NULL,
		company varchar(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `experience`
			ADD PRIMARY KEY (`expid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE education (
		educid int(20) NOT NULL,
		level varchar(50) NOT NULL,
		school varchar(50) NOT NULL,
		address varchar(50) NOT NULL,
		startyear varchar(50) NOT NULL,
		endyear varchar(50) NOT NULL,
		honor varchar(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `education`
			ADD PRIMARY KEY (`educid`)";
	
	$conn->query($sql);
	
	$sql = "CREATE TABLE skill (
		skillid int(20) NOT NULL,
		skill varchar(50) NOT NULL
	)";
	$conn->query($sql);
	
	$sql="ALTER TABLE `skill`
			ADD PRIMARY KEY (`skillid`)";
	
	$conn->query($sql);
	
	$conn->close();
}

private function inserttotable($config,$user,$userid){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = $config['databasename'];
	
	$conn = new mysqli($servername,$username,$password, $dbname);
	if($conn->connect_error){
		die("Connection failed:" . $conn->connect_error);
	}
	$sql = "INSERT INTO agency (
		`userid`, `email`, `password`, `companyname`, `address`, `city`, `state`, `zipcode`, `cnumber`, `conemail`, `billid`, `configid`) VALUES
		(".$userid.", '".$user['email']."', '".$user['password']."', '".$user['companyname']."', '".$user['address']."', '".$user['city']."'
		, '".$user['state']."', '".$user['zipcode']."', '".$user['cnumber']."', '".$user['conemail']."', ".$user['billid'].", ".$user['configid']."
	)";
	
	$conn->query($sql);
	
	$sql = "INSERT INTO bill (
		`billid`, `subscription`, `amount`) VALUES
		(1, 'trial', 0
	)";
	
	$conn->query($sql);
	$conn->close();
}


 
}
 
 
?>
