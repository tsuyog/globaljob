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
				<form role="form" action="" method="post"  name="chpassword" id="chpassword" class="validation_form" enctype="multipart/form-data" >
					<div class="panel-body">
						<div class="h3">Settings</div>
						<div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="user_name" id="user_name" placeholder="user name" >
					    </div>
					    <div class="form-group col-md-3">
					    	  <input type="password" class="form-control old_pass" name="old_password" id="old_password" placeholder="old Password" >
					    </div>
					    <div class="form-group col-md-3">
					    	  <input type="password" class="form-control" name="new_password" id="password" placeholder="New Password" >
					    </div>
					    <div class="form-group col-md-3">
					    	  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
					    </div>
					    <div class="form-group col-md-3 pull-right">
					    	<button type="submit" class="btn btn-default form-group pull-right" id="create">Update</button>
					    </div>
<script>
	$(document).ready(function(e) {
        $(".old_pass").blur(function(e) {
		var pass=$(this).val();
		var user_name=$('#user_name').val();
		$.ajax({
			url:"<?php  echo site_url("ajax/checkOldPassword");?>",
			cache:false,
			type:'POST',
			data:{ field_name:'password',
				   tbl_name:'tbl_company',
				   user_name:user_name,
				   password:pass
				   },
			success: function(data){ 
					if(data=='false'){
						$('#old_password').addClass('has-error');
						$('#create').attr('disabled', 'disabled');
					}
					else {
						$('#old_password').removeClass('has-error');
						$('#create').removeAttr('disabled');
						}
				}
    	});
    });
	});
	
</script>	
					</div>
				</div>
				</form>
			</div>
			<?php $this->load->view("company/companynav");?>
		</div>
	</div>
</body>
</html>