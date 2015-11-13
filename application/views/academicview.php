<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
</head>
<body>
<?php $this->load->view("includes-header"); ?>
<?php $this->load->view("include-site-header"); ?>
<?php $this->load->view("menu"); ?>
<div class="container site-body">
	<div class="row">
    	<div class="panel panel-default backgroundgray col-lg-9">
            	<div class="panel-body ">
                	<div class="h3">Edit your Academy</div>
                    	<div class="panel panel-default">
                        	<div class="panel-body ">
                            	<ul class="nav nav-tabs">
                                <li><a href="#education" data-toggle="tab">Education</a></li>
                                <li><a href="#experience" data-toggle="tab">Experience</a></li>
                                </ul>  
                           		<div class="tab-content col-md-12">
                                	<div class="active tab-pane" id="education">
                                    <table class="table table-striped">
                                    <tr><th>Degree Level</th>
                                    <th>Degree Name</th>
                                    <th>Graduation Year</th>
                                    <th>College Name</th>
                                    <th>University Name</th>
                                    <th>Score</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    </tr>
                                    <?php foreach ($jobseekeracademic as $academicdetail):?>
                                    <tr><td><?php echo $academicdetail->jobseeker_level_of_degree;?></td>
                                    <td><?php echo $academicdetail->jobseeker_degree_name;?></td>
                                    <td><?php echo $academicdetail->jobseeker_graduation_year;?></td>
                                    <td><?php echo $academicdetail->jobseeker_college_name;?></td>
                                    <td><?php echo $academicdetail->jobseeker_university_name;?></td>
                                    <td><?php echo $academicdetail->jobseeker_score;?></td>
                                    <td><a href="<?php echo site_url("JobSeekerProfile/deleteacademic/".$academicdetail->jobseeker_academic_id);?>" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span></a></td><td><a href="<?php echo site_url("JobSeekerProfile/editacademic/".$academicdetail->jobseeker_academic_id);?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </table>
                                    </div>    
                                	<div class="tab-pane" id="experience">
                                    <table class="table table-striped">
                                    <tr><th>Training Year</th>
                                    <th>Description</th>
                                    <th>Purpose</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    </tr>
                                    <?php foreach ($jobseekertraining as $jobseeker_training):?>
                                    <tr><td><?php echo $jobseeker_training->jobseeker_training_year;?></td>
                                    <td><?php echo $jobseeker_training->jobseeker_training_description;?></td>
                                    <td><?php echo $jobseeker_training->jobseeker_training_purpose;?></td>
                                    <td><a href="<?php echo site_url("JobSeekerProfile/deletetraining/".$jobseeker_training->jobseeker_training_id);?>" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span></a></td><td><a href="<?php echo site_url("JobSeekerProfile/edittraining/".$jobseeker_training->jobseeker_training_id);?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </table>
                                    </div>    
                                </div>
                            </div>
                        </div>
                </div>
             </div>  
        	<?php $this->load->view("jobseekernav");?>
    </div>
</div>