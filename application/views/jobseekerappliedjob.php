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
            	<div class="h3">Applied Job</div>
                <div class="panel panel-body">
                <table class="table table-striped">
                <tr><th>Applied Job</th>
                	<th>Applied Date</th>
                    <th>Applied To</th>
               		<th>&nbsp;</th>
                </tr>
                <?php foreach($Application as $application):?>
                	<?php foreach($application->jobdetail as $job_detail):?>
                		<tr><td><?php echo $job_detail->job_title;?></td>
                			<td><?php echo convertdate($job_detail->posted_date);?></td>
							<td><?php echo $application->companydetail->company_name;?></td>
						</tr> 
                    <?php endforeach;?>
				<?php endforeach;?>
                </table>
                </div>
            </div>
        </div>
    	<?php $this->load->view("jobseekernav");?>
    </div>
</div>