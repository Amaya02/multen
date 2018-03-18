<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>icon.png" />
    <title>MULTEN - Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
	
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
                <a href="<?php echo base_url(); ?>user/dashboard" class="simple-text">
                    <img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url(); ?>user/dashboard">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/employers">
                            <i class="now-ui-icons business_briefcase-24"></i>
                            <p>Employers</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>user/applicants">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Applicants</p>
                        </a>
                    </li>
					<li> 
						<a class="waves-effect waves-dark" aria-expanded="false"  data-toggle="collapse" href="#collapseComponents"data-parent="#exampleAccordion"><i class="fa fa-fw fa-user-plus"></i><span class="hide-menu">Recruitment</span></a>
						<ul class="sidenav-second-level collapse" id="collapseComponents">
							<li><a href="<?php echo base_url(); ?>user/preselection">Pre-Selection</a></li>
							<li><a href="<?php echo base_url(); ?>user/interview">Interview</a></li>
							<li><a href="<?php echo base_url(); ?>user/selected">Selected</a></li>
							<li><a href="<?php echo base_url(); ?>user/hired">Hired</a></li>
						</ul>
					</li>
					<li>
                        <a href="<?php echo base_url(); ?>user/bills">
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
                        <h5>Applicants</h5>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form role="search" action="<?php echo base_url(); ?>user/search" method="get">
                            <div class="input-group no-border">
                                <input required type="text" name="keyword" value="" class="form-control" placeholder="Search..." />
								<span class="input-group-addon">
									<button class="btnsearch" type="submit">
										<i class="now-ui-icons ui-1_zoom-bold"></i>
									</button>
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
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>user/dashboard"><i class="now-ui-icons users_single-02"></i>Profile</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>user/setting"><i class="now-ui-icons ui-1_settings-gear-63"></i>Settings</a>
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Account Information</h5>
								<?php
								$file = $app[0]['resume']; //Let say If I put the file name Bang.png
								if($file!=""){
									echo '<i class="now-ui-icons shopping_credit-card"></i><a href="'.base_url('user/downloadresume?nama='.$file).'">Download Resume</a><br/>';
								}
								?>
                            </div>
                            <div class="card-body">
								<p><b>ID No:</b> <?php echo $app[0]['appid']; ?></p>
								<p><b>Email Address:</b> <?php echo $app[0]['email']; ?></p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Basic Information</h5>
                            </div>
                            <div class="card-body">
								<p><b>First Name:</b> <?php echo $app[0]['fname']; ?></p>
								<p><b>Middle Name:</b> <?php echo $app[0]['mname']; ?></p>
								<p><b>Last Name:</b> <?php echo $app[0]['lname']; ?></p>
								<p><b>Nationality:</b> <?php echo $app[0]['nationality']; ?></p>
								<p><b>Birthdate:</b> <?php echo $app[0]['bday']; ?></p>
								<p><b>Religion:</b> <?php echo $app[0]['religion']; ?></p>
								<p><b>Gender:</b> <?php echo $app[0]['gender']; ?></p>
								<p><b>Status:</b> <?php echo $app[0]['status']; ?></p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Contact Information</h5>
                            </div>
                            <div class="card-body">
								<p><b>Contact Number:</b> <?php echo $app[0]['cnumber']; ?></p>
								<p><b>Address:</b> <?php echo $app[0]['address']; ?></p>
								<p><b>City:</b> <?php echo $app[0]['city']; ?></p>
								<p><b>State:</b> <?php echo $app[0]['state']; ?></p>
								<p><b>Zip Code:</b> <?php echo $app[0]['zipcode']; ?></p>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Education</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Level
                                            </th>
                                            <th>
                                                School
                                            </th>
                                            <th>
                                                Address
                                            </th>
											<th>
                                                Schoolyear
                                            </th>
                                            <th class=" text-right">
                                                Honor
                                            </th>
                                        </thead>
                                        <tbody>
                                             <?php
											foreach($educ as $post){
											echo '	<tr>	
												<td>'.$post['level'].'</td>
												<td>
                                                    '.$post['school'].'
                                                </td>
												<td>
                                                    '.$post['address'].'
                                                </td>
                                                <td>
                                                    '.$post['startyear'].' - '.$post['endyear'].'
                                                </td>
												<td class=" text-right">
													'.$post['honor'].'
												</td>
											</tr>
											';
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
				<div class="row">
					<div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Experiences</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Company
                                            </th>
                                            <th>
                                                Job
                                            </th>
                                            <th class=" text-right">
                                                Years
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
											foreach($exp as $post){
											echo '	<tr>	
												<td>'.$post['company'].'</td>
												<td>
                                                    '.$post['job'].'
                                                </td>
												<td class=" text-right">
                                                    '.$post['years'].'
                                                </td>
											</tr>
											';
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Skills</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Skills
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
											foreach($skill as $post){
											echo '	<tr>	
												<td>
                                                    '.$post['skill'].'
                                                </td>
											</tr>
											';
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
				<button type="button" style="float: right;" class="btn btn-info" onclick="window.history.back();">Back</button>
				<button type="button" style="float: right;" class="btn btn-submit">Print Info</button><br/><br/>
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
            <a class="btn btn-primary" href="<?php echo base_url(); ?>user/logout">Logout</a>
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
<!-- Control Center for Now Ui Dashboard: parallax effects -->
<script src="<?php echo base_url('assets/js/now-ui-dashboard.js'); ?>"></script>


</html>
