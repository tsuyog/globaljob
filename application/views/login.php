<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Company Profile</title>
</head>
<body>
	<?php $this->load->view("include-site-header"); ?>
	<?php $this->load->view("menu"); ?>
		<div class="container site-body">
		<div class="row">
			<div class="col-lg-9">
				<div class="panel panel-default"></div>
					<div class="panel-body backgroundgray">
						<form role="form" method="post" action="<?php echo site_url("login");?>" enctype="multipart/form-data">
						  <div class="form-group col-md-5">
						    <input type="email" class="form-control" name="username" id="username" placeholder="Enter email">
						  </div>
						  <div class="form-group col-md-5">
						    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
						  </div>
						  <div class="form-group col-md-2">
						  	 <button name="login" type="submit" class="btn btn-success pull-right">Login</button>
						  </div>
						</form>
						
						  <div class="form-group"></div>
						 <a href="#"><span class="label label-warning pull-right">Forget User/Password</span></a>
						  <a href="<?php echo site_url("JobSeeker/registerJobseeker");?>"><span class="label label-success pull-right">Jobseeker Registration</span></a>
                          <a href="<?php echo site_url("company/companyregistration");?>"><span class="label label-success pull-right">Employeer Regisrtation</span></a>
						 
					</div>
			</div>
		</div>
		</div>