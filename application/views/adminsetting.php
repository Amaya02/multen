<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>icon.png">
    <title>MULTEN - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	
    <link href="<?php echo base_url('assets/css/now-ui-dashboard.css'); ?>" rel="stylesheet" />
	

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="grey">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>admindashboard" class="simple-text">
                    <img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url(); ?>admindashboard">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>adminclient">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Clients</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>adminbill">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>Bills</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <h5>Settings</h5>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
								<span class="input-group-addon">
									<a href="<?php echo base_url(); ?>adminsearch"><button type="button" class="btnsearch">
										<i class="now-ui-icons ui-1_zoom-bold"></i>
									</button></a> 
                                </span>
                            </div>
							
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admindashboard"><i class="now-ui-icons users_single-02"></i>Profile</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>adminsetting"><i class="now-ui-icons ui-1_settings-gear-63"></i>Settings</a>
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal"><i class="now-ui-icons media-1_button-power"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
			
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Name of Admin</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Admin ID</label>
                                                <input type="text" class="form-control" disabled="" value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name" value="Candy Amaya" disabled="">
                                            </div>
                                        </div>
										<div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="Lelis" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
									    <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" disabled="" placeholder="Email" value="adminamaya@yahoo.com">
											</div>
                                        </div>
										<div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="adminamaya" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pl-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password" value="secret" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Address" value="Silang Cavite">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" disabled="" placeholder="City" value="Cavite">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" disabled="" placeholder="State" value="N/A">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input disabled="" type="text" name="cnumber" placeholder="Phone Number" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="4118">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input disabled="" type="text" name="cnumber" placeholder="Phone Number" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="1235678">
                                            </div>
                                        </div>
                                        
                                    </div>
									
                                </form>
								<a href="<?php echo base_url(); ?>admineditaccount"><button type="button" style="float: right;" class="btn btn-info">Edit Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> MULTEN, Designed by
                        <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
        </div>
    </div>
	
<!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
	
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/now-ui-dashboard.js'); ?>"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/demo/demo.js'); ?>"></script>


</html>
