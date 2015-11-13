<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-theme.css">
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
	<div class="row" > 
	<div class="container">
		<form role="form" action="" method="post" ><!-- master form -->
	<div class="panel panel-default">
	
		<div class="panel-heading">
    	Job Information<a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/jobs");?>"><i class="glyphicon glyphicon-remove"></i></a>
    	</div>
    	
    	<div class="panel-body">
        <div class="form-group col-md-4">
			<input type="text" class="form-control" name="job_title" id="job_title_id_id"  value="<?php echo $jobs->job_title;?>" >
         </div>
         <div class="form-group col-md-4">
         	<input type="text" class="datepicker form-control" name="posted_date" value="<?php echo $jobs->posted_date;?>" />
         </div>
         <div class="form-group col-md-4">
         	<input type="text" class="datepicker form-control" name="deadline" value="<?php echo $jobs->deadline;?>" />
         </div>
		  <div class="form-group col-md-4">
           <select class="form-control" name="service_type">
           	<option value="">Select Nature of Post</option>
           	<?php foreach($service as $services):?>
     	    <option value="<?php echo $services->service_type; ?>" <?php if($jobs->job_service_type==$services->service_type)echo "selected";?>><?php echo $services->service_name; ?></option>
     	    <?php endforeach; ?>
     	   </select>
          </div>
          
		  <div class="form-group col-md-4">
           <select class="form-control" name="industry">
     	    <option value="<?php echo ""; ?>">Select Industry</option>
     	    <?php foreach($industry as $industries):?>
     	    <option value="<?php echo $industries->industry_id; ?>" <?php if($jobs->industry_id==$industries->industry_id)echo "selected";?>><?php echo $industries->industry_name; ?></option>
     	    <?php endforeach; ?>
     	   </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" name="function" >
           	<option value="">Select Function</option>
           	<?php foreach($function as $company_function): ?>
     	    <option value="<?php echo $company_function->function_id; ?>" <?php if($jobs->function_id==$company_function->function_id)echo "selected";?>><?php echo $company_function->function_name;?></option>
     	   <?php endforeach; ?>
     	   </select>
          </div>  
           
		  <div class="form-group col-md-4">
           <select class="form-control" name="location" >
     	    <option value="<?php echo "content"; ?>">Job Location</option>
     	   <?php foreach($city as $cities): ?>
           <option value="<?php echo $cities->city_id;?>" <?php if($jobs->location_id==$cities->city_id)echo "selected";?>><?php echo $cities->city_name;?></option>
           <?php endforeach;?>
           </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" name="job_working_type" >
           	<option value="">Select Working Type</option>
           	<?php foreach($jobtype as $job_type): ?>
     	    <option value="<?php echo $job_type->job_type_id; ?>" <?php if($jobs->job_working_type==$job_type->job_type_id)echo "selected";?>><?php echo $job_type->job_type_name; ?></option>
     	   <?php endforeach;  ?>
     	   </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" name="company">
           	<option value="">Select Company</option>
           	<?php foreach($company as $companies): ?>
     	    <option value="<?php echo $companies->company_id; ?>" <?php if($jobs->company_id==$companies->company_id)echo "selected";?>><?php echo $companies->company_name; ?></option>
     	   <?php endforeach; ?>
     	   </select>
          </div>
          
         <div class="form-group col-md-4">
     	   <select class="form-control" name="job_level" id="job_level_id">
     	    <?php foreach($job_level as $job_levels):?>
            <option value="<?php echo $job_levels->job_level_id; ?>" <?php if($jobs->job_level_id==$job_levels->job_level_id)echo "selected";?>><?php echo $job_levels->job_level_name;?></option>
     	   <?php endforeach;?>
           </select>
         </div>
          
          <div class="form-group col-md-4">
     	   <select class="form-control" name="salaryrange" id="salaryid">
     	   	<option value="">Select Salary</option>
     	   	<?php foreach($salary_range as $salary_ranges): ?>
     	    <option value="<?php echo $salary_ranges->id; ?>" <?php if($jobs->salary_range_id==$salary_ranges->id)echo "selected";?>><?php echo $salary_ranges->salary_range; ?></option>
     	    <?php endforeach; ?>
     	   </select>
         </div>
         
          <div class="form-group col-md-4">
			<input type="text" class="form-control" name="salary_amount" id="salar_amout_id"  placeholder="salary Amount" >
         </div>
         
         <div class="form-group col-md-4">
			<input type="text" class="form-control" name="job_opening" id="opening_id" value="<?php echo $jobs->job_openings;?>" >
         </div> 
         
          <div class="form-group col-md-4">
     	   <select class="form-control" name="designation" id="designation_id">
     	   	<option value="">Select Designation</option>
     	   	<?php foreach($designation as $designations): ?>
     	    <option value="<?php echo $designations->designation_id; ?>" <?php if($jobs->designation_id==$designations->designation_id)echo "selected";?>><?php echo $designations->designation_name; ?></option>
     	    <?php endforeach; ?>
     	    <option value="other">Other</option>
     	   </select>
         </div> 
         
         <div class="form-group col-md-4">
			<input type="text" class="form-control" name="designation" id="designation_id" placeholder="Name of Designation if other" >
         </div>                          
                         
                                                            	
    	</div><!-- end of pannel body -->

</div><!-- end of deafult pannel -->

<div class="panel panel-default"><!-- second default panel -->
	 <div class="panel-heading">Job Requirement </div>
	 <div class="panel-body"><!-- second panel body -->
	 	          
	 	 <div class="form-group col-md-4">
			<input type="text" class="form-control" name="education_level" id="education_level_id" value="<?php echo $jobrequirement->job_requirement_education_level;?>" >
         </div>
         
         <div class="form-group col-md-4">
           <select class="form-control" name="sex" id="sex_id">
           	<option value="">Preferred Sex</option>
     	    <option value="male" <?php if($jobrequirement->sex=="male")echo "selected";?>>Male</option>
     	    <option value="female" <?php if($jobrequirement->sex=="female")echo "selected";?>>Female</option>
     	    <option value="Any" <?php if($jobrequirement->sex=="Any")echo "selected";?>>Any</option>
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
             <textarea class="ckeditor" name="education_description" id="education_description_id"><?php echo $jobrequirement->job_requirement_education_description;?> </textarea>   
          </div> 

          <div class="form-group col-md-12">
          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Job Specification Below" disabled>
          </div>
          <div class="form-group col-md-12">      
             <textarea class="ckeditor" name="job_specification" id="job_specification_id"><?php echo $jobrequirement->job_requirement_specification;?> </textarea>   
          </div> 
          
          <div class="form-group col-md-6">
          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Special Requirement Below" disabled>
          </div>
          
          <div class="form-group col-md-6">
          	<input class="form-control" id="disabledInput" type="text" placeholder="Write Organization Description Below" disabled>
          </div>
          
          <div class="form-group col-md-6">      
             <textarea class="ckeditor" name="special_requirement" id="special_requirement_id"><?php echo $jobrequirement->job_requirement_special_requirement;?> </textarea>   
          </div>
          
          <div class="form-group col-md-6">      
             <textarea class="ckeditor" name="organization_description" id="organization_description_id"><?php echo $jobrequirement->job_requirement_organization_description;?> </textarea>   
          </div>  
          
	 </div><!-- end of second panel body-->
		
</div><!-- end of second panel -->
<div class="panel panel-default"><!-- opening of third panel -->
		 <div class="panel-heading">Application Setting </div>
		 <div class="panel-body"><!-- Third panel body -->
		   
		   <div class="form-group col-md-6">
             <select class="form-control" name="apply_online" id="apply_online_id">
     	       <option value="">Apply Online</option>
     	       <option value="yes" <?php if($applicationsetting->by_online=="yes")echo "selected";?>>Yes</option>
     	       <option value="No" <?php if($applicationsetting->by_online=="No")echo "selected";?>>No</option>
     	     </select>
     	  </div>
     	  
		   <div class="form-group col-md-6">
             <select class="form-control" name="by_post" id="by_post_id">
     	       <option value="">Apply By Post</option>
     	       <option value="yes" <?php if($applicationsetting->by_post=="yes")echo "selected";?>>Yes</option>
     	       <option value="No" <?php if($applicationsetting->by_post=="No")echo "selected";?>>No</option>
     	     </select>
     	  </div>     	  
     	  
		   <div class="form-group col-md-6">
             <select class="form-control" name="apply_email" id="apply_email_id">
     	       <option value="">Apply By Email</option>
     	       <option value="yes" <?php if($applicationsetting->by_email=="yes")echo "selected";?>>Yes</option>
     	       <option value="No" <?php if($applicationsetting->by_email=="No")echo "selected";?>>No</option>
     	       <option value="No" <?php if($applicationsetting->by_email=="No")echo "selected";?>>Specify</option>
     	     </select>
     	  </div>
     	  
	 	 <div class="form-group col-md-6">
			<input type="text" class="form-control" name="provided_email" id="provided_email_id" value="<?php echo $applicationsetting->email;?>" >
         </div>
		 </div><!-- end of third body pannel -->
		 
</div><!-- end of third panel -->
<div class="form-group"><!-- save buttton div -->
        <button type="submit" class="btn btn-default pull-right">Save</button> 
</div><!-- closing of save div -->
</form> <!-- end of master form -->
</div><!-- closing of container -->
</div><!-- closing of row -->
</body>
</html>