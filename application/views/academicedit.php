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
                   	<div class="tab-content">
                        <table class="table table-striped">
                                    <form action="" method="post" role="form" class="">	
                                    <tr><th>Level</th>
                                    <th>Degree Name</th>
                                    <th>Year</th>
                                    <th>College</th>
                                    <th>University</th>
                                    <th>Score</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    </tr>
                                    <tr><td><select class="form-control" name="level" selected="<?php echo $jobseekeracademic->jobseeker_level_of_degree;?>">
                                    <option>+2</option>
                                    <option>Bachelor</option>
                                    <option>Master</option>
                                    <option>Degree</option>
                                    </select></td>                                       
                                    <td><input type="text" value="<?php echo $jobseekeracademic->jobseeker_degree_name;?>" name="degreename" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekeracademic->jobseeker_graduation_year;?>" name="year" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekeracademic->jobseeker_college_name;?>" name="college" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekeracademic->jobseeker_university_name;?>" name="university" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekeracademic->jobseeker_score;?>" name="grade" class="form-control"></td>                            
                                    <td><input type="submit" class="btn btn-primary"></td>
                                    <td><a href="<?php echo site_url("JobSeekerProfile/viewacademic/".$jobseekeracademic->jobseeker_id);?>" class="btn btn-primary">cancel</a></td></tr>
                                    </form>
                    </table>	
                    </div>
            </div>	
        </div>
        	<?php $this->load->view("jobseekernav");?>
    </div>
</div>