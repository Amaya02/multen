<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

	<title>
		<?php foreach($posts as $post){?>
			<?php echo $post->companyname;?>
		<?php }?> 
	</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
	

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/full-slider.css'); ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>" />
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />

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
<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
       <div class="container">
        <img class="logo" src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="Logo">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
			<li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>">Home</a>
            </li>
			<li class="nav-item">
              <a href="" data-toggle="modal" data-target="#demo-0" class="nav-link js-scroll-trigger">Sign in</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="">Sign up</a>
            </li>
          </ul>
        </div>
      </div>
		</nav>

    <header>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('assets/vendor/images/image1.jpg')">
			<div class="carousel-caption d-none d-md-block">
                <?php foreach($posts as $post){?>
					<?php echo $post->companyname;?>
				<?php }?> 
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('assets/vendor/images/image2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              Manpower Agency
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
	</header>
	
	  <!-- Signin -->
  <div class="modal fade" id="demo-0" tabindex="-1">
    <div class="modal-dialog">
     <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>Sign In</h2>
      </div>
      <div class="modal-body">
        <h1 style="text-align: center;">Welcome!</h1>
        <div class="form-group">
    <form action='<?php base_url();?>login' method='post' name='process' autocomplete="off">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control required" placeholder="Enter email" required />
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
	 
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	
    <script  type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	
    <script  type="text/javascript" src="<?php echo base_url('assets/js/signin.js'); ?>"></script>
	

</body>

</html>
