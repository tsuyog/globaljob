<?php $this->load->view("includes-header"); ?>
<?php $this->load->view("include-site-header"); ?>
<?php $this->load->view("menu"); ?>
<div class="container site-body">
	<div class="row">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="search-form-container col-md-5 pull-left" > 
                <form action="" role="form" enctype="multipart/form-data">
               		 <div class="input-group">
               		 	<input type="text" class="form-control by_company_name" style="margin-right:110px;" name="by_company_name" id="by_company_name" placeholder="company name">			
                        <div class="input-group-btn" style="margin-right:5px">
                        <select class="btn btn-success by_function" name="by_function" id="by_function">
                        <option value="-1">Select Functions</option>
						<?php foreach($functions as $function):?>
                        <option value="<?php echo $function->function_id;?>"><?php echo $function->function_name;?></option>
                       <?php endforeach;?>
                        </select>
                        <select class="btn btn-success by_location" name="by_location" id="by_location">
                        <option value="-1">Select Location</option>
						<?php foreach($location as $locations):?> 
                        <option value="<?php echo $locations->city_id;?>"><?php echo $locations->city_name;?></option>
                        <?php endforeach;?>
                        </select>
                   <select class="btn btn-success by_salary_range" name="by_salary_range" id="by_salary_range">
                        <option>Select Salary Range</option>
                       <?php foreach($salaryrange as $salary_range):?>
                        <option value="<?php echo $salary_range->id;?>"><?php echo $salary_range->salary_range;?></option>
                       <?php endforeach;?>
                        </select>
                     	<input type="submit" class="btn btn-success" value="Go!" >
                        </div>
                     </div>
               </form>
                </div>
             </div>
            </div>
          </div>
      		
    <div class="panel panel-default" id="search_result">
                <div class="panel-heading look decor">JOBS</div>
                <div class="panel-body">
                <table class="table table-striped">
                <tr>
                <th>Company Logo</th>
                <th>Job Title</th>
                <th>Location</th>
                <th>Salary Range</th>
                <th>Deadline</th>
                <th></th>
                </tr>
                <?php foreach($jobs as $job):?>
                <tr>
                <figure class="logo">
                <td><img src="<?php echo base_url()."resources/company_logos/".$job->Company->company_logo;?>" height="50" width="50"></td>
                </figure>
                <td><?php echo $job->job_title;?></td>
                <td><?php echo $job->location->city_name;?></td>
                <td><?php if(!empty($job->salary_range->salary_range))echo $job->salary_range->salary_range;?></td>
                <td><?php echo getdays($job->deadline)."days left";?></td>
                <td><a href="<?php echo site_url("jobs/applyjobs/".$job->job_alias);?>" class="btn btn-success">Apply now</a>
                </tr>
                <?php endforeach;?>
                </table>
                </div>
                
                </div>
                
    <script>
		$(".by_company_name").change(function(e) {
			var company_name=$(this).val();
			$.ajax({
				url:"<?php echo site_url("ajax/searchjobs");?>",
				cache:false,
				data:{company:company_name},
				type:'POST',
				success: function(data){ 
					$("#search_result").html(data);
				}
			});
        });
		
		/*$(".by_company_name").blur(function(e) {
        	   var company_name=$(this).val();
			   alert(company_name);
        });*/
		$(".by_function").change(function(e) {
            e.preventDefault();
			var function_id= $(this).val();
			$.ajax({ 
			url:"<?php echo site_url("ajax/searchjobs");?>",
			cache:false,
			type:'POST',
			data:{functionid:function_id},
			success: function(data){
				$("#search_result").html(data);
				}
			});
        });
		$(".by_location").change(function(e) {
            e.preventDefault();
			var location_id=$(this).val();
			$.ajax({
				url:"<?php echo site_url("ajax/searchjobs");?>",
				cache:false,
				type:'POST',
				data:{locationid:location_id},
				success: function(data){
					$("#search_result").html(data);
					}
			});
        });
		$(".by_salary_range").change(function(e) {
            e.preventDefault();
			var salary_range_id=$(this).val();
			$.ajax({
				url:"<?php echo site_url("ajax/searchjobs");?>",
				cache:false,
				data:{salaryrangeid:salary_range_id},
				type:'POST',
				success: function(data){
					$("#search_result").html(data);
					}
			});
        });
                
    </script>            
        
</div>
