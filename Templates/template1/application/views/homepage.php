<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  
  <title>
	<?php foreach($posts as $post){?>
		<?php echo $post->companyname;?>
	<?php }?> 
  </title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	
  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  
  <link href="<?php echo base_url('assets/lib/animate-css/animate.min.css'); ?>" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>">
  

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  

  <!-- =======================================================
    Theme Name: Imperial
    Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
	<img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="Logo"></a>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="" data-toggle="modal" data-target="#demo-0" >Sign In</a></li> 
          <li><a href="">Sign Up</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
 </header>
  
   <!-- Signin -->
  <div class="modal fade" id="demo-0" tabindex="-1">
    <div class="modal-dialog">
     <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="signinheader">Sign In</h2>
        
      </div>
      <div class="modal-body">
        <h1 style="text-align: center;">Welcome!</h1>
        <div class="form-group">
    <form action='<?php base_url();?>login' method='post' name='process' autocomplete="off">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control required" placeholder="Enter email" required />
              <br><label for="password">Password:</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required />
        <br><input type="checkbox" onclick="myFunction()">Show Password
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
  
  
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <?php foreach($posts as $post){?>
			<h1><br/><?php echo $post->companyname;?></h1> 
		<?php }?>  
        <h2>We <span class="rotating">are a Manpower Agency, offer wide job searching, offer legitimate job openings</span></h2>
        <div class="actions">
          <a href="" data-toggle="modal" data-target="#demo-0" class="btn-get-started">Sign In</a>
          <a href="" class="btn-services">Sign Up</a>
        </div>
      </div>
    </div>
  </section>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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

  <script src=" <?php echo base_url('contactform/contactform.js'); ?>"></script>
 


</body>

</html>
