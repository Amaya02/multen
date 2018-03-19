<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet" />
<!-- Bootstrap CSS File -->
<link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
<!-- Libraries CSS Files -->
<link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/lib/animate-css/animate.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>" />
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>icon.png" />

<style>
  body{
    background-image: url("assets/img/tree.png");
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
    .required { color: red; }
</style>

<title>MULTEN - Multi-tenant Man Power Agency</title>
</head>
<body>

<header id="header">
    <div class="container">
	<img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="Logo" />
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="" data-toggle="modal" data-target="#demo-0">Sign In</a></li> 
          <li class="menu-active"><a href="">Sign Up</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
</header>

<!-- Name Section -->
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
	<h1>Sign Up <small>MULTEN</small></h1>
	<p><span class="fa fa-check"></span>&nbsp; 	Manage your records</p>
					<p><span class="fa fa-check"></span>&nbsp; 	Create your own website</p>
					<p><span class="fa fa-check"></span>&nbsp; 	Secure your records</p>
	<?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo "<script type='text/javascript'>alert('$error_msg');</script>";
                  }
                   ?>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" role="form" method="post" action='<?php base_url();?>signup/process' onsubmit="return checkCheckBoxes(this);">
        <fieldset>
		
<!-- Account Information -->		
		<!-- Form Name -->
		 
          <legend>Account Information Details</legend>
		 

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-4">
				<label>Email Address:</label><span class="required"> * </span>
               <input required type="email" name="email" placeholder="Email Address" class="form-control" />
            </div>
			<div class="col-sm-4">
				<label>Password:</label><span class="required"> * </span>
              <input required type="password" name="pass" id="pass" placeholder="Password" class="form-control" pattern=".{6,15}" title="Minimum of 6 characters, maximum of 20 characters" />
            </div>
			<div class="col-sm-2">
				<input type="checkbox" onclick="myFunction2()" />Show Password
			</div>
          </div>

<!-- Company Information -->
          <!-- Form Name -->
          <legend>Company Information Details</legend>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-4">
				<label>Company Name:</label><span class="required"> * </span>
              <input required type="text" name="companyname" placeholder="Company Name" class="form-control" />
            </div>
          </div>

<!-- Address Section -->
          <!-- Form Name -->
          <legend>Address Details</legend>
          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-10">
				<label>Address:</label><span class="required"> * </span>
              <input required type="text" name="address" placeholder="Address" class="form-control" />
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-4">
				<label>City:</label>
              <input type="text" name="city" placeholder="City" class="form-control" />
            </div>
            <div class="col-sm-4">
				<label>State/Region:</label><span class="required"> * </span>
				<?php
				$state = array("Ilocos Region","Cagayan Valley","Central Luzon","Calabarzon","Bicol Region","Western Visayas","Central Visayas",
					"Eastern Visayas","Zamboanga Peninsula","Northern Mindanao","Davao Region","Soccsksargen","National Capital Region (NCR)",
					"Cordillera Administrative Region (CAR)","ARMM","Caraga","Mimaropa");
				echo '<select name="state" class="form-control">';
				foreach($state as $sta){
					echo '<option value="'.$sta.'">'.$sta.'</option>';
				}
				echo '</select>';?>
            </div>
            <div class="col-sm-2">
				<label>Zip Code:</label><span class="required"> * </span>
              <input required type="text" name="zipcode" placeholder="Zip Code" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
            </div>
          </div>

<!-- Contact Section -->
          <!-- Form Name -->
          <legend>Contact Information</legend>
          <!-- Text input-->
          <div class="form-group"> 
            <div class="col-sm-4">
			  <label>Contact Number:</label><span class="required"> * </span>
              <input required type="text" name="cnumber" placeholder="Phone Number" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
            </div>
           </div>

<!-- Subscription -->
            <legend>Subscription<small> choose your subscription </small></legend>
			<label>Subscription:</label><span class="required"> * </span>
			<div class="form-group">
            <div class="cc-selector-2">
                <div class="col-sm-2">
                   <input class="checked" id="trial" type="radio" name="creditcard" value="trial" />
					<label class="drinkcard-cc trial" for="trial"></label>
                </div>
                <div class="col-sm-2">
                  	<input class="checked" id="monthly" type="radio" name="creditcard" value="monthly" />
					<label class="drinkcard-cc monthly" for="monthly"></label>
                </div>
                <div class="col-sm-2"> 
					<input class="checked" id="quarter" type="radio" name="creditcard" value="quarterly" />
					<label class="drinkcard-cc quarter" for="quarter"></label>
                </div>
				<div class="col-sm-2"> 
					<input class="checked" id="annual" type="radio" name="creditcard" value="annually" />
					<label class="drinkcard-cc annual" for="annual"></label>
				</div>
          </div>
		  </div>

<!-- Payment Method -->
            <legend>Payment Method</legend>
            <div class="form-group">
				<div class="col-sm-8">
					<img src="<?php echo base_url('assets/img/paypal.png'); ?>" alt="" class="pay" height="100" />      
				</div>
			</div>

<!-- Website -->
            <legend>Create your Website <small>choose template for your website</small></legend>
			<label>Template:</label><span class="required"> * </span>
			<div class="form-group">
                <div class="col-sm-6">
                   <input id="template1" type="radio" name="template" value="template1" /> Template 1
				   <img id="myImg1" src="<?php echo base_url('assets/img/t1.jpg'); ?>" alt="Template 1" width="350" height="200">
				  
                </div>

                <div class="col-sm-6">
                  	 <input id="template2" type="radio" name="template" value="template2" /> Template 2
					<img id="myImg2" src="<?php echo base_url('assets/img/t2.jpg'); ?>" alt="Template 2" width="350" height="200">
                </div>
			</div>
			<br/>
			<div class="form-group">
				<div class="col-sm-4">
					<label>Name of Website:</label><span class="required"> * </span>
					<input required type="text" name="websitename" placeholder="Name of website" class="form-control" />
				</div>
				<div class="col-sm-4">
					<label>Logo:</label><span class="required"> * </span>
					<input required type="file" name="fileToUpload" id="fileToUpload" />
				</div>
			</div>
			<br/><br/>
			
          
		  
<!-- Command -->
          <div class="form-group">
            <div class="col-sm-4">
                 <a class="btn btn-default" href="<?php echo base_url(); ?>">Back</a>
                <button type="submit" class="btn btn-primary" >Sign Up</button>
              </div>
          </div>
        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<!-- template1 -->
<div id="myModal1" class="modal2">

  <!-- The Close Button -->
  <span class="close2">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal2-content2" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
<!-- template2 -->
<div id="myModal2" class="modal2">

  <!-- The Close Button -->
  <span class="close2">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal2-content2" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<!-- Signin -->
  <div class="modal fade" id="demo-0" tabindex="-1">
    <div class="modal-dialog">
     <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
      <div class="modal-header">
		<h2 class="signinheader">Sign In</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <h1 style="text-align: center;">Welcome!</h1>
        <div class="form-group">
		<form action='<?php base_url();?>login' method='post' name='process' autocomplete="off">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required />
              <br/><label for="password">Password:</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required />
			  <br/><input type="checkbox" onclick="myFunction()" />Show Password
        </div>
      </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
			<button type="Submit" value="Login" class="btn btn-success" data-toggle="modal" >Signin</button>
        </div>
		</form>
     </div>
    </div>
  </div>
  

<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/superfish/hoverIntent.js'); ?>"></script>
  <script src=" <?php echo base_url('assets/lib/superfish/superfish.min.js'); ?>"></script>
  <script src=" <?php echo base_url('assets/lib/morphext/morphext.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/lib/wow/wow.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/stickyjs/sticky.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/easing/easing.js'); ?>"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  
<script type="text/javascript" src="<?php echo base_url('assets/js/signup.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/signin.js'); ?>"></script>

</body>
</html>
