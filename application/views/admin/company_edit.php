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
     Company Information <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/company");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" enctype="multipart/form-data" >
    <div class="form-group col-md-4">
     	<select class="form-control" name="industry">
     		<option value="<?php echo 0; ?>">Select Industry</option>
     		<?php foreach($industry as $industries):?>
     	<option value="<?php echo $industries->industry_id; ?>" <?php if($industries->industry_id==$companies->industry_id)echo "selected";?>><?php echo $industries->industry_name;?></option>
     	    <?php endforeach; ?>
     	</select>
     </div>
   <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="company_name" value="<?php echo $companies->company_name;?>" >
   </div>
    <div class="form-group col-md-4">
       <select class="form-control" name="function">
       	<option value="<?php echo 0; ?>">Select Function/Category</option>
       	<?php foreach($function as $company_function):?>
     	<option value="<?php echo $company_function->function_id; ?>" <?php if($company_function->function_id==$companies->function_id)echo "selected";?>><?php echo $company_function->function_name;?></option>
     	<?php endforeach; ?>
     	</select>
    </div>
    <div class="form-group col-md-4">
    	<select class="form-control"name="company_size">
    		<option value="<?php echo 0;?>">Select Company Size</option>
    		<?php foreach($size as $sizes): ?>
    		<option value="<?php echo $sizes->company_size_id;?>" <?php if($sizes->company_size_id==$companies->size_id)echo "selected";?>><?php echo $sizes->company_size_range;?></option>
    		<?php endforeach;?>
    	</select>
    </div>
        <div class="form-group col-md-4">
    	<select class="form-control"name="ownership">
    		<option value="<?php echo 0;?>">Select Ownership </option>
    		<?php foreach($ownership as $ownerships): ?>
    		<option value="<?php echo $ownerships->ownership_id;?>" <?php if($ownerships->ownership_id==$companies->ownership_id)echo "selected";?>><?php echo $ownerships->ownership_name;?></option>
    		<?php endforeach;?>
    	</select>
    </div>
    <div class="form-group col-md-4">
    	<input type="file" class="form-control" name="company_logo" id="company_logo" />
    </div>
    <div class="form-group col-md-4">
     	<input type="text" class="form-control" name="street_address" value="<?php echo $companies->street_address;?>" >
   </div>
    <div class="form-group col-md-12">
          	<input class="form-control" id="disabledInput" type="text" placeholder="Description of Organixation" disabled>
   	</div>
   	<div class="form-group col-md-12">      
             <textarea class="ckeditor" name="organization_description" id="organization_description"><?php echo $companies->company_profile;?> </textarea>   
   	</div>

    </div>
</div>
<div class="panel panel-default"><!-- starting of new pannel for company contact information -->
<div class="panel-heading">
    Company Contact Information
</div>
<div class="panel-body"><!-- main body of the pannel for contact Person information-->
    	<div class="form-group col-md-3">
     	 <select name="contact_sex" class="form-control" >
     	  <option value="<?php echo "male"; ?>"><?php echo "Mr.";?></option>
     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
     	 </select>
        </div>
        <div class="form-group col-md-3">
    	  <input type="hidden" name="contact_id" value="<?php echo $companycontacts->company_contact_id;?>">
          <input type="text" class="form-control" name="contact_first_name" value="<?php echo $companycontacts->company_contact_first_name;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contact_middle_name" value="<?php echo $companycontacts->company_contact_middle_name;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contact_last_name" value="<?php echo $companycontacts->company_contact_last_name;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="phone_one" value="<?php echo $companycontacts->company_phone_one;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="alternate_phone" value="<?php echo $companycontacts->company_phone_two;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="email" value="<?php echo $companycontacts->company_email;?>" >
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="confirm_email" placeholder="confirm email" >
        </div>
        <div class="form-group col-md-3">
         <select name="country" id="country_id" class="form-control" >
     	  <option value="<?php echo 0; ?>">Choose Country</option>
     	  <?php foreach($country as $countries): ?>
     	  		<option value="<?php echo $countries->country_id; ?>"><?php echo $countries->country; ?></option>
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
     	  <?php foreach($country as $countries):?>
     	  		<option value="<?php echo $countries->country_id; ?>"><?php echo $countries->country;?></option>
     	  	<?php endforeach;?>
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
     	  	<?php foreach($state as $states):?>
     	  		<option value="<?php echo $states->state_id; ?>"><?php echo $states->state_name;?></option>
     	  	<?php endforeach;?>
     	  </select>
        </div>
        <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="company_url" value="<?php echo $companycontacts->company_url;?>" >
        </div>
</div>
    </div><!-- end of pannel-->
<div class="panel panel-default"><!-- main pannel body for company Head -->
 <div class="panel-heading">
    Comapy Head Information
 </div>
 <div class="panel-body"><!-- opening of main pannel -->
 	 <div class="form-group col-md-3">
     	 <select name="company_head_sex" class="form-control" >
     	  <option value="<?php echo "male"; ?>" <?php if($companyheads->company_head_id==$companies->company_head_id)echo "selected";?>><?php echo "Mr.";?></option>
     	  <option value="<?php echo "female"; ?>"><?php echo "Ms.";?></option>
     	 </select>
    </div>
    <div class="form-group col-md-3">
    	  <input type="hidden" name="head_id" value="<?php echo $companyheads->company_head_id?>">
          <input type="text" class="form-control" name="contacthead_first_name" value="<?php echo $companyheads->company_head_first_name;?>" >
    </div>
    <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contacthead_middle_name" value="<?php echo $companyheads-> company_head_middle_name;?>" >
    </div>
    <div class="form-group col-md-3">
    	  <input type="text" class="form-control" name="contacthead_last_name" value="<?php echo $companyheads-> company_head_last_name;?>" >
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