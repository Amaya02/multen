<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>icon.png">
    <title>MULTEN - Dashboard</title>
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
                <a href="<?php echo base_url(); ?>dashboard" class="simple-text">
                    <img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>employers">
                            <i class="now-ui-icons business_briefcase-24"></i>
                            <p>Employers</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>applicants">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Applicants</p>
                        </a>
                    </li>
					<li> 
						<a class="waves-effect waves-dark" aria-expanded="false"  data-toggle="collapse" href="#collapseComponents"data-parent="#exampleAccordion"><i class="fa fa-fw fa-user-plus"></i><span class="hide-menu">Recruitment</span></a>
						<ul class="sidenav-second-level collapse" id="collapseComponents">
							<li><a href="<?php echo base_url(); ?>preselection">Pre-Selection</a></li>
							<li class="active"><a href="<?php echo base_url(); ?>interview">Interview</a></li>
							<li><a href="<?php echo base_url(); ?>selected">Selected</a></li>
							<li><a href="<?php echo base_url(); ?>hired">Hired</a></li>
						</ul>
					</li>
					<li>
                        <a href="<?php echo base_url(); ?>bills">
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
                        <h5>Interview</h5>
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
									<a href="<?php echo base_url(); ?>search"><button type="button" class="btnsearch">
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
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard"><i class="now-ui-icons users_single-02"></i>Profile</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>setting"><i class="now-ui-icons ui-1_settings-gear-63"></i>Settings</a>
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
                                <h4 class="card-title">To be Interviewed</h4>
                            </div>
                            <div class="card-body">
								<div style="display: inline;">
									<select id="soflow">
										<option>Select company</option>
										<option>Harvey Corporation</option>
										<option>Amaya Corporation</option>
										<option>Hannah Corporation</option>
									</select>
								</div>
								<div style="display: inline;"> 
									<select id="soflow">
										<option>Select job</option>
										<option>Software Analyst</option>
										<option>Web Developer</option>
										<option>Front end</option>
									</select>
								</div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Company
                                            </th>
                                            <th>
                                                Job
                                            </th>
											<th>
                                                Date
                                            </th>
											<th>
                                                Place
                                            </th>
											<th>
                                                
                                            </th>
                                            <th class="text-right">
                                                
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Applicant1
                                                </td>
                                                <td>
                                                    Amaya Corporation
                                                </td>
                                                <td>
													Software Analyst
                                                </td>
												<td>
													02/28/18
                                                </td>
												<td>
													Building
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#doneModal"><button type="button" style="float: right;" class="btn btn-success">Done</button></a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="<?php echo base_url(); ?>applicantview"><button type="button" style="float: right;" class="btn btn-info">View Profile</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Applicant2
                                                </td>
                                                <td>
                                                    Hannah Corporation
                                                </td>
                                                <td>
                                                    Multimedia Graphic Artist
                                                </td>
												<td>
													02/28/18
                                                </td>
												<td>
													Building
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#doneModal"><button type="button" style="float: right;" class="btn btn-success">Done</button></a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="<?php echo base_url(); ?>applicantview"><button type="button" style="float: right;" class="btn btn-info">View Profile</button></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								
                            </div>
                        </div>
                    </div>
					
                </div>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Done</h4>
                            </div>
                            <div class="card-body">
								<div style="display: inline;">
									<select id="soflow">
										<option>Select company</option>
										<option>Harvey Corporation</option>
										<option>Amaya Corporation</option>
										<option>Hannah Corporation</option>
									</select>
								</div>
								<div style="display: inline;"> 
									<select id="soflow">
										<option>Select job</option>
										<option>Software Analyst</option>
										<option>Web Developer</option>
										<option>Front end</option>
									</select>
								</div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Company
                                            </th>
                                            <th>
                                                Job
                                            </th>
											<th>
                                                Date
                                            </th>
											<th>
                                                Place
                                            </th>
											<th>
                                                
                                            </th>
											<th>
                                                
                                            </th>
                                            <th class="text-right">
                                                
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Applicant1
                                                </td>
                                                <td>
                                                    Amaya Corporation
                                                </td>
                                                <td>
													Software Analyst
                                                </td>
												<td>
													02/26/18
                                                </td>
												<td>
													Building
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#passModal"><button type="button" style="float: right;" class="btn btn-success">Pass</button></a>
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#failModal"><button type="button" style="float: right;" class="btn btn-danger">Fail</button></a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="<?php echo base_url(); ?>applicantview"><button type="button" style="float: right;" class="btn btn-info">View Profile</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Applicant2
                                                </td>
                                                <td>
                                                    Hannah Corporation
                                                </td>
                                                <td>
                                                    Multimedia Graphic Artist
                                                </td>
												<td>
													02/25/18
                                                </td>
												<td>
													Building
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#passModal"><button type="button" style="float: right;" class="btn btn-success">Pass</button></a>
                                                </td>
												<td>
													<a href="" data-toggle="modal" data-target="#failModal"><button type="button" style="float: right;" class="btn btn-danger">Fail</button></a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="<?php echo base_url(); ?>applicantview"><button type="button" style="float: right;" class="btn btn-info">View Profile</button></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								
                            </div>
                        </div>
                    </div>
				</div>
				<button type="button" style="float: left;" class="btn btn-submit">Print List</button>
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
	
	<!-- Done Modal-->
    <div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Interview Done?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Done" below if this interview is done.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="">Done</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- Passed Modal-->
    <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Applicant Passed?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Passed" below if this applicant passed the interview.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="">Passed</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- Passed Modal-->
    <div class="modal fade" id="failModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Applicant Failed?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Failed" below if this applicant failed the interview.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="">Failed</a>
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
<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>


</html>
