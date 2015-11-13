<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
<?php $this->load->view("includes-header"); ?>
</head>

<body>
<div class="container header">
    <div class="col-md-1">
		<figure class="logo">
        	<a href="./"><img src="<?php echo base_url(); ?>images/logo.png" /></a>
        </figure>    
    </div>
</div>
<nav class="navbar navbar-green">
<div class="container">
	<ul class="nav navbar-nav">
    	<li><a href="<?php echo site_url("welcome");?>">Home</a></li>
    </ul>
</div>
</nav>
<div class="container site-body">
	<div class="row">
  		<div class="col-lg-8"><!-- main profile of company or content -->
  				<div class="panel panel-default">
  					
  					<div class="panel-heading" ><!-- pannel heading -->
						<ul class="nav nav-pills">
						  <li class="active"><a href="#">Profile</a></li>
						</ul>
  					</div>
  					<div class="panel-body">
  					<div class="panel panel-default">
  						<div class="panel-heading">Company profile </div>
  						<div class="panel-body">
		   					 <?php echo $Profile->company_profile; ?>
		   				</div> 
 					</div>
 					</div>
				</div>
  		</div>
  		<div class="col-lg-4"><!-- right side logo of company and typical info -->
  			  	<div class="panel panel-default">
  					<div class="panel-heading">

  					</div>
  					<div class="panel-body">
   					   <div class="row">
  						<div class="col-lg-12">
      						<img src="<?php //echo $Profile->company_logo->company_logo;?>" class="img-responsive img-rounded profile-pic">
  						</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">Company At Glance</div>
							<div class="panel-body">
								<ul class="list-group">
								  <li class="list-group-item">
								    <span class="badge"><?php if($Profile->Industry!=array())echo $Profile->Industry->industry_name; ?></span>Industry
								  </li>
								  <li class="list-group-item">
								    <span class="badge"><?php if($Profile->ownership!=array())echo $Profile->ownership->ownership_name;?></span>Ownership
								  </li>
								  </li>
								  <li class="list-group-item">
								    <span class="badge"><?php if($Profile->function_name!=array())echo $Profile->function_name->function_name;?></span>Function
								  </li>
								  <li class="list-group-item">
								    <span class="badge"><?php if($Profile!=array())echo $Profile->company_size;?></span>Company Size
								  </li>
								</ul>
							</div>
						</div>
						</div>
						</div>

 					</div>
				</div>
  		</div><!-- closing of right side -->
	</div>
  
</div>
</body>
</html>