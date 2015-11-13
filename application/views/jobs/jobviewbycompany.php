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
	<?php //testArray($apply);?>
	<div class="container site-body">
		<div class="row">
			<div class="col-lg-9">
				<div class="panel panel-default">
					
					<div class="panel-body backgroundgray">
						<div class="panel-heading"> You are Applying for this job(Job Name)	<a href="#" data-toggle="modal" data-target="#profile"><span class="label label-success ">View Details</span></a> </div>
                        <div class="modal fade col-md-12" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        	<div class="modal-dialog">
                                <div class="modal-content">
                                	<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Company Detail</h4>
                                    </div>
                                	<div class="modal-body">
                                        <table class="table table-striped">
                                        <tr><th>Job Title</th>
                                        <th>Company Name</th>
                                        <th>Company Profile</th>
                                        <th>Designation Name</th>
                                        </tr>
                                        <td><?php foreach($job as $jobs):?>
                                        <tr><td><?php echo $jobs->job_title;?></td>
                                        <td><?php echo $jobs->company->company_name;?></td>
                                        <td><?php echo $jobs->company->company_profile;?></td>
                                        <td><?php echo $jobs->designation->designation_name;?></td>
                                        </tr>
                                        <?php endforeach;?>
                                        </table>
                                	</div>
                                	<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                	</div>
                                </div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>



