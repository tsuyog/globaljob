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
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="look decor">Shortlisted Application</div>
						<table class="table table-striped">
						 <tr>
						 	<td>S.N</td>
                            <td>Job</td>
						 	<td>Applicant Name</td>
						 	<td>Email</td>
                            <td>Contact Number</td>
						 	<td>Operation</td>
						 </tr>
						 <?php $sn=0; foreach($applications as $app): $sn++;?>
						 	<tr>
						 	<td><?php echo $sn;?></td>
                            <?php foreach($app->Job as $jobs):?>
                             <td><?php echo $jobs->job_title;?></td>
                             <?php endforeach;?>
						 	<td><?php echo $app->Jobseeker->jobseeker_first_name; echo " "; echo $app->Jobseeker->jobseeker_middle_name; echo " "; echo $app->Jobseeker->jobseeker_last_name;?></td>
						 	<td><?php echo $app->Jobseeker->jobseeker_email;?></td>
                            <td><?php echo $app->Jobseeker->jobseeker_contact_number;?></td>
						 	<td><a href="#"><span class="label label-success">Select</span></a></td>
						 	</tr>
						 <?php endforeach; ?>
						</table>
					    	
					</div>
				</div>
			</div>
			<?php $this->load->view("company/companynav");?>
		</div>
	</div>
</body>
</html>