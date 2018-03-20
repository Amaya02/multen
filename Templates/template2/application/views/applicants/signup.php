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
  <link href=" <?php echo base_url('assets/css/style2.css'); ?>"  rel="stylesheet"  />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>" />

</head>

<body>

<?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                     echo "<script type='text/javascript'>alert('$success_msg');</script>";
                  }
                  if($error_msg){
                      echo "<script type='text/javascript'>alert('$error_msg');</script>";
                  }
 ?>


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
<form autocomplete="off" enctype="multipart/form-data" role="form" method="post" action="<?php base_url();?>../signup/applicantprocess" onsubmit="return checkCheckBoxes(this);">
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
				<input required type="password" name="pass" id="pass" placeholder="Password" pattern=".{6,15}" title="Minimum of 6 characters, maximum of 20 characters" />
				<input type="checkbox" onclick="myFunction2()" />Show Password
			</span>
	</li>
		
	<li>
		<label class="w3ls-opt">Name (Middle Name not required) :<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">	
			<input type="text" name="fname"  placeholder="First Name" required />
			<input type="text" name="mname"  placeholder="Middle Name" />
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
		<label class="w3ls-opt">Address (City and Zip Code not required): <span class="w3ls-star"> * </span> </label>
		<div class="adderss">
			<span class="text">
				<input type="text" name="address" placeholder="Street address" required />
			</span>
			<span class="text">
				<input type="text" name="city" placeholder="City" />
			</span>
			<span class="text">
				<input type="text" name="zipcode" placeholder="Postal/Zipcode" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
			</span>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">State :<span class="w3ls-star"> * </span></label>
		<div class="w3ls-text w3ls-name">
			<span class="agile_sub-label">
				<?php
				$state = array("Ilocos Region","Cagayan Valley","Central Luzon","Calabarzon","Bicol Region","Western Visayas","Central Visayas",
					"Eastern Visayas","Zamboanga Peninsula","Northern Mindanao","Davao Region","Soccsksargen","National Capital Region (NCR)",
					"Cordillera Administrative Region (CAR)","ARMM","Caraga","Mimaropa");
				echo '<select name="state" class="month">';
				foreach($state as $sta){
					echo '<option value="'.$sta.'">'.$sta.'</option>';
				}
				echo '</select>';?>
			</span>
		</div>
	</li>
	<li>
							<label class="w3ls-opt">Birth Date :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<?php
										$start = 1;
										$end = 31;
										echo '<select name="day" class="day">';
										for($i = $start; $i <= $end; $i++){
											echo "<option>{$i}</option>";
										}
										echo '</select>';?>
									
								</span>
								<span class="agile_sub-label xxx">
									<?php
											$start = 1;
											$end = 12;
											$months = array(" ","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November",
												"December");
											echo '<select name="month" class="month">';
											for($i = $start; $i <= $end; $i++){
												echo "<option value='".$i."'>{$months[$i]}</option>";
											}
											echo '</select>';?>
									
								</span>
								<span class="agile_sub-label">
									<?php
										$start = 1900;
										$end = intval(date('Y'));
										echo '<select name="year" class="month">';
										for($i = $start; $i <= $end; $i++){
											echo "<option>{$i}</option>";
										}
										echo '</select>';?>
								</span>
								
								<div class="clear"></div>
							</div>
						</li>
						
						<li>
						<label class="w3ls-opt">Nationality :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<?php
										$nation = array('Afghan','Albanian','Algerian','American','Andorran','Angolan','Antiguans','Argentinean','Armenian','Australian','Austrian',
										'Azerbaijani','Bahamian','Bahraini','Bangladeshi','Barbadian','Barbudans','Batswana','Belarusian','Belgian','Belizean','Beninese',
										'Bhutanese','Bolivian','Bosnian','Brazilian','British','Bruneian','Bulgarian','Burkinabe','Burmese','Burundian','Cambodian','Cameroonian',
										'Canadian','Cape Verdean','Central African','Chadian','Chilean','Chinese','Colombian','Comoran','Congolese','Costa Rican','Croatian',
										'Cuban','Cypriot','Czech','Danish','Djibouti','Dominican','Dutch','East Timorese','Ecuadorean','Egyptian','Emirian','Equatorial Guinean',
										'Eritrean','Estonian','Ethiopian','Fijian','Filipino','Finnish','French','Gabonese','Gambian','Georgian','German','Ghanaian','Greek',
										'Grenadian','Guatemalan','Guinea-Bissauan','Guinean','Guyanese','Haitian','Herzegovinian','Honduran','Hungarian','Icelander','Indian',
										'Indonesian','Iranian','Iraqi','Irish','Israeli','Italian','Ivorian','Jamaican','Japanese','Jordanian','Kazakhstani','Kenyan',
										'Kittian and Nevisian','Kuwaiti','Kyrgyz','Laotian','Latvian','Lebanese','Liberian','Libyan','Liechtensteiner','Lithuanian',
										'Luxembourger','Macedonian','Malagasy','Malawian','Malaysian','Maldivan','Malian','Maltese','Marshallese','Mauritanian','Mauritian',
										'Mexican','Micronesian','Moldovan','Monacan','Mongolian','Moroccan','Mosotho','Motswana','Mozambican','Namibian','Nauruan','Nepalese',
										'Netherlander','New Zealander','Ni-Vanuatu','Nicaraguan','Nigerian','Nigerien','North Korean','Northern Irish','Norwegian','Omani',
										'Pakistani','Palauan','Panamanian','Papua New Guinean','Paraguayan','Peruvian','Polish','Portuguese','Qatari','Romanian','Russian',
										'Rwandan','Saint Lucian','Salvadoran','Samoan','San Marinese','Sao Tomean','Saudi','Scottish','Senegalese','Serbian','Seychellois',
										'Sierra Leonean','Singaporean','Slovakian','Slovenian','Solomon Islander','Somali','South African','South Korean','Spanish','Sri Lankan',
										'Sudanese','Surinamer','Swazi','Swedish','Swiss','Syrian','Taiwanese','Tajik','Tanzanian','Thai','Togolese','Tongan','Trinidadian or Tobagonian','Tunisian',
										'Turkish','Tuvaluan','Ugandan','Ukrainian','Uruguayan','Uzbekistani','Venezuelan','Vietnamese','Welsh','Yemenite','Zambian','Zimbabwean');
										echo '<select name="nationality" class="month">';
										foreach($nation as $n){
											echo "<option value='".$n."'>{$n}</option>";
										}
										echo '</select>';?>
									
								</span> </li>
								<li>
								<label class="w3ls-opt">Civil Status :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<?php
										$status = array("Single","Married" , "Widow");
										echo '<select name="status" class="month">';
										foreach($status as $n){
											echo "<option value='".$n."'>{$n}</option>";
										}
										echo '</select>';?>
									
								</span> </li>
								<li><label class="w3ls-opt">Religion :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<input required type="text" name="religion" placeholder="Religion" />
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