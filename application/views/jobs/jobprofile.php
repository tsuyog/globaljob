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
  		<div class="col-lg-8"><!-- main profile of company or content of right -->
  				<div class="panel panel-default">
  					

  					<div class="panel-body">
  					<div class="panel panel-default"><!-- oopening of company profile -->
  						<div class="panel-heading">Company profile </div>
  						<div class="panel-body">
                          <p> <?php echo $Job->Company->company_profile;?></p>
		   				</div> 
 					</div><!-- closing of company profile -->
 					<div class="panel panel-default"><!-- opening of jo container -->
 						<div class="panel-heading"> Job Name and Requirement container	 </div>
 						<div class="panel-body">
								<table class="table table-striped">
								  <tr><td>Industry:</td><td><?php echo $Job->Industry->industry_name;?></td></tr>
								  <tr><td>Function:</td><td><?php echo $Job->Function->function_name;?></td></tr>
								  <tr><td>Job Posted on:</td><td><?php echo convertdate($Job->posted_date);?></td></tr>
								  <tr><td>Job Type:</td><td><?php echo $Job->Jobtype->job_type_name;?></td></tr>
								  <tr><td>Job Level:</td><td><?php echo $Job->Joblevel->job_level_name;?></td></tr>
								  <tr><td>Preferred Education:</td><td><?php echo $Job->Education->job_requirement_education_level;?></td></tr>
								  <tr><td>Salary:</td><td><?php if(!empty($Job->Salary->salary_range))echo $Job->Salary->salary_range;?></td></tr>
								  <tr><td>Location:</td><td><?php echo $Job->Location->city_name;?></td></tr>
								  <tr><td>Apply Before:</td><td><?php echo $Job->deadline;?></td></tr>
								</table>
 						</div>
 					</div><!-- end of job container -->
 					<div class="panel panel-default"><!-- pannel for job specification -->
 						<div class="panel-body">
 							<h3 class="h3">Education</h3>
 							
 							<table class="table table-striped">
 								<tr><td>Preferred Education Level:</td><td><?php echo $Job->Education->job_requirement_education_level;?></td></tr>
                            <tr><td><p><?php echo $Job->Education->job_requirement_education_description;?></p></td></tr>
 							</table>
 							<h3 class="h3">Job Description</h3>
 							<table class="table table-striped">
 								<tr><td><p><?php echo $Job->Education->job_requirement_specification;?> </p></td></tr>
 							</table>
 							<h3 class="h3">Job Specific Requirement</h3>
 							<table class="table table-striped">
 								<tr><td><p><?php echo $Job->Education->job_requirement_special_requirement;?></p></td></tr>
 							</table>
 					</div>
				</div>
  		</div>
  		</div>
  		</div><!-- closing of right panel -->
  		<div class="col-lg-4"><!-- left side logo of company and typical info -->
  			  	<div class="panel panel-default">
  			  		<div class="panel-heading"> About Company </div>
  			  		<div class="panel-body">
  			  			<ul class="list-group">
  			  				<li class="list-group-item">
								<span class="badge"><?php echo $Job->Company->company_name;?></span>Company Name
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $Job->Industry->industry_name;?></span>Industry
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $Job->Location->city_name;?></span>Location
							</li>
							<li class="list-group-item">
								<a href="#" data-toggle="modal" data-target="#profile" id="company">
									  <span class="label label-success"><?php echo $Job->Company->company_name;?></span>
								</a>
							</li>
  			  			</ul>
  			  		</div>
					 <div class="modal fade col-md-12" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        	<div class="modal-dialog">
                                <div class="modal-content">
                                	<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Company Detail</h4>
                                    </div>
                                	<div class="modal-body" id="ajax_content">  
									</div>
                                	<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                	</div>
                                </div>
                        	</div>		
										<script>
                                        $("#company").click(function(e) {
											e.preventDefault();
											var company_detail=$(this).val();
											$.ajax({ 
											url:"<?php echo site_url("ajax/viewcompanydetail/".$Job->Company->company_alias);?>",
											cache:false,
											data:{companydetail:company_detail},
											type:'POST',
											success: function(data){
											$("#ajax_content").html(data);
											//alert(data);
											}
											}); 
										});
                                		</script>
                </div>
				<div class="panel panel-default">
					<div class="panel-body"> 
						<h3 class="h3">Application Deadline</h3>
						<h2 class="h2"><?php $date = $Job->deadline; echo convertdate($date);?></h2>
						<h3 class="h3">Apply Options</h3>
						<ul class="list-group">
							<li class="list-group-item"><span class="<?php if($job=$Job->Application->by_online=='yes')
																		echo "glyphicon glyphicon-ok-circle";
							 											else {echo "glyphicon glyphicon-remove-circle";}?>">Online</span></li>
							<li class="list-group-item"><span class="<?php if($job=$Job->Application->by_email=='yes')
																		echo "glyphicon glyphicon-ok-circle";
							 											else {echo "glyphicon glyphicon-remove-circle";}?>">By Email</span></li>
							<li class="list-group-item"><span class="<?php if($job=$Job->Application->by_post=='yes')
																		echo "glyphicon glyphicon-ok-circle";
							 											else {echo "glyphicon glyphicon-remove-circle";}?>">By Post</span></li>
							<a href="<?php echo site_url("jobs/applyjobs/".$Job->job_id);?>"><span class="label label-success"> Apply Now</span></a>
						</ul>
					</div>
				</div>
				<div class="panel panel-default"><!-- job relevancy part -->
					<div class="panel-heading decor">You may also Like this <span class="glyphicon glyphicon-ok-sign"></span> </div>
					<div class="panel-body"> 
					<ul class="fm">
                    <?php foreach($Job->JobRelevancy as $data):?>
                    <div class="row">
                    	<li><a href="<?php echo site_url("jobs/".$data->job_alias)?>"><?php echo $data->job_title;?></a> </li>
                            <div class="disp">Deadline:
                            <?php echo "  "; echo convertdate($data->deadline);?>
                             <div class="pull-right">[<a href="<?php echo site_url("jobs/".$data->job_alias)?>">apply now</a>]</div>
                            </div>
                           
                   
                    </div>
						<?php endforeach;?>
					</ul>
					</div>
				</div><!-- end of job relevancy part -->
				
  		</div><!-- closing of left side -->
  		
	
  </div>
  	<!--<div class="row"><!-- jobs by different category panel -->
  		<div class="col-lg-12">
  			<div class="panel panel-default"><!-- opening of default panel -->
  				<ul class="nav nav-tabs">
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="#">Profile</a></li>
				  <li><a href="#">Messages</a></li>
				</ul>
				 <div class="tab-content"><!--tab panes opening -->
				 	<div class="tab-pane" id="newspaper">
				 	</div>
				 	
				 </div><!--tab panes closing -->
				 
  			</div><!-- closing of default panel -->
  			
  		</div>
  	</div>--><!-- jobs by different category panel -->
</div>
</body>
</html>