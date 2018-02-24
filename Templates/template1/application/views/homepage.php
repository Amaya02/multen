<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
	<?php foreach($posts as $post){?>
		<?php echo $post->companyname;?>
	<?php }?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
	

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/coming-soon.min.css'); ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('assets/css/agency.css'); ?>" rel="stylesheet">
	

  </head>

  <body>
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
			<li class="nav-item">
              <a href="" class="nav-link js-scroll-trigger">Sign in</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="">Sign up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="overlay"></div>

    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">
				<?php foreach($posts as $post){?>
					<h1 class="mb-3"><br/><?php echo $post->companyname;?></h1>
				<?php }?>  
				<p class="mb-5">Multi-tenant Manpower Agency</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/vide/jquery.vide.min.js'); ?>"></script>
	

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url('assets/js/coming-soon.min.js'); ?>"></script>
	

  </body>

</html>
