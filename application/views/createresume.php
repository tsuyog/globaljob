<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
<?php $this->load->view("includes-header"); ?>
<?php $this->load->view("include-site-header"); ?>
<?php $this->load->view("menu"); ?>
</head>
<div class="container site-body">
		<div class="row">
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="look decor">Personal Details</div>
						<table class="table table-striped">
						 <tr>
						 	<td>Your Name</td>
						 	<td>Address</td>
                            <td>Email</td>
                            <td>Contact</td>
						 </tr>
                         <tr>
                         	<td><?php echo $jobseekerdetail->jobseeker_first_name." ".$jobseekerdetail->jobseeker_middle_name." ".$jobseekerdetail->jobseeker_last_name;?></td>
                            <td><?php echo $jobseekerdetail->jobseeker_address;?></td>
                            <td><?php echo $jobseekerdetail->jobseeker_email;?></td>
                            <td><?php echo $jobseekerdetail->jobseeker_contact_number;?></td>	
                         </tr>
                        </table>                   
            		</div>
               		<div class="panel-body" style="margin-top:10px;">
                    	<div class="look decor">Your Education Details:</div>
                    	<table class="table table-striped">
                    	<tr>
                    		<td>Degree Level</td>
                            <td>Degree Name</td>
                            <td>Graduation Year</td>
                            <td>Score</td>
                        </tr>   
                    	<?php if($academic==array())echo "you dont have any academic details";else foreach($academic as $academic_detail):?>
                    	<tr>
                        <td><?php echo $academic_detail->jobseeker_level_of_degree;?></td>
                        <td><?php echo $academic_detail->jobseeker_degree_name;?></td>
                        <td><?php echo $academic_detail->jobseeker_graduation_year;?></td>
                        <td><?php echo $academic_detail->jobseeker_score;?></td>
                        </tr>
						<?php endforeach;?> 
                    </table>
                    </div>
                	<div class="panel-body" style="margin-top:10px;">
                    	<div class="look decor">Your Training</div>
                        <table class="table table-striped">
                        <tr>
                        	<td>Training Year</td>
                            <td>Description</td>
                            <td>Purpose</td>
                        </tr>
                        <?php if($training==array())echo "you dont have any training";else foreach($training as $training_detail):?>
                        <tr>
                        	<td><?php echo $training_detail->jobseeker_training_year;?></td>
                            <td><?php echo $training_detail->jobseeker_training_description;?></td>
                            <td><?php echo $training_detail->jobseeker_training_purpose;?></td>
                        </tr>
                        <?php endforeach;?>
                        </table>
                    </div>
                	<div class="look-decor pull-right" style="margin-top:10px;"><a href="#" class="btn btn-success">Create</a></div>
                </div>
            </div>
        	<?php $this->load->view("jobseekernav");?>
        </div>
</div>