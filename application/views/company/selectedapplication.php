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
					<div class="panel-body backgroundgray">
                    	<?php if($application!=array()){?>
						<div class="look decor">Selected Application</div>
                        <table class="table table-striped">
                          	<tr>
                              <td>S.N.</td>
                              <td>Job</td>
                               <td>Applicant Name</td>
                               <td>Address</td>
                               <td>Contact</td>
                               <td>Email</td>
                            </tr>
                            <?php $sn=0; ?> 
							<?php foreach($application as $app): ?>
							<?php $sn++; ?>
                            <tr>
                            	<td><?php echo $sn;?></td>
                                <td><?php foreach ($app->Job as $job):?><?php echo $job->job_title;?><?php endforeach;?></td>
                                <td><?php echo $app->Jobseeker->jobseeker_first_name; echo " "; echo $app->Jobseeker->jobseeker_middle_name; echo " "; echo $app->Jobseeker->jobseeker_last_name;?></td>
                                <td><?php echo $app->Jobseeker->jobseeker_address;?></td>
                                <td><?php echo $app->Jobseeker->jobseeker_contact_number;?></td>
                                <td><?php echo $app->Jobseeker->jobseeker_email?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        <?php }
                         else { ?>
                        <div class="look decor">You do not have select application Application</div>
                        <?php }?>
					</div>
    			</div>
        	</div>
			<?php $this->load->view("company/companynav");?>
        </div>
	</div>
</body>