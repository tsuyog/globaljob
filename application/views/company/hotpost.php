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
						<div class="h3">Post</div>
					 <div class="form-group col-md-4">
					<form method="post" action="" enctype="multipart/form-data" role="form">
                    		<input type="text" class="form-control" name="job_title" id="job_title_id_id"  placeholder="Job Title or Name of the Job" >
				         </div>
				         <div class="form-group col-md-4">
				         	<input type="text" class="datepicker form-control" name="posted_date" placeholder="Posting date" />
				         </div>
				         <div class="form-group col-md-4">
				         	<input type="text" class="datepicker form-control" name="deadline"placeholder="Choose Deadline" />
				         </div>
				         <div class="form-group col-md-4">
				           <select disabled class="form-control" name="service_type">
				           	<option value="<?php echo 0;?>">Select Nature of Post</option>
				           	<?php foreach($services as $service):?>
				     	    <option value="<?php echo $service->service_type;?>"<?php if($service->service_type==1)echo "selected"; ?>><?php echo $service->service_name; ?></option>
				     	    <?php endforeach; ?>
				     	   </select>
				          </div>
				          
						  <div class="form-group col-md-4">
				           <select class="form-control" name="industry">
				     	    <option value="<?php echo 0; ?>">Select Industry</option>
				     	    <?php foreach($industries as $industry):?>
				     	    <option value="<?php echo $industry->industry_id;?>"><?php echo $industry->industry_name; ?></option>
				     	    <?php endforeach; ?>
				     	   </select>
				          </div> 
				          
						  <div class="form-group col-md-4">
				           <select class="form-control" name="function">
				           	<option value="<?php echo 0;?>">Select Function</option>
				           	<?php foreach($functions as $company_function): ?>
				     	    <option value="<?php echo $company_function->function_id; ?>"><?php echo $company_function->function_name;?></option>
				     	   <?php endforeach; ?>
				     	   </select>
				          </div>  
				           
						  <div class="form-group col-md-4">
				           <select class="form-control"name="joblocation">
				           		  <option value="<?php echo 0; ?>">Job Location</option>
				     	    <?php foreach($cities as $city):?>
				     	    	  <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
				     	    <?php endforeach;?>
				     	   </select>
				          </div> 
				          
						  <div class="form-group col-md-4">
				           <select class="form-control" name="working_type">
				           	<option value="<?php echo 0;?>">Select Working Type</option>
				           	<?php foreach($job_types as $job_type): ?>
				     	    <option value="<?php echo $job_type->job_type_id; ?>"><?php echo $job_type->job_type_name; ?></option>
				     	   <?php endforeach;  ?>
				     	   </select>
				          </div>  
				         <div class="form-group col-md-4">
				     	   <select class="form-control" name="job_level" id="job_level_id">
				     	    <option value="<?php echo 0; ?>">Job Level</option>
				     	    <?php foreach($joblevels as $jobLevel): ?>
				     	    	  <option value="<?php echo $jobLevel->job_level_id; ?>"><?php echo $jobLevel->job_level_name; ?></option>
				     	    <?php endforeach; ?>
				     	   </select>
				         </div>
				          
				          <div class="form-group col-md-4">
				     	   <select class="form-control" name="salary_range" id="salaryid">
				     	   	<option value="<?php echo 0;?>">Select Salary</option>
				     	   	<?php foreach($salary_ranges as $salary_range): ?>
				     	    <option value="<?php echo $salary_range->id; ?>"><?php echo $salary_range->salary_range; ?></option>
				     	    <?php endforeach; ?>
				     	   </select>
				         </div>
				         
				          <div class="form-group col-md-4">
							<input type="text" class="form-control" name="salary_amount" id="salar_amout_id"  placeholder="salary Amount" >
				         </div>
				         
				         <div class="form-group col-md-4">
							<input type="text" class="form-control" name="opening" id="opening_id" placeholder="No. of Openings" >
				         </div> 
				         
				          <div class="form-group col-md-4">
				     	   <select class="form-control" name="designation" id="designation_id">
				     	   	<option value="<?php echo 0;?>">Select Designation</option>
				     	   	<?php foreach($designations as $designation): ?>
				     	    <option value="<?php echo $designation->designation_id; ?>"><?php echo $designation->designation_name; ?></option>
				     	    <?php endforeach; ?>
				     	    <option value="other">Other</option>
				     	   </select>
				         </div> 
				         
				         <div class="form-group col-md-4">
							<input type="text" class="form-control" name="other_designation" id="other_designation_id" placeholder="Name of Designation if other" >
				         </div>                          
				                         
				                                                            	
				    	</div><!-- end of pannel body -->
				
				</div><!-- end of deafult pannel -->
				
				<div class="panel panel-default"><!-- second default panel -->
					 <div class="panel-heading">Job Requirement </div>
					 <div class="panel-body"><!-- second panel body -->
					 	          
					 	 <div class="form-group col-md-4">
							<input type="text" class="form-control" name="education_level" id="education_level_id" placeholder="Preferred Education Level" >
				         </div>
				         
				         <div class="form-group col-md-4">
				           <select class="form-control" name="sex" id="sex_id">
				           	<option value="">Preferred Sex</option>
				     	    <option value="male">Male</option>
				     	    <option value="female">Female</option>
				     	    <option value="Any">Any</option>
				     	   </select>
				         </div>
						  <div class="form-group col-md-4">
				           <select class="form-control" name="age_bar" id="age_bar_id">
				     	    <option value="">Age Bar</option>
				     	    <option value="yes">Yes</option>
				     	    <option value="No">No</option>
				     	   </select>
				          </div> 
				          <div class="form-group col-md-12">
				          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Education Description Below" disabled>
				          </div>
				          <div class="form-group col-md-12">      
				             <textarea class="ckeditor" name="education_description" id="education_description_id"> </textarea>   
				          </div> 
				
				          <div class="form-group col-md-12">
				          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Job Specification Below" disabled>
				          </div>
				          <div class="form-group col-md-12">      
				             <textarea class="ckeditor" name="job_specification" id="job_specification_id"> </textarea>   
				          </div> 
				          
				          <div class="form-group col-md-6">
				          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Special Requirement Below" disabled>
				          </div>
				          
				          <div class="form-group col-md-6">
				          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Organization Description Below" disabled>
				          </div>
				          
				          <div class="form-group col-md-6">      
				             <textarea class="ckeditor" name="special_requirement" id="special_requirement_id"> </textarea>   
				          </div>
				          
				          <div class="form-group col-md-6">      
				             <textarea class="ckeditor" name="organization_description" id="organization_description_id"> </textarea>   
				          </div> 
					</div>
			</div>
			<div class="panel panel-default"><!-- opening of third panel -->
		 <div class="panel-heading">Application Setting </div>
		 <div class="panel-body"><!-- Third panel body -->
		   
		   <div class="form-group col-md-6">

             <select class="form-control" name="apply_online" id="apply_online_id">
     	       <option value="">Apply Online</option>
     	       <option value="yes">Yes</option>
     	       <option value="No">No</option>
     	     </select>
     	  </div>
     	  
		   <div class="form-group col-md-6">
             <select class="form-control" name="by_post" id="by_post_id">
     	       <option value="">Apply By Post</option>
     	       <option value="yes">Yes</option>
     	       <option value="No">No</option>
     	     </select>
     	  </div>     	  
     	  
		   <div class="form-group col-md-6">
             <select class="form-control" name="apply_email" id="apply_email_id">
     	       <option value="">Apply By Email</option>
     	       <option value="yes">Yes</option>
     	       <option value="No">No</option>
     	       <option value="No">Specify</option>
     	     </select>
     	  </div>
     	  
	 	 <div class="form-group col-md-6">
			<input type="text" class="form-control" name="provided_email" id="provided_email_id" placeholder="Provided Email" >
         </div>
		 </div><!-- end of third body pannel -->
		 <div class="form-group col-md-3 pull-right btnlookup">
					    	<button type="submit" class="btn btn-default form-group pull-right">Post</button>
					    </div>
</div><!-- end of third panel -->
		</div>
		</form>
			<?php $this->load->view("company/companynav");?>
        </div>
	</div>
</body>