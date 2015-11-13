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
<div class="panel panel-default">
	<div class="panel-heading">
    Comapy Information <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/designations");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" >
    <div class="form-group col-md-4">
     	<select class="form-control" name="industry">
     		<option value="">Select Industry</option>
     		<?php foreach($industries as $industry):?>
     	<option value="<?php echo $industry->industry_id; ?>"><?php echo $industry->industry_name;?></option>
     	    <?php endforeach; ?>
     	</select>
     </div>
   <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="company_name" placeholder="Company Name" >
   </div>
    <div class="form-group col-md-4">
       <select class="form-control" name="function">
       	<option value="">Select Function/Category</option>
       	<?php foreach($functions as $company_function):?>
     	<option value="<?php echo $company_function->function_id; ?>"><?php echo $company_function->function_name;?></option>
     	<?php endforeach; ?>
     	</select>
    </div>
    <div class="form-group col-md-4">
    	<select class="form-control"name="company_size">
    		<option value="">Select Company Size</option>
    		<?php foreach($sizes as $size): ?>
    		<option value="<?php echo $size->company_size_id;?>"><?php echo $size->company_size_range;?></option>
    		<?php endforeach;?>
    	</select>
    </div>
    <div class="form-group col-md-4">
    	<input type="file" class="form-control" name="company_logo" />
    </div>

    </div>
</div>
<div class="panel panel-default"><!-- starting of new pannel for company contact information -->
<div class="panel-heading">
    Comapy Contact Information
</div>
<div class="panel-body"><!-- main body of the pannel for contact Person information-->
    	<div class="form-group col-md-3">
     	 <select name="sex" id="sex_id" class="form-control" >
     	  <option value="<?php echo "male"; ?>">Mr.</option>
     	  <option value="<?php echo "female"; ?>">Ms.</option>
     	 </select>
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contact_first_name" placeholder="First Name" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contact_middle_name" placeholder="Middle Name" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contact_last_name" placeholder="Last Name" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="phone_one" placeholder="Primary phone" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="alternate_phone" placeholder="Alternate Phone" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="email" placeholder="Email Address" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="confirm_email" placeholder="confirm email" >
        </div>
        <div class="form-group col-md-3">
    	  <select name="country" id="country_id" class="form-control" >
     	  <option value="<?php echo "content"; ?>">Choose Country</option>
     	 </select>
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="address" placeholder="Address" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="company_url" placeholder="company website Url" >
        </div>
</div>
    </div><!-- end of pannel-->
<div class="panel panel-default"><!-- main pannel body for company Head -->
 <div class="panel-heading">
    Comapy Head Information
 </div>
 <div class="panel-body"><!-- opening of main pannel -->
 	 <div class="form-group col-md-3">
     	 <select name="sex" id="sex_id" class="form-control" >
     	  <option value="<?php echo "male"; ?>">Mr.</option>
     	  <option value="<?php echo "female"; ?>">Ms.</option>
     	 </select>
    </div>
    <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contacthead_first_name" placeholder="First Name" >
    </div>
    <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contacthead_middle_name" placeholder="Middle Name" >
    </div>
    <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contacthead_last_name" placeholder="Last Name" >
    </div>

 </div><!-- closing of main pannel -->
</div>
    <div class="form-group"><!-- save buttton div -->
        <button type="submit" class="btn btn-default pull-right">Save</button> 
    </div><!-- closing of save div -->
</form><!-- closing of master form -->
</div>
</div>
<body>
</body>
</html>