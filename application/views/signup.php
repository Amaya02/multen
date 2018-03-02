<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js/signup.js'); ?>"></script>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>icon.png">

<style>
  body{
    background-image: url("assets/img/tree.png");
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
  }
</style>

<title>MULTEN - Multi-tenant Man Power Agency</title>
</head>
<body>
<!-- Name Section -->
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
	<h1>Sign Up <small>MULTEN</small></h1>
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
              <input required type="email" name="email" placeholder="Email Address" class="form-control">
            </div>
			<div class="col-sm-4">
              <input required type="password" name="password" id="password" placeholder="Password" class="form-control" pattern=".{6,15}" title="Minimum of 6 characters, maximum of 15 characters">
            </div>
			<div class="col-sm-2">
				<input type="checkbox" onclick="myFunction()">Show Password
			</div>
          </div>

<!-- Company Information -->
          <!-- Form Name -->
          <legend>Company Information Details</legend>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-4">
              <input required type="text" name="companyname" placeholder="Company Name" class="form-control">
            </div>
          </div>

<!-- Address Section -->
          <!-- Form Name -->
          <legend>Address Details</legend>
          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-10">
              <input required type="text" name="address" placeholder="Address" class="form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-4">
              <input required type="text" name="city" placeholder="City" class="form-control">
            </div>
            <div class="col-sm-2">
              <input required type="text" name="state" placeholder="State" class="form-control">
            </div>
            <div class="col-sm-4">
              <input required type="text" name="zipcode" placeholder="Zip Code" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
          </div>

<!-- Contact Section -->
          <!-- Form Name -->
          <legend>Contact Information</legend>
          <!-- Text input-->
          <div class="form-group"> 
            <div class="col-sm-4">
              <input required type="text" name="cnumber" placeholder="Phone Number" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
            <div class="col-sm-4">
              <input required type="email" name="conemail" placeholder="Email Address" class="form-control">
            </div>
           </div>

<!-- Subscription -->
            <legend>Subscription</legend>
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
					<img src="<?php echo base_url('assets/img/paypal.png'); ?>" alt="" class="pay" height="100">      
				</div>
			</div>

<!-- Website -->
            <legend>Create your Website</legend>
			<div class="form-group">
			<div class="cc-selector-2">
                <div class="col-sm-2">
                   <input type="radio" name="template" value="template1"> Template 1
                </div>
                <div class="col-sm-2">
                  	 <input type="radio" name="template" value="template2"> Template 2
                </div>
			</div>
			</div>	
			<div class="form-group">
				<div class="col-sm-4">
					<input required type="text" name="websitename" placeholder="Name of website" class="form-control">
				</div>
				<div class="col-sm-4">
					Upload your logo(size:200x60)<input required type="file" name="fileToUpload" id="fileToUpload">
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
</body>
</html>
