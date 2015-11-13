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
    Add State or Zone <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" >
   	<div class="form-group col-md-4">
          <select name="country" id="country_id" class="form-control">
          	<option value="">Select Country</option>
          	<?php foreach($countries as $country): ?>
          	<option value="<?php echo $country->country_id; ?>"><?php echo $country->country; ?></option>
          	<?php endforeach;?>
          </select>
    </div>
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
    <div class="form-group col-md-4">
          <select name="state" id="state_id" class="form-control">
          	<option value="">Select State</option>
          	<?php foreach($states as $state): ?>
          	<option value="<?php echo $state->state_id; ?>"><?php echo $state->state_name; ?></option>
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
    <div class="form-group col-md-4">
          <input type="text" class="form-control" name="city_name" placeholder="City Name" >
    </div>
    <div class="form-group col-md-12 ">
    <button type="submit" class="btn btn-default pull-right">Save</button> 
    
    </div>
    </form>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>