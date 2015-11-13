<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
<?php $this->load->view("includes-header"); ?>
</head>
<body>
	<?php $this->load->view("include-site-header"); ?>
	<?php $this->load->view("menu"); ?>
	<div class="container site-body">
		<div class="row">
			<div class="col-lg-9"><!-- main profile of jobsseker or content -->
				<div class="panel panel-default">
					<div class="panel-body backgroundgray">
                    <div class="row">
                    	<div class="h3">
						<div class="col-md-6">
							<div><span class="fa fa-star fa-1x">&nbsp; Jobseeker Name</span></div>
						</div>
						<div class="col-md-6">
							<div class="progress">
						 		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
						    	<span class="sr-only">40% Complete (success)</span>
						 	</div>
						 	</div>
						</div>
                        <br clear="all">
                        </div>
                     </div>
						
							<ul class="list-group">
								  <li class="list-group-item"><span class="fa fa-keyboard-o fa-1x"></span>&nbsp;&nbsp;<?php echo $JobSeeker->jobseeker_first_name." ".$JobSeeker->jobseeker_middle_name." ".$JobSeeker->jobseeker_last_name;?></li>
								  <li class="list-group-item"><span class="fa fa-map-marker fa-1x"></span>&nbsp;<?php echo $JobSeeker->jobseeker_address;?></li>
								  <li class="list-group-item"><span class="fa fa-envelope fa-1x"></span>&nbsp;&nbsp;<?php echo $JobSeeker->jobseeker_email;?></li>
								  <li class="list-group-item"><span class="fa fa-mobile fa-1x"></span>&nbsp;<?php echo $JobSeeker->jobseeker_contact_number;?></li>
								  <li class="list-group-item"><span class="fa fa-calendar fa-1x"></span>&nbsp;<?php echo $JobSeeker->jobseeker_dob;?></li>
								  <li class="list-group-item"><span class="fa fa-heart fa-1x"></span>&nbsp;<?php echo $JobSeeker->jobseeker_marital_status;?></li>
							</ul>
					</div>
				</div>
			</div><!-- closing main profile of jobsseker or content -->
			
			<?php $this->load->view("jobseekernav");?><!-- closing right side logo of jobseeker and typical info -->
		</div>
	</div>
	
</body>
</html>