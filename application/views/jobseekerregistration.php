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
        <form role="form" action="" method="post">
			<div class="col-lg-12"><!-- jobsseker registration container -->
				<div class="panel panel-default">
					<div class="panel-body backgroundgray">
						<div class="h3">Personal Information</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="form-group col-md-3">
						     	 <select name="sex" class="form-control" >
							     	  <option value="Male">Mr.</option>
							     	  <option value="Female">Ms.</option>
						     	 </select>
						        </div>
								<div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="first_name" placeholder="First Name" >
							   </div>
							   <div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="middle_name" placeholder="Middle Name" >
							   </div>
							   <div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="last_name" placeholder="Last Name" >
							   </div>
							   <div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="Contact" placeholder="Availabe Contact" >
							   </div>
							   <div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="email" placeholder="Email: abc@domain.com" >
							   </div>
							   <div class="form-group col-md-3">
							     	<input type="text" class="form-control" name="address" placeholder="Adress" >
							   </div>
							   <div class="form-group col-md-3">
						     	 <select name="country" class="form-control" >
							     	  <option value="">Select Nationality</option>
                                      <?php foreach($country as $data):?> 
							     	  <option value="<?php echo $data->country_id;?>"><?php echo $data->country;?></option>
							     	  <?php endforeach;?>
						     	 </select>
						        </div>
						        <div class="form-group col-md-3">
						        <select name="marital_status" class="form-control" >
							     	  <option value="">Marital Status</option>
							     	  <option value="single">Single</option>
							     	  <option value="married">Married</option>
						     	 </select>
						        </div>
						        <div class="form-group col-md-3">
							     	<input type="text" class="datepicker form-control" name="dob" placeholder="D.O.B." >
							   </div>
							   <div class="form-group col-md-3">
							   		<input type="file" class="form-control" name="jobseeker_image" />
							   </div>
							   
							</div>
						</div>
						<div class="h3">LogIn Information</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="form-group col-md-4">
							     	<input type="text" class="form-control jobseeker_user_name" name="user_name" placeholder="User name" id="jobseeker_user_name" >
							   </div>
							   <div class="form-group col-md-4">
							     	<input type="password" class="form-control" name="password" placeholder="Password" >
							   </div>
							   <div class="form-group col-md-4">
							     	<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
							   </div>
							   
							</div>
						</div>
							<div class="form-group">
								 <button type="submit" class="btn btn-default pull-right" id="create">I accpet, Create My Account</button>
		
        					</div>
					</form>
                    </div>
				</div>
	<script>
	$(document).ready(function(e) {
        $(".jobseeker_user_name").blur(function(e) {
		var user=$(this).val(); 
		$.ajax({
			url:"<?php  echo site_url("ajax/checkusername");?>",
			cache:false,
			type:'POST',
			data:{ field_name:'jobseeker_user_name',
				   tbl_name:'tbl_jobseeker',
				   user_name:user
				   },
			success: function(data){ 
					if(data=='true'){
						$('#jobseeker_user_name').addClass('has-error');
						$('#create').attr('disabled', 'disabled');
					}
					else {
						$('#jobseeker_user_name').removeClass('has-error');
						$('#create').removeAttr('disabled');
						}
				}
    	});
    });
	});
	
</script>
			</div>
		</div>
	</div>
		
</body>
</html>