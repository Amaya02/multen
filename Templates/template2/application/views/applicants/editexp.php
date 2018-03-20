<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
	<?php foreach($posts as $post){?>
		<?php echo $post->companyname;?>
	<?php }?> 
	</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap-dashboard.css?v=2.0.1'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css'); ?>" rel="stylesheet" />
	
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="black">
        
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>applicant/dashboard" class="simple-text">
						<img src="<?php echo base_url('assets/img/logos/logo.jpg'); ?>" alt="" class="logo2" />
					</a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/dashboard">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/profile">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/applications">
                            <i class="nc-icon nc-badge"></i>
                            <p>Applications</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/interviews">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Interviews</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/jobs">
                            <i class="nc-icon nc-bag"></i>
                            <p>Jobs</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="<?php echo base_url(); ?>applicant/companyprofiles">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Company Profiles</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"> Edit Profile </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        
                        <ul class="navbar-nav ml-auto">
                             <form role="search" action="<?php echo base_url(); ?>applicant/search" method="get">
                            <div class="input-group no-border">
                                <input required type="text" name="keyword" value="" class="form-control" placeholder="Search..." />
								
									<button class="btnsearch" type="submit">
										<i class="nc-icon nc-zoom-split"></i>
									</button>
                            </div>
                        </form>
                         <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-circle-09"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>applicant/profile"><i class="nc-icon nc-circle-09"></i>Profile</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>applicant/setting"><i class="nc-icon nc-settings-gear-64"></i>Settings</a>
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal"><i class="nc-icon nc-button-power"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
			<div class="container-fluid"> 
					<div class="card">
                        <ul class="ul1">
							<li class="li1"><a href="<?php echo base_url(); ?>applicant/aboutme">About Me</a></li>
							<li class="li1"><a href="<?php echo base_url(); ?>applicant/education">Education</a></li>
							<li class="li1 active1"><a href="<?php echo base_url(); ?>applicant/experiences">Experiences</a></li>
							<li class="li1"><a href="<?php echo base_url(); ?>applicant/skills">Skills</a></li>
							<li class="li1"><a href="<?php echo base_url(); ?>applicant/resume">Resume</a></li>
						</ul>
					</div>
                </div>  
			<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Experience</h5>
                            </div>
                            <div class="card-body">
                                <form autocomplete="off" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('applicant/updateexp/'.$exp[0]['expid']); ?>" onsubmit="return(validate());">
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company</label><span style="color: red"> *</span>
                                                <input required type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $exp[0]['company']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Job</label><span style="color: red"> *</span>
                                                <input required type="text" name="job" class="form-control" placeholder="Job" value="<?php echo $exp[0]['job']; ?>" />
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Years</label><span style="color: red"> *</span>
                                                 <input required type="text" name="years" placeholder="Years" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $exp[0]['years']; ?>" />
                                            </div>
                                        </div>
                                    </div>
									<button type="submit" style="float: right;" class="btn btn-success">Save</button>
                                </form>
								<button type="button" style="float: right;" class="btn btn-info" onclick="window.history.back();">Back</button>
                            </div>
                        </div>
                    </div>
                 </div>
			</div>
			</div>
                  

            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                          
    
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>
                    </nav>
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
            <a class="btn btn-primary" href="<?php echo base_url(); ?>applicant/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
  
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.3.2.1.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-switch.js'); ?>"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="<?php echo base_url('assets/js/plugins/chartist.min.js'); ?>"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/bootstrap-dashboard.js?v=2.0.1'); ?>" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
<script type="text/javascript">
function validate()
{
     var r=confirm("Do you want to save this?");
    if (r==true)
      return true;
    else
      return false;
}
</script>

</html>