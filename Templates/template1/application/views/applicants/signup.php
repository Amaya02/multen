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
				<input type="text" name="state" placeholder="State/Province" />
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
										<option value="01"> 1 </option>
										<option value="02"> 2 </option>
										<option value="03"> 3 </option>
										<option value="04"> 4 </option>
										<option value="05"> 5 </option>
										<option value="06"> 6 </option>
										<option value="07"> 7 </option>
										<option value="08"> 8 </option>
										<option value="09"> 9 </option>
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
										<option value="01"> January </option>
										<option value="02"> February </option>
										<option value="03"> March </option>
										<option value="04"> April </option>
										<option value="05"> May </option>
										<option value="06"> June </option>
										<option value="07"> July </option>
										<option value="08"> August </option>
										<option value="09"> September </option>
										<option value="10"> October </option>
										<option value="11"> November </option>
										<option value="12"> December </option>
									 </select>
									
								</span>
								<span class="agile_sub-label">
									<select name="year" class="month">
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<option value="2015">2015</option>
										<option value="2014">2014</option>
										<option value="2013">2013</option>
										<option value="2012">2012</option>
										<option value="2011">2011</option>
										<option value="2010">2010</option>
										<option value="2009">2009</option>
										<option value="2008">2008</option>
										<option value="2007">2007</option>
										<option value="2006">2006</option>
										<option value="2005">2005</option>
										<option value="2004">2004</option>
										<option value="2003">2003</option>
										<option value="2002">2002</option>
										<option value="2001">2001</option>
										<option value="2000">2000</option>
										<option value="1999">1999</option>
										<option value="1998">1998</option>
										<option value="1997">1997</option>
										<option value="1996">1996</option>
										<option value="1995">1995</option>
										<option value="1994">1994</option>
										<option value="1993">1993</option>
										<option value="1992">1992</option>
										<option value="1991">1991</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
										<option value="1986">1986</option>
										<option value="1985">1985</option>
										<option value="1984">1984</option>
										<option value="1983">1983</option>
										<option value="1982">1982</option>
										<option value="1981">1981</option>
										<option value="1980">1980</option>
										<option value="1979">1979</option>
										<option value="1978">1978</option>
										<option value="1977">1977</option>
										<option value="1976">1976</option>
										<option value="1975">1975</option>
										<option value="1974">1974</option>
										<option value="1973">1973</option>
										<option value="1972">1972</option>
										<option value="1971">1971</option>
										<option value="1970">1970</option>
										<option value="1969">1969</option>
										<option value="1968">1968</option>
										<option value="1967">1967</option>
										<option value="1966">1966</option>
										<option value="1965">1965</option>
										<option value="1964">1964</option>
										<option value="1963">1963</option>
										<option value="1962">1962</option>
										<option value="1961">1961</option>
										<option value="1960">1960</option>
										<option value="1959">1959</option>
										<option value="1958">1958</option>
										<option value="1957">1957</option>
										<option value="1956">1956</option>
										<option value="1955">1955</option>
										<option value="1954">1954</option>
										<option value="1953">1953</option>
										<option value="1952">1952</option>
										<option value="1951">1951</option>
										<option value="1950">1950</option>
										<option value="1949">1949</option>
										<option value="1948">1948</option>
										<option value="1947">1947</option>
										<option value="1946">1946</option>
										<option value="1945">1945</option>
										<option value="1944">1944</option>
										<option value="1943">1943</option>
										<option value="1942">1942</option>
										<option value="1941">1941</option>
										<option value="1940">1940</option>
										<option value="1939">1939</option>
										<option value="1938">1938</option>
										<option value="1937">1937</option>
										<option value="1936">1936</option>
										<option value="1935">1935</option>
										<option value="1934">1934</option>
										<option value="1933">1933</option>
										<option value="1932">1932</option>
										<option value="1931">1931</option>
										<option value="1930">1930</option>
									</select>
								</span>
								
								<div class="clear"></div>
							</div>
						</li>
						
						<li>
						<label class="w3ls-opt">Nationality :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="nationality" class="day">
										<option value="Filipino"> Filipino </option>
									
									</select>
									
								</span> </li>
								<li>
								<label class="w3ls-opt">Civil Status :<span class="w3ls-star"> * </span></label>	
							<div class="w3ls-text w3ls-name">
								<span class="agile_sub-label">
									<select name="status" class="day">
										<option value="Single"> Single </option>
									
									</select>
									
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