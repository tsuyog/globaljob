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
    				<div class="search-form-container col-md-5 pull-left" > 
                <form action="" role="form" enctype="multipart/form-data">
               		 	<div class="input-group">
               		 	<input type="text" class="form-control by_company_name" style="margin-right:110px;" name="by_company_name" id="by_keywords" placeholder="keywords">			
                        <div class="input-group-btn" style="margin-right:5px">
                        <select class="btn btn-success by_function" name="by_education" id="by_education">
                        <option value="-1">Select Education</option>
                        <?php foreach($jobseekeracademic as $education):?>
                        <option value="<?php echo $education->jobseeker_level_of_degree;?>"><?php echo $education->jobseeker_degree_name;?></option>
						<?php endforeach;?>
                        </select>
                        <select class="btn btn-success by_location" name="by_location" id="by_location">
                        <option value="-1">Select Location</option>
						<?php foreach($jobseekeraddress as $location):?>
                        <option value="<?php echo $location->jobseeker_address;?>"><?php echo $location->jobseeker_address;?></option>
						<?php endforeach;?>
                        </select>
                     	<input type="submit" class="btn btn-success" value="Go!" >
                        </div>
                     </div>
              	 </form>
    List of Jobseeker 
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Name</td>
        <td>User Name</td>
        <td>Contact</td>
        <td>email</td>
        <td>Address</td>
        <td>Nationality</td>
        <td>D.O.B</td>
        <td>Marital Status</td>
    </tr>
    </thead>
    <tbody>
    <?php $sn=0; foreach($jobseekerdetail as $jobseeker): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $jobseeker->jobseeker_first_name; echo " "; echo $jobseeker->jobseeker_middle_name; echo " ";
		echo $jobseeker->jobseeker_last_name;?></td>
        <td><?php echo $jobseeker->jobseeker_user_name;?></td>
        <td><?php echo $jobseeker->jobseeker_contact_number;?></td>
        <td><?php echo $jobseeker->jobseeker_email;?> </td>
        <td><?php echo $jobseeker->jobseeker_address;?> </td>
        <td><?php echo $jobseeker->jobseeker_nationality;?> </td>
        <td><?php echo $jobseeker->jobseeker_dob;?> </td>                     
    	<td><?php echo $jobseeker->jobseeker_marital_status;?></td>
    </tr>
    <?php endforeach; ?>
	<input type="button" onclick="tableToExcel('datatable', 'Exported')" value="Export to Excel" class="abc pull-right">
    </tbody>
    
    </table>
    </div>
	<script>
		$("#by_education").change(function(e) {
          e.preventDefault();
		  var jobseeker_level_of_degree=$(this).val();
			$.ajax({ 
			url:"<?php echo site_url("admin/ajax/searchjobseeker");?>",
			cache:false,
			data:{jobseekerlevelofdegree:jobseeker_level_of_degree},
			type:'POST',
			success: function(data){
				$("#datatable").html(data);
				//alert(data);
				}
			}); 
        });
		$("#by_location").change(function(e) {
          e.preventDefault();
		  var jobseeker_address=$(this).val();
			$.ajax({ 
			url:"<?php echo site_url("admin/ajax/searchjobseekerlocation");?>",
			cache:false,
			data:{jobseekeraddress:jobseeker_address},
			type:'POST',
			success: function(data){
				$("#datatable").html(data);
    			//alert(data);
				}
			});  
        });
    </script>
</div>
</div>
</div>
<body>
</body>
</html>