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
		<div class="row"><?php testArray($viewpackage);?>
			<div class="col-lg-9">
            	<div class="panel panel-default backgroundgray">
					<div class="panel-body">
                    <div class="look decor"><?php echo $viewpackage->jobseeker_first_name; echo " "; echo $viewpackage->jobseeker_middle_name; echo " "; echo $viewpackage->jobseeker_last_name;?></div>
                    <div class="col-md-3">Name:<?php echo " "; echo $viewpackage->jobseeker_first_name; echo " "; echo $viewpackage->jobseeker_middle_name; echo " "; echo $viewpackage->jobseeker_last_name;?></div>
                    <div class="col-md-3">Sex:<?php echo " "; echo $viewpackage->sex;?><</div>
                    <div class="col-md-3">Address:<?php echo " "; echo $viewpackage->jobseeker_address;?></div>
                    <div class="col-md-3">Contact:<?php echo " "; echo $viewpackage->jobseeker_contact_number;?></div>
                    <div class="col-md-3">Email:<?php echo " "; echo $viewpackage->jobseeker_email;?></div>
                    <div class="col-md-3">Nationality:<?php echo " "; echo $viewpackage->jobseeker_nationality;?></div>
                    <div class="col-md-3">D.O.B:<?php echo " "; echo $viewpackage->jobseeker_dob;?></div>
                    <div class="col-md-3">Marital:<?php echo " "; echo $viewpackage->jobseeker_marital_status;?></div>
                    </div>
                </div>
                <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    	 <div class="look decor">Academic</div>
                         <table class="table table-striped">
                          <tr>
                          	<td>Level</td>
                            <td>Degree Name</td>
                            <td>Graduation year</td>
                            <td>College</td>
                            <td>University</td>
                            <td>Score</td>
                          </tr>
                        </table>
                    </div>
                </div>
                 <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    	 <div class="look decor">Experience</div>
                         <table class="table table-striped">
                         	<tr>
                            	<td>Experience Period</td>
                                <td>Performed Designation</td>
                                <td>Remarks</td>
                            </tr>
                         </table>
                    </div>
                 </div>
                 <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    	 <div class="look decor">Training</div>
                         <table class="table table-striped">
                         	<tr>
                            	<td>Attended Year</td>
                                <td>Name/Description</td>
                                <td>Purpose</td>
                            </tr>
                         </table>
                    </div>
                 </div>
                  <div class="panel panel-default backgroundgray">
                  		<div class="panel-body">
                        	<div class="col-md-6 pull-right">
                              <a href="<?php ?>"><span class="label label-success">Back to List</span></a>
                             <a href="<?php ?>"><span class="label label-success">Download Resume </span></a>
                             <a href="<?php ?>"><span class="label label-success">Shortlist </span></a>
                            </div>
                        </div>
                  </div>
            </div>
            <?php $this->load->view("company/companynav");?>
        </div>
    </div>
</body>
</html>