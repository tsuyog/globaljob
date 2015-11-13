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
						<div class="look decor">Application for the corresponding jobs</div>
						<table class="table table-striped">
						 <tr>
						 	<td>S.N</td>
                            <td>job Name</td>
						 	<td>Applicant Name</td>
						 	<td>Address</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td>Shortlisted</td>
                            <td> Operation</td>
						 </tr>
						 <?php $sn=0; foreach($applications as $app): $sn++;?>
						 	<tr>
						 	<td><?php echo $sn;?></td>
                            <?php foreach($app->Job as $job):?>
                            <td><?php echo $job->job_title;?></td>
                            <?php endforeach;?>
						 	<td><?php echo $app->Jobseeker->jobseeker_first_name; echo " "; echo $app->Jobseeker->jobseeker_middle_name; echo " "; echo $app->Jobseeker->jobseeker_last_name;?></td>
						 	<td><?php echo $app->Jobseeker->jobseeker_address;?></td>
                            <td><?php echo $app->Jobseeker->jobseeker_email;?></td>
                            <td><?php echo $app->Jobseeker->jobseeker_contact_number;?></td>
                            <?php if($app->application_shortlist==1) {?>
						 	<td><span class="glyphicon glyphicon-saved"></span></td>
                            <?php }
							else {?>
                            	<td>....</td>
                            <?php } ?>
                     		<td><a href="#" id="<?php echo $app->Jobseeker->jobseeker_alias; ?>" data-applicationid="<?php echo $app->application_id; ?>" class="label label-success detailsviewer">View Detail</a>
                                
						 	</td>
						 	</tr>
						 <?php endforeach; ?>
						</table>
					    	<script>
								$(".detailsviewer").click(function(e) {
                                 //   e.preventDefault();
									var jobseekeralias=$(this).attr("id");
									var applicationid=$(this).data("applicationid");
									$.ajax({
										url:'<?php echo site_url("ajax/viewapplicant");?>',										
										cache:false,
										type:"POST",
										data:{application_id:applicationid, jobseekeralias:jobseekeralias},
										success: function(data)
										{
											$("#details_container").html(data);
											$("#myModal").modal("show");
										}
									});
                                });								
							</script>
					</div>
				</div>
			</div>
			<?php $this->load->view("company/companynav");?>
		</div>
	</div>
    <!--- Modelling pop-up for viewing applied jobs -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="look decor"></div>
      </div>
      <div class="modal-body" id="details_container">
        
      </div>
     
    </div>
  </div>
</div>
</body>
</html>