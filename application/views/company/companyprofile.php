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
		<div class="col-lg-9"><!-- main profile of company or content -->
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="list-group">
					  <li class="list-group-item">
					  	<?php //testArray($package); die;?>
					  	<?php if($package['posted_job']>0){ ?>
					    <span class="badge"><?php echo $package['posted_job']; ?></span>Posted Jobs
					    <?php }
						 else {?>
							<span class="badge">No Records</span>Posted Jobs
						<?php }?>
					  </li>
					  <li class="list-group-item">
					    <span class="badge"><?php $package['posted_job']; ?></span>Active Jobs
					  </li>
					  <li class="list-group-item">
					    <span class="badge">14</span>Application Recieved
					  </li>
					</ul>
					<div class="h3"> Your Jobs</div>
					<table class="table table-striped">
						<tr>
							<td>S.N.</td>
							<td>Title</td>
							<td>Industry</td>
							<td>Function</td>
							<td>Salary</td>
							<td>Opening</td>
							<td>job Type</td>
							<td>Level</td>
							<td>Posted on</td>
							<td>Deadline</td>
							<td></td>
						</tr>
						<?php $sn=0; 
						foreach($package['job'] as $content): $sn++;?>
						<a href="#">
						<tr>
							<td><?php echo $sn;?></td>
							<td><?php echo $content->job_title;?></td>
							<td><?php echo $content->Industry->industry_name;?></td>
							<td><?php echo $content->Function->function_name;?></td>
							<td><?php echo$content->job_salary_exact_amount;?></td>
							<td><?php echo $content->job_openings?></td>
							<td><?php echo $content->JobType->job_type_name; ?></td>
							<td><?php echo $content->JobLevel->job_level_name;?></td>
							<td><?php echo convertdate($content->posted_date);?></td>
							<td><?php echo convertdate($content->deadline);?></td>
							<td><span class="glyphicon glyphicon-search"></span></td>
						</tr>
						</a>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div><!-- closing of main right panel -->
		<?php $this->load->view("company/companynav");?>
	</div>
	</div>
</body>
</html>