<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
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
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<th>Sn</th>
        <th>Title</th>
        <th>Industry</th>
        <th>Company</th>
        <th>Location</th>
        <th>Function</th>
        <th>Salary Amount </th>
        <th>service Type</th>
        <th>Openings</th>
        <th>Designation</th>
        <th width="120">Action</th>
    </tr>
    </thead>
	<tbody>
	<?php $sn=0; foreach($job as $Jobs): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $Jobs->job_title;?></td>
        <td><?php if($Jobs->Industry!==array())echo $Jobs->Industry->industry_name;?></td>
        <td><?php if($Jobs->Company!==array())echo $Jobs->Company->company_name; ?></td>
        <td><?php if($Jobs!==array())echo $Jobs->location_id;?> </td>
        <td><?php if($Jobs->Function!=array())echo $Jobs->Function->function_name;?> </td>
        <td><?php if($Jobs!=array())echo $Jobs->job_salary_exact_amount;?> </td>
        <td><?php if($Jobs->Service!=array())echo $Jobs->Service->service_name;?> </td>
        <td><?php if($Jobs!=array())echo $Jobs->job_openings;?> </td> 
        <td><?php if($Jobs->Designation!=array())echo $Jobs->Designation->designation_name;?>
        </td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobs/delete/".$Jobs->job_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobs/edit/".$Jobs->job_alias);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
	</tbody>
</table>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>