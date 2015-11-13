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
                	  <div class="h3">Create your Profile</div>
                      <div class="panel panel-default">
                            <div class="panel-body ">
                                <ul class="nav nav-tabs">
                                <li><a href="#education" data-toggle="tab">Education</a></li>
                                <li><a href="#experience" data-toggle="tab">Experience</a></li>
                                </ul>  
                                   
                                    <div class="tab-content">
                                        <div class="tab-pane" id="education">
                                        <form action="" method="post" role="form" class="">	
                                                <div class="form-group col-md-4">
                                                <select class="form-control" name="level">
                                                <option>+2</option>
                                                <option>Bachelor</option>
                                                <option>Master</option>
                                                <option>Degree</option>
                                                </select>
                                                </div>                                       
                                            	<div class="form-group col-md-4">
                                            <input type="text" placeholder="Name of Degree" name="degreename" class="form-control">									</div>
                                            	<div class="form-group col-md-4">
                                            <input type="text" placeholder="Year" name="year" class="form-control">
                                            	</div>	
                                            	<div class="form-group col-md-4">
                                            <input type="text" placeholder="College" name="college" class="form-control">
                                            	</div>
                                            	<div class="form-group col-md-4">
                                            <input type="text" placeholder="University" name="university" class="form-control">									</div>
                                        		<div class="form-group col-md-4">
                                            <input type="text" placeholder="Percentege or Grade" name="grade" class="form-control">									</div>
                                            	<div class="form-group col-md-4 pull-right">
                                            <input type="submit" class="btn btn-primary" value="submit">
                                            <a href="jobseekerprofile/view" class="btn btn-primary">cancel</a>
                                        		</div>
                                        </form>
                                        </div>
                                        <div class="tab-pane" id="experience">
                                                <form action="" method="post" class="">
                                                <div class="form-group col-md-4">
                                                <select class="form-control" name="experiencedyear">
                                                <option>Training Year</option>
                                                <option>1991</option>
                                                <option>1992</option>
                                                <option>1993</option>
                                                <option>1994</option>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <input type="text" placeholder="Training Description" name="description" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <input type="text" placeholder="Training Purpose" name="trainingpurpose" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4 pull-right">
                                                <input type="submit" class="btn btn-primary" value="submit">
                                                <a href="jobseekerprofile/view" class="btn btn-primary">cancel</a>	
                                                </div>  
                                                </form>  
                                        </div>
                               		</div>
                            </div>	
                       </div> 
                 </div>
            </div>
   		<div class="col-lg-3"><!-- right side logo of jobseeker and typical info -->
				<div class="panel panel-default">
					<div class="panel-heading" >Welcome </div>
					<div class="panel-body">
						<img src="<?php echo base_url();?>resources/company_logos/avatar.jpg" alt="..." class="img-rounded img-responsive profile-pic">
						<button type="button" class="btn btn-default btn-md">
						  <span class="glyphicon glyphicon-circle-arrow-up "></span> Upload Picture
						</button>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="h3"><span class="glyphicon glyphicon-bookmark">&nbsp;Profile</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/view");?>"><span class="glyphicon glyphicon-user"></span> &nbsp;View Profile</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/edit");?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Profile</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Settings</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a></li>
								</ul>
								<div class="h3"><span class="glyphicon glyphicon-th">&nbsp;Jobs</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href=""><span class="glyphicon glyphicon-shopping-cart"></span> &nbsp;My Job</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;Applied Jobs</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp; Job Notification</a></li>
								</ul>
								<div class="h3"><span class="glyphicon glyphicon-paperclip">&nbsp;Academic</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/createacademic");?>"><span class="glyphicon glyphicon-cog"></span> &nbsp;Create </a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/viewacademic");?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Edit</a></li>
								</ul>
								<div class="h3"><span class="fa fa-file-text fa-1x">&nbsp;Resume</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-cog"></span> &nbsp;Create </a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Email</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
</div>
</body>
</html>
