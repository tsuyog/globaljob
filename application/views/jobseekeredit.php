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
        	<div class="panel panel-default backgroundgray col-lg-9">                       
            	<div class="panel-body ">                 
                                <div class="h3">Edit your Profile</div>
                                <form role="form" method="post" action="" class="">
                                
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_first_name;?>" name="first_name" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php if(!empty($jobseekerdetail->jobseeker_middle_name))echo $jobseekerdetail->jobseeker_middle_name; else { ?>" placeholder="<?php echo "Enter Middle Name"; }?>"name="middle_name" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_last_name;?>" name="last_name" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                <select class="form-control col-md-4" name="sex">
                                <option>Select Sex</option>
                                <option <?php if($jobseekerdetail->sex=="Male")echo "selected";?>>Male</option>
                                <option <?php if($jobseekerdetail->sex=="Female")echo "selected";?>>Female</option>						
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_contact_number;?>" name="contact_number" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_email;?>" name="email" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_address;?>" name="address" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" name="jobseeker_nationality" value="<?php if(!empty($jobseekerdetail->jobseeker_nationality))echo $jobseekerdetail->jobseeker_nationality; else { ?>" placeholder="<?php echo "Nationality"; }?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo $jobseekerdetail->jobseeker_dob;?>" name="dob" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                <select name="marital_status" class="form-control col-md-4">
                                <option >Maritul status</option>
                                <option <?php if($jobseekerdetail->jobseeker_marital_status=="Single")echo "selected";?>>Single</option>
                                <option <?php if($jobseekerdetail->jobseeker_marital_status=="Married")echo "selected";?>>Married</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="file" name="jobseeker_image" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                <input type="submit" name="submit" id="submit" value="update" class="btn btn-primary"/>
                                <a href="<?php echo site_url("jobseekerprofile/viewprofile/".$jobseekerdetail->jobseeker_id);?>" class="btn btn-primary">cancel</a>
                                </div>				
                                
                                </form>
				</div>
            </div>
        		<?php $this->load->view("jobseekernav");?>
        </div>
</div>
                    
  