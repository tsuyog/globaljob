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
        <div class="form-group col-md-10">
			<input type="text" class="form-control" name="job_title" id="job_title_id_id"  placeholder="Job Title or Name of the Job" >
         </div>
         
		  <div class="form-group col-md-4">
           <select class="form-control" >
           	<option value="">Select Nature of Post</option>
           	<?php foreach($services as $service):?>
     	    <option value="<?php echo $service->service_type; ?>"><?php echo $service->service_name; ?></option>
     	    <?php endforeach; ?>
     	   </select>
          </div>
          
		  <div class="form-group col-md-4">
           <select class="form-control" >
     	    <option value="<?php echo ""; ?>">Select Industry</option>
     	    <?php foreach($industries as $industry):?>
     	    <option value="<?php echo $industry->industry_id; ?>"><?php echo $industry->industry_name; ?></option>
     	    <?php endforeach; ?>
     	   </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" >
           	<option value="">Select Function</option>
           	<?php foreach($functions as $company_function): ?>
     	    <option value="<?php echo $company_function->function_id; ?>"><?php echo $company_function->function_name;?></option>
     	   <?php endforeach; ?>
     	   </select>
          </div>  
           
		  <div class="form-group col-md-4">
           <select class="form-control" >
     	    <option value="<?php echo "content"; ?>">Job Location</option>
     	   </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" >
           	<option value="">Select Working Type</option>
           	<?php foreach($job_types as $job_type): ?>
     	    <option value="<?php echo $job_type->job_type_id; ?>"><?php echo $job_type->job_type_name; ?></option>
     	   <?php endforeach;  ?>
     	   </select>
          </div> 
          
		  <div class="form-group col-md-4">
           <select class="form-control" >
           	<option value="">Select Company</option>
           	<?php foreach($companys as $company): ?>
     	    <option value="<?php echo $company->company_id; ?>"><?php echo $company->company_name; ?></option>
     	   <?php endforeach; ?>
     	   </select>
          </div>
          
         <div class="form-group col-md-4">
     	   <select class="form-control" name="job_level" id="job_level_id">
     	    <option value="<?php echo "content"; ?>">Job Level</option>
     	   </select>
         </div>
          
          <div class="form-group col-md-4">
     	   <select class="form-control" name="salary" id="salaryid">
     	   	<option value="">Select Salary</option>
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
     	   	<option value="">Select Designation</option>
     	   	<?php foreach($designations as $designation): ?>
     	    <option value="<?php echo $designation->designation_id; ?>"><?php echo $designation->designation_name; ?></option>
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
          
	 </div><!-- end of second panel body-->
		
</div><!-- end of second panel -->
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
		 
</div><!-- end of third panel -->
<div class="form-group"><!-- save buttton div -->
        <button type="submit" class="btn btn-default pull-right">Save</button> 
</div><!-- closing of save div -->
</form> <!-- end of master form -->
</div><!-- closing of container -->
</div><!-- closing of row -->
<body>
</body>
</html>