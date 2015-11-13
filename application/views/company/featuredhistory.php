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
					<div class="panel-body backgroundgray">
						<div class="look decor">History Of Featured Jobs</div>
                        <table class="table">
                         	<tr>
                            	<td>S.N.</td>
                                <td>Job</td>
                                <td>Industry</td>
                                <td>Function</td>
                                <td>Location</td>
                                <td>Designation</td>
                                <td>Type</td>
                                <td>Opening</td>
                                <td>Posted On</td>
                                <td>Deadline</td>
                            </tr>
                           <?php $sn=0; 
						   foreach($postedJob as $jobs): $sn++;?>
						   <tr>
                           	<td><?php echo $sn;?></td>
                            <td><?php echo $jobs->job_title;?></td>
                            <td><?php echo $jobs->Industry->industry_name;?></td>
                            <td><?php echo $jobs->Function->function_name;?></td>
                            <td><?php if($jobs->City!=array())echo $jobs->City->city_name;?></td>
                            <td><?php if($jobs->Designation!=array())echo $jobs->Designation->designation_name;?></td>
                            <td><?php if($jobs->Type!=array())echo $jobs->Type->job_type_name;?></td>
                            <td><?php if($jobs!=array())echo $jobs->job_openings;?></td>
                            <td><?php echo convertdate($jobs->posted_date);?></td>
                            <td><?php echo convertdate($jobs->deadline);?></td>
                           </tr>
                           <?php endforeach;?>
						   
                        </table>
					</div>
    			</div>
        	</div>
			<?php $this->load->view("company/companynav");?>
        </div>
	</div>
</body>