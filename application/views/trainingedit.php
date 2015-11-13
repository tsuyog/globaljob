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
            		<div class="h3">Edit your Training</div>
                   	<div class="tab-content">
                        <table class="table table-striped">
                                    <form action="" method="post" role="form" class="">	
                                    <tr><th>Graduation Year</th>
                                    <th>Desription</th>
                                    <th>Purpose</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    </tr>                                      
                                    <tr>
                                    <td><input type="text" value="<?php echo $jobseekertraining->jobseeker_training_year;?>" name="year" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekertraining->jobseeker_training_description;?>" name="description" class="form-control"></td>
                                    <td><input type="text" value="<?php echo $jobseekertraining->jobseeker_training_purpose;?>" name="purpose" class="form-control"></td>                            
                                    <td><input type="submit" class="btn btn-primary"></td>
                                    <td><a href="<?php echo site_url("jobseekerprofile/viewacademic/".$jobseekertraining->jobseeker_id);?>" class="btn btn-primary">cancel</a></td></tr>
                                    </form>
                    </table>	
                    </div>
            </div>	
        </div>
        	<?php $this->view("jobseekernav");?>
    </div>
</div>    