<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
<?php $this->load->view("includes-header"); ?>
</head>
<body>
<?php if(isset($msg)):?>
<div class="message_center"><?php echo $msg;?>
</div>
<script>
function hidemsg()
{
$(".message_center").hide();
}
setTimeout(hidemsg,7000);
</script>
<?php endif; ?>
	<div class="container header">
    <div class="col-md-1">
		<figure class="logo">
        	<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" /></a>
  		</figure>    
    </div>
    <?php
	if(!checkLoginState()): ?>
    <form action="<?php echo site_url("login"); ?>" method="post" class="form-inline pull-right" role="form">

		  <div class="form-group ">
		    <input name="username" type="email" class="form-control" id="username" placeholder="Enter email">
		  </div>
		  
		  <div class="form-group">
		    	<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		  </div>
		  <button name="login" type="submit" class="btn btn-success">Login</button>
		</form>
           <a href="<?php echo site_url("company/companyregistration");?>"><span class="label label-success pull-right">Employeer Registration</span></a>
           <a href="<?php echo site_url("JobSeeker/registerJobseeker");?>"><span class="label label-success pull-right">Jobseeker Registration</span></a>
           
      
        
        
        
    <?php else: ?>
    <?php $user_name = $this->session->userdata("LoggedInUsername");$username = explode("@",$user_name);?>
    <a href="<?php if($this->session->userdata("LoginType")=="JobSeeker"){echo site_url("jobseekerprofile/viewprofile/".$this->session->userdata("LoggedInUserId"));} else{echo site_url("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));}?>" class="btn btn-default pull-right"><?php echo "welcome". $username[0];?></a>
    <form action="<?php echo site_url("logout"); ?>" method="post" class="form-inline pull-right" role="form">
    	<button name="login" type="submit" class="btn btn-success">Logout</button>
    </form>
    
    <?php endif; ?>
</div>