<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
<div class="row" > 
<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
     Jobseeker Information <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/jobseeker");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" enctype="multipart/form-data" >
     	<div class="form-group col-md-4">
     	 <select name="jobseeker_sex" class="form-control" >
     	  <option value="<?php echo "male"; ?>"><?php echo "Mr.";?></option>
     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
     	 </select>
        </div>
        <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="jobseeker_first_name" value="<?php echo $jobseeker->jobseeker_first_name;?>" >
  		</div>
		<div class="form-group col-md-4">
     	<input type="text" class="form-control" name="jobseeker_middle_name" placeholder="<?php if(empty($jobseeker->jobseeker_middle_name))echo "enter middle name";else echo $jobseeker->jobseeker_middle_name;?>" >
   		</div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_last_name" value="<?php echo $jobseeker->jobseeker_last_name;?>" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_contact" value="<?php echo $jobseeker->jobseeker_contact_number;?>" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_email" value="<?php echo $jobseeker->jobseeker_email;?>" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_address" value="<?php echo $jobseeker->jobseeker_address;?>" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_dob" value="<?php echo $jobseeker->jobseeker_dob;?>" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_nationality" value="<?php echo $jobseeker->jobseeker_nationality;?>" >
        </div>
   		<div class="form-group col-md-4">
     	 <select name="maritul_status" class="form-control" >
     	  <option value="Married" <?php if($jobseeker->jobseeker_marital_status=="Married")echo "selected"; ?>><?php echo "Married";?></option>
     	  <option value="Single" <?php if($jobseeker->jobseeker_marital_status=="single")echo "selected"; ?>><?php echo "Single";?></option>
     	 </select>
        </div>
        <div class="form-group col-md-4">
        <button type="submit" class="btn btn-default pull-left">Save</button> 
   		</div>
    </div>  
	</form>
</div>
</div>
</div>          