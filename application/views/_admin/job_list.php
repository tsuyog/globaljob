<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-theme.css">
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
<div class="row" > 
<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
    List of jobs <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/jobs/add");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped">
	<tr>
    	<td>Sn</td>
        <td>Title</td>
        <td>Industry</td>
        <td>Company</td>
        <td>Location</td>
        <td>Function</td>
        <td>Salary Amount </td>
        <td>service Type</td>
        <td>Openings</td>
        <td>Designation</td>
        <td width="120">Action</td>
    </tr>
    <?php $sn=0; foreach($job as $Jobs): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $Jobs->job_title;?></td>
        <td><?php echo $Jobs->Industry->industry_name;?></td>
        <td><?php echo $Jobs->Company->company_name; ?></td>
        <td><?php echo $Jobs->location_id;?> </td>
        <td><?php echo $Jobs->Function->function_name;?> </td>
        <td><?php echo $Jobs->job_salary_exact_amount;?> </td>
        <td><?php echo $Jobs->Service->service_name;?> </td>
        <td><?php echo $Jobs->job_openings;?> </td>
        <td><?php echo $Jobs->Designation->designation_name;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobs/delete/".$Jobs->job_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobs/edit/".$Jobs->job_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
</table>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>