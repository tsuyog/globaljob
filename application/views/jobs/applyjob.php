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
                        <div class="panel-body">
								<div class="panel-body">
									<table class="table">
									 <tr><td>Name:</td><td><?php echo $apply->jobseeker_first_name; echo " "; echo $apply->jobseeker_middle_name; echo " "; echo $apply->jobseeker_last_name;?></td>
									 <td>Address:</td><td><?php echo $apply->jobseeker_address;?></td>
									 <td>Sex:</td><td><?php echo $apply->sex;?></td></tr>
									</table>
								</div>
								<div class="look decor">Your Credentials</div>
								<div class="look">Academic</div>
								<table class="table table-striped">
									<tr>
										<td>Level</td>
										<td>Degree Name</td>
										<td>Graduation year</td>
										<td>College </td>
										<td>University</td>
										<td>Score</td>
									</tr>
									<?php foreach($apply->Academic as $app):?>
										<tr>
											<td><?php echo $app->jobseeker_level_of_degree;?></td>
											<td><?php echo $app->jobseeker_degree_name;?></td>
											<td><?php echo $app->jobseeker_graduation_year;?></td>
											<td><?php echo $app->jobseeker_college_name;?></td>
											<td><?php echo $app->jobseeker_university_name;?></td>
											<td><?php echo $app->jobseeker_score;?></td>
										</tr>
									<?php endforeach;?>
								</table>
								<div class="look">Training</div>
								<table class="table table-striped">
									<tr>
									<td>Year</td>
									<td>Description</td>
									<td>Purpose</td>
									</tr>
									<?php foreach($apply->Training as $training):?>
										<tr>
											<td><?php echo $training->jobseeker_training_year;?></td>
											<td><?php echo $training->jobseeker_training_description;?></td>
											<td><?php echo $training->jobseeker_training_purpose;?></td>
										</tr>
									<?php endforeach;?>
								</table>
								
								<div class="credential"> Experience</div>
								<table class="table table-striped">
									<tr>
										<td>Experience Period</td>
										<td> Experience Designation</td>
										<td>Description</td>
									</tr>
									<?php foreach($apply->Experience as $exp):?>
										<tr>
											<td><?php echo $exp->jobseeker_experience_period;?></td>
											<td><?php echo $exp->jobseeker_experience_designation;?></td>
											<td><?php echo $exp->jobseeker_experience_description;?></td>
										</tr>
									<?php endforeach;?>
								</table>
								<div class="panel-body">
								<div class="col-md-12 pull-right">
									<div class="checkbox ">
										  <label>
										    <input type="checkbox" value="" id="check_resume">
										   I've seperate Resume
										  </label>
                                          <button class="label label-default resume" id="<?php echo $apply->jobseeker_id;?>" disabled >upload Resume</button>
										</div>
										
								</div>
								</div>
								<div class="credential">Cover Letter</div>
								<?php foreach($apply->CoverLetter as $CL):?>
								<textarea class="form-control" rows="3"><?php echo $CL->cover_letter;?></textarea>
								<?php endforeach;?>
								<div class=" checkbox">
                                		<label>
										    <input type="checkbox" value="" id="check_cover">
										   I've seperate Resume
										  </label>
									<button class="label label-default cover" id="<?php echo $apply->jobseeker_id;?>" disabled >upload Resume</button>
								</div>
								<div class="credential">
									<input class="form-control" id="disabledInput" type="text" placeholder="it reflect company statement about terms and condtions" disabled>
								</div>
								<div class="checkbox">
								    <label>
								      <input type="checkbox"> I accept the terms and conditions, I am ready to apply this job.
								    </label>
								    <a href="<?php echo site_url("welcome");?>"><span class="label label-danger pull-right">Cnacel</span></a>		<?php foreach($job as $jobs):?>
								   <a href="<?php echo site_url("jobs/postapplication/".$jobs->job_alias."/".$jobs->company->company_alias);?>"><span class="label label-success pull-right">Apply</span></a>
                                   <?php endforeach;?>
								  </div>
								  
 						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view("jobseekernav");?>
		</div>
	</div>
	<script>
		$("#check_resume").click(function(e) {
			if($(this).attr("checked")){
				$(".resume").removeAttr("disabled");
				}
			else {
				$(".resume").attr("disabled","disabled");
				}
        });
		$("#check_cover").click(function(e) {
            if($(this).attr("checked")){
				$(".cover").removeAttr("disabled");
				}
			else {
				$(".cover").attr("disabled","disabled");
				}
        });
		
    	$(".resume").click(function(e) {
            e.preventDefault();
			var user_id=$(this).attr("id");
			$("#upload").modal("show");
			/*$.ajax({url:"<?php ?>",
				cache:false,
				type:'POST',
				data:{user:user_id},
				success: function($data){
					}
			});*/
        });
		$(".cover").click(function(e) {
            e.preventDefault();
			$("#cover").modal("show");
        });
		
    </script>
    <div class="modal fade bs-example-modal-sm" id="upload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="look decor">Upload your own Resume</div>
      <div class="panel panel-default">
      		<div class="panel-body">
            <form name="myResume" id="myResume" action="<?php echo site_url("ajax/uploadresume");?>" method="post" enctype="multipart/form-data"> 
                <input type="file" name="resume" id="resume">
                <input type="submit" name="submit" value="Upload My Profile" class="pull-right resume_upload" id="<?php echo $apply->jobseeker_id;?>"/> 
                 </form>
                 <div id="progressbar"></div>
                 <div id="status"></div>
            <script>
			$("#progressbar").progressbar({
				value:0
				});
			var bar = $('.bar');
			var percent = $('.percent');
			$("#myResume").ajaxForm({
				beforeSend: function(){
					$("#progressbar").progressbar({value:0});
				},
				uploadProgress: function(event, position, total, percentComplete) {
				$("#progressbar").progressbar({value:percentComplete});
				},
				complete: function(xhr) 
				{
					$('#status').html(xhr.responseText);
					setTimeout(dismismodal,1000);
				}
					
					});
					
				function dismismodal(){
					$(".modal").modal('hide');
				}
			</script>
        	</div>
       </div>
  </div>
</div>
</div>
	
    <div class="modal fade bs-example-modal-sm" id="cover" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="look decor">Upload your own Cover Letter</div>
    <div class="panel panel-default">
     	<div class="panel-body">
        	<form id="myCover" action="<?php echo site_url("ajax/uploadcover");?>" method="post"> 
                <input type="file" name="cover" id="cover">
                <input type="submit" value="Upload My Cover" class="pull-right cover_upload" id="<?php echo $apply->jobseeker_id;?>"/> 
                 </form>
                 <div id="progressbarone"></div>
                 <div id="statusone"></div>
                 <script>
			$("#progressbarone").progressbar({
				value:0
				});
			var bar = $('.bar');
			var percent = $('.percent');
			$("#myCover").ajaxForm({
				beforeSend: function(){
					$("#progressbarone").progressbar({value:0});
				},
				uploadProgress: function(event, position, total, percentComplete) {
				$("#progressbarone").progressbar({value:percentComplete});
				},
				complete: function(xhr) 
				{
					$('#statusone').html(xhr.responseText);
					setTimeout(dismismodal,1000);
				}
					
					});
			</script>
     	</div>
     </div>
    </div>
  </div>
</div>
    </body>
</html>
