<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
	<?php foreach($posts as $post){?>
		<?php echo $post->companyname;?>
	<?php }?> 
	</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet" />
  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/lib/animate-css/animate.min.css'); ?>" rel="stylesheet" />
  
  <!-- metatags-->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href=" <?php echo base_url('assets/css/form.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700" rel="stylesheet">
<link href="//font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--online_fonts-->
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet"><!--online_fonts-->
  
  <!-- Main Stylesheet File -->
  <link href=" <?php echo base_url('assets/css/style.css'); ?>"  rel="stylesheet"  />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>" />

</head>

<body>

<header id="header">
    <div class="container">
	<img class="logo" src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="Logo" />
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

 <div class="w3ls-main">
<h2>Registration Form</h2>
<p>Fill up the form to complete signing-up.</p>
<div class="w3ls-form">
<form autocomplete="off" enctype="multipart/form-data" role="form" method="post" action="">
<ul class="fields">
<div class="Refer_w3l">
<h3>Your details</h3>
	<li>	
		<div class="mail">
			<label class="w3ls-opt">Email :<span class="w3ls-star"> * </span></label>
			<span class="w3ls-text w3ls-name">
				<input type="email" name="email" placeholder="Enter your e-mail" required />
			</span>
		</div>
	</li>
	
	<li>	
			<label class="w3ls-opt">Password :<span class="w3ls-star"> * </span></label>
			<span class="w3ls-text w3ls-name">
				<input type="password" name="pass" placeholder="password" required />
			</span>
	</li>
	
	<li>	
			<label class="w3ls-opt">Username :<span class="w3ls-star"> * </span></label>
			<span class="w3ls-text w3ls-name">
				<input type="text" name="username" placeholder="Username" required />
			</span>
	</li>
		
	<li>
		<label class="w3ls-opt">Name :<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">	
			<input type="text" name="fname"  placeholder="First Name" required />
			<input type="text" name="mname"  placeholder="Middle Name" required />
			<input type="text" name="lname"  placeholder="Last Name" required />
		</div>
	</li>
	<li>
		<label class="w3ls-opt">Contact Number :<span class="w3ls-star"> * </span></label>	
			<span class="w3ls-text w3ls-name">
				<input type="text" name="number" placeholder="Phone number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
			</span>
	</li>
	<li>
		<label class="w3ls-opt">Address: <span class="w3ls-star"> * </span> </label>
		<div class="adderss">
			<span class="text">
				<input type="text" name="address" placeholder="Street address" required />
			</span>
			<span class="text">
				<input type="text" name="city" placeholder="City" required />
			</span>
			<span class="text">
				<input type="text" name="state" placeholder="State/Province" required />
			</span>
			<span class="text">
				<input required type="text" name="zipcode" placeholder="Postal/Zipcode" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
			</span>
		</div>
	</li>
	<li>
							<label class="w3ls-opt">Birth Date :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="day" class="day">
										<option>Day</option>
										<option value="1"> 1 </option>
										<option value="2"> 2 </option>
										<option value="3"> 3 </option>
										<option value="4"> 4 </option>
										<option value="5"> 5 </option>
										<option value="6"> 6 </option>
										<option value="7"> 7 </option>
										<option value="8"> 8 </option>
										<option value="9"> 9 </option>
										<option value="10"> 10 </option>
										<option value="11"> 11 </option>
										<option value="12"> 12 </option>
										<option value="13"> 13 </option>
										<option value="14"> 14 </option>
										<option value="15"> 15 </option>
										<option value="16"> 16 </option>
										<option value="17"> 17 </option>
										<option value="18"> 18 </option>
										<option value="19"> 19 </option>
										<option value="20"> 20 </option>
										<option value="21"> 21 </option>
										<option value="22"> 22 </option>
										<option value="23"> 23 </option>
										<option value="24"> 24 </option>
										<option value="25"> 25 </option>
										<option value="26"> 26 </option>
										<option value="27"> 27 </option>
										<option value="28"> 28 </option>
										<option value="29"> 29 </option>
										<option value="30"> 30 </option>
										<option value="31"> 31 </option>
									</select>
									
								</span>
								<span class="agile_sub-label xxx">
									<select name="month" class="month">
										<option>Month</option>
										<option value="January"> January </option>
										<option value="February"> February </option>
										<option value="March"> March </option>
										<option value="April"> April </option>
										<option value="May"> May </option>
										<option value="June"> June </option>
										<option value="July"> July </option>
										<option value="August"> August </option>
										<option value="September"> September </option>
										<option value="October"> October </option>
										<option value="November"> November </option>
										<option value="December"> December </option>
									 </select>
									
								</span>
								<span class="agile_sub-label">
									<input type="text" class="year" name="year" placeholder=" Enter Year" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
									
								</span>
								
								<div class="clear"></div>
							</div>
						</li>
						
						<li>
						<label class="w3ls-opt">Nationality :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="nationality" class="day">
										<option></option>
										<option value="Filipino"> Filipino </option>
									
									</select>
									
								</span> </li>
								<li>
								<label class="w3ls-opt">Civil Status :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="status" class="day">
										<option></option>
										<option value="Single"> Single </option>
									
									</select>
									
								</span> </li>
								<li><label class="w3ls-opt">Religion :<span class="w3ls-star"> </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="nationality" class="day">
										<option></option>
										<option value="1"> Roman Catholic </option>
									
									</select>
									
								</span>
								</li>
								<div class="wthree-text">
						<h4>Gender</h4>
						<ul class="radio-w3ls">
							<li>
								<input type="radio" id="a-option" name="selector1" value="Male" />
								<label for="a-option">Male</label>
								<div class="check"></div>
							</li>
							<li>
								<input type="radio" id="b-option" name="selector1" value="Female" />
								<label for="b-option">Female</label>
								<div class="check">
									<div class="inside"></div>
								</div>
							</li>
							
						</ul>
						<div class="clear"></div>
					</div>
						
	</div>
	<div class="Refer_w3l">
	   <h3><span>Candidate Sign Up</span></h3><br>
                           <p><span class="fa fa-check"></span>&nbsp; 	Stay connected with relevant career opportunities.</p>
					<p><span class="fa fa-check"></span>&nbsp; 	Get jobs that are more relevant to you delivered daily.</p>
					<p><span class="fa fa-check"></span>&nbsp; 	Let employers with the right jobs find you.</p>
                        </div>
</ul>
<div class="clear"></div>
	<div class="w3ls-btn">
		<input type="submit" value="Submit Form">
	</div>
</form>
</div>
</div>

<!-- Signin -->
  <div class="modal fade" id="demo-0" tabindex="-1">
    <div class="modal-dialog">
     <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
      <div class="modal-header">
		<h2 style="text-align: left; color:gray;">Sign In</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <h1 style="text-align: center; color:black;">Welcome!</h1>
        <div class="form-group">
		<form action='<?php base_url();?>../login' method='post' name='process' autocomplete="off">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required style="color:black;" />
              <br/><label for="password">Password:</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required style="color:black;" />
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

  
<!-- Required JavaScript Libraries -->
  <script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/superfish/hoverIntent.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/superfish/superfish.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/morphext/morphext.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/lib/wow/wow.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/stickyjs/sticky.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/easing/easing.js'); ?>"></script>
  <!-- Template Specisifc Custom Javascript File -->
  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/signin.js'); ?>"></script>
  

</body>
</html>