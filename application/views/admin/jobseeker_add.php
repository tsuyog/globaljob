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
     	  <option>Select Sex</option>
          <option value="<?php echo "male"; ?>"><?php echo "Mr.";?></option>
     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
     	 </select>
        </div>
        <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="jobseeker_first_name" placeholder="First Name" >
  		</div>
		<div class="form-group col-md-4">
     	<input type="text" class="form-control" name="jobseeker_middle_name" placeholder="Middle Name">
   		</div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_last_name" placeholder="Last Name">
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_contact" placeholder="Contact Numer">
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_email" placeholder="Email" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_address" placeholder="Address e.g Kalopool , Ktm" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_dob" placeholder="Date Of Birth e.g YY-MM-DD" >
        </div>
        <div class="form-group col-md-4">
        <input type="text" class="form-control" name="jobseeker_nationality" placeholder="Nationality e.g nepali" >
        </div>
   		<div class="form-group col-md-4">
     	 <select name="marital_status" class="form-control" >
     	  <option>Marital Status</option>
          <option value="Married"><?php echo "Married";?></option>
     	  <option value="Single"><?php echo "Single";?></option>
     	 </select>
        </div>
    </div>  
	<div class="panel-heading">
    Jobseeker Login Detail
	</div>
    <div class="panel-body">
    	<div class="form-group col-md-4">
        <input type="text" class="form-control" name="user_name" placeholder="User Name" >
        </div>
        <div class="form-group col-md-4">
        <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        <div class="form-group col-md-4">
        <input type="password" class="form-control" placeholder=" Confirm Password" >
        </div>
    	<div class="form-group col-md-4">
        <button type="submit" class="btn btn-default pull-left">Save</button> 
        </div>
    </div>
        
    </form>
</div>
</div>
</div>          