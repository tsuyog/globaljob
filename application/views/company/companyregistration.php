<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employer Registration</title>

</head>
<body>
	<?php $this->load->view("include-site-header"); ?>
	<?php $this->load->view("menu"); ?>
<div class="row" > 
<div class="container">
<div class="panel panel-default">
    <div class="panel-body backgroundgray">
    <div class="h3">Company Information</div>
    <form role="form" action="" method="post" enctype="multipart/form-data" >
    <div class="form-group col-md-4">
     	<select class="form-control" name="industry">
     		<option value="<?php echo 0; ?>">Select Industry</option>
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
       	<option value="<?php echo 0; ?>">Select Function/Category</option>
       	<?php foreach($functions as $company_function):?>
     	<option value="<?php echo $company_function->function_id; ?>"><?php echo $company_function->function_name;?></option>
     	<?php endforeach; ?>
     	</select>
    </div>
    <div class="form-group col-md-4">
    	<select class="form-control"name="company_size">
    		<option value="<?php echo 0;?>">Select Company Size</option>
    		<?php foreach($sizes as $size): ?>
    		<option value="<?php echo $size->company_size_id;?>"><?php echo $size->company_size_range;?></option>
    		<?php endforeach;?>
    	</select>
    </div>
        <div class="form-group col-md-4">
    	<select class="form-control"name="ownership">
    		<option value="<?php echo 0;?>">Select Ownership </option>
    		<?php foreach($ownerships as $ownership): ?>
    		<option value="<?php echo $ownership->ownership_id;?>"><?php echo $ownership->ownership_name;?></option>
    		<?php endforeach;?>
    	</select>
    </div>
    <div class="form-group col-md-4">
    	<input type="file" class="form-control" name="company_logo" id="company_logo" />
    </div>
    <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="street_address" placeholder="Address e.g: Jhamsikhel, 07" >
   </div>

    </div>
</div>
<script>
	$(document).ready(function(e) {
        $(".check_user").blur(function(e) {
		var user=$(this).val();
		$.ajax({
			url:"<?php  echo site_url("ajax/checkusername");?>",
			cache:false,
			type:'POST',
			data:{ field_name:'user_name',
				   tbl_name:'tbl_company',
				   user_name:user
				   },
			success: function(data){ 
					if(data=='true'){
						$('#user_name').addClass('has-error');
						$('#create').attr('disabled', 'disabled');
					}
					else {
						$('#user_name').removeClass('has-error');
						$('#create').removeAttr('disabled');
						}
				}
    	});
    });
	});
	
</script>

<div class="panel panel-default">
 	<div class="panel-body backgroundgray">
 		<div class="h3">Log In Information</div>
 		<div class="form-group col-md-4">
    	  <input type="text" class="form-control check_user" name="user_name" id="user_name" placeholder="User Name" >
    	</div>
    	<div class="form-group col-md-4">
    	  <input type="password" class="form-control" name="password" placeholder="Password" >
    	</div>
    	<div class="form-group col-md-4">
    	  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
    	</div>
    	<div class="form-group"><!-- save buttton div -->
        	<button type="submit" class="btn btn-default pull-right" id="create">I accpet, Create My Account</button> 
    	</div><!-- closing of save div -->
 	</div>
 </div>
    
</form><!-- closing of master form -->
</div>
</div>
<body>
</body>
</html>