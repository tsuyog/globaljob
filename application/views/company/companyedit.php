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
		<div class="col-lg-9"><!-- main profile of company or content -->
			<div class="panel panel-default">
				<form role="form" action="" method="post" enctype="multipart/form-data" >
				<div class="panel-body">
					<div class="h3"> Company Information</div>
					<div class="form-group col-md-4">
				     	<select class="form-control" name="industry" selected="<?php $industrydetail->industry_name;?>">
				     		<option value="<?php echo 0; ?>">Select Industry</option>
				     		<?php foreach($industries as $industry):?>
				     	<option value="<?php echo $industry->industry_id; ?>" <?php if($industry->industry_id==$companydetail->industry_id)echo "selected";?>><?php echo $industry->industry_name;?></option>
				     	    <?php endforeach; ?>
				     	</select>
				     </div>
				     <div class="form-group col-md-4">
				     	<input type="text" class="form-control" name="company_name" value="<?php echo $companydetail->company_name;?>">
				   </div>
				    <div class="form-group col-md-4">
				       <select class="form-control" name="function">
				       	<option value="<?php echo 0; ?>">Select Function/Category</option>
				       	<?php foreach($functions as $company_function):?>
				     	<option value="<?php echo $company_function->function_id; ?>"<?php if($company_function->function_id==$companydetail->function_id)echo "selected";?>><?php echo $company_function->function_name;?></option>
				     	<?php endforeach; ?>
				     	</select>
				    </div>
				    <div class="form-group col-md-4">
				    	<select class="form-control"name="company_size">
				    		<option value="<?php echo 0;?>">Select Company Size</option>
				    		<?php foreach($sizes as $size): ?>
				    		<option value="<?php echo $size->company_size_id;?>" <?php if($size->company_size_id==$companydetail->size_id)echo "selected";?>><?php echo $size->company_size_range;?></option>
				    		<?php endforeach;?>
				    	</select>
				    </div>
				        <div class="form-group col-md-4">
				    	<select class="form-control"name="ownership_name">
				    		<option value="<?php echo 0;?>">Select Ownership </option>
				    		<?php foreach($ownerships as $ownership): ?>
				    		<option value="<?php echo $ownership->ownership_id;?>" <?php if($ownership->ownership_id==$companydetail->ownership_id)echo "selected";?>><?php echo $ownership->ownership_name;?></option>
				    		<?php endforeach;?>
				    	</select>
				    </div>
				    
				    <div class="form-group col-md-4">
				     	<input type="text" class="form-control" name="street_address" value="<?php echo $companydetail->street_address;?>">
				   </div>
				    <div class="form-group col-md-12">
				          	<input class="form-control" id="disabledInput" type="text" placeholder="Description of Organixation" disabled>
				   	</div>
				   	<div class="form-group col-md-12">      
				             <textarea class="ckeditor" name="organization_description" id="organization_description"><?php echo $companydetail->company_profile;?></textarea>   
				   	</div>
				   
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="h3">Company Head</div>
						<div class="form-group col-md-3">
					     	 <select name="company_head_sex" class="form-control" >
					     	  <option value="<?php echo "male"; ?>"><?php echo "Mr.";?></option>
					     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
					     	 </select>
					    </div>
					    <input type="hidden" name="company_head_id" value="<?php echo $companydetail->company_head_id;?>">
                        <div class="form-group col-md-3">
                              <input type="text" class="form-control" name="contacthead_first_name" value="<?php echo $companyheaddetail->company_head_first_name;?>">
					    </div>
					    <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="contacthead_middle_name" value="<?php echo $companyheaddetail->company_head_middle_name;?>">
					    </div>
					    <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="contacthead_last_name" value="<?php echo $companyheaddetail->company_head_last_name;?>" >
					    </div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="h3">Contact Information</div>
							<div class="form-group col-md-3">
					     	 <select name="contact_sex" class="form-control" >
					     	  <option value="<?php echo "male"; ?>"><?php echo "Mr.";?></option>
					     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
					     	 </select>
					        </div>
                            <input type="hidden" name="contact_id" value="<?php echo $companydetail->contact_id;?>">
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="contact_first_name" value="<?php echo $contactdetail->company_contact_first_name;?>">
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="contact_middle_name" value="<?php echo $contactdetail->company_contact_middle_name;?>" >
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="contact_last_name" value="<?php echo $contactdetail->company_contact_last_name;?>" >
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="phone_one" value="<?php echo $contactdetail->company_phone_one;?>">
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="alternate_phone" value="<?php echo $contactdetail->company_phone_two;?>">
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="email" value="<?php echo $contactdetail->company_email;?>">
					        </div>
					        <div class="form-group col-md-3">
					    	  <input type="text" class="form-control" name="confirm_email" value="<?php echo $contactdetail->company_email;?>">
					        </div>
					        <div class="form-group col-md-3">
					    	  <select name="country" id="country_id" class="form-control" >
					     	  <option value="<?php echo 0; ?>">Choose Country</option>
					     	  <?php foreach($countries as $country): ?>
					     	  		<option value="<?php echo $country->country_id; ?>"<?php if($country->country_id==$contactdetail->company_location_id)echo "selected";?>><?php echo $country->country; ?></option>
					     	  	<?php endforeach;?>
					     	 </select>
					     	 <script>
								 function prepareCombos()
								 {
									 $.txtoptions='<option value="-1">Please Select</option>';
									 $("#city_id").html($.txtoptions);
									 $("#state_id").html($.txtoptions);
								 }
								 $("#country_id").change(function()
								 {
									 prepareCombos();
									 var country_id=$(this).val();
									 $.ajax({
										url:'<?php echo base_url(); ?>admin/ajax/getstates/'+country_id+'.html',
										cache:false,
										dataType:"JSON",
										success: function(data)
										{
											$.txtoptions='<option value="-1">Select State</option>';
											$.each(data,function(index,value){
												$.txtoptions+='<option value="'+value.state_id+'">'+value.state_name+'</option>';
												
											});
											$("#state_id").html($.txtoptions);
										}
									 });
									 
								 });
								 </script>
					     	 </div>
					     	 <div class="form-group col-md-3" id="state_container">
						    	  <select name="state" id="state_id" class="form-control" >
						     	  <option value="-1">Choose Country First</option>
						     	 </select>
						     </div>
						     <script>
								 	$("#state_id").change(function(e) {
						               var state_id=$(this).val();
										 $.ajax({
											url:'<?php echo base_url(); ?>admin/ajax/getcities/'+state_id+'.html',
											cache:false,
											dataType:"JSON",
											success: function(data)
											{
												$.txtoptions='<option value="-1">Select City</option>';
												$.each(data,function(index,value){
												$.txtoptions+='<option value="'+value.city_id+'">'+value.city_name+'</option>';
													
												});
												$("#city_id").html($.txtoptions);	
											}
										 }); 
						            });
								 </script>
						     <div class="form-group col-md-3" id="city_container">
						    	  <select name="city" id="city_id" class="form-control" >
						     	  	<option value="<?php echo 0; ?>">Select State</option>
						     	  	<?php foreach($cities as $city):?>
						     	  		<option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name;?></option>
						     	  	<?php endforeach;?>
						     	  </select>
						        </div>
						        <div class="form-group col-md-3">
						    	  <input type="text" class="form-control" name="company_url" value="<?php echo $contactdetail->company_url;?>"  >
						        </div>
					</div>
						<input type="submit" class="btn btn-default form-group col-md-3" value="Update">
				</div>
			</div>
			</form>
		</div><!-- closing of main right panel -->
		<?php $this->load->view("company/companynav");?>
	</div>
	</div>
	
</body>
</html>