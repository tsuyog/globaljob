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
    List of Jobseeker <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/jobseeker/add");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Name</td>
        <td>User Name</td>
        <td>Contact</td>
        <td>email</td>
        <td>Address</td>
        <td>Nationality</td>
        <td>D.O.B</td>
        <td>Marital Status</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php $sn=0; foreach($abc as $jobseeker): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $jobseeker->jobseeker_first_name; echo " "; echo $jobseeker->jobseeker_middle_name; echo " ";
		echo $jobseeker->jobseeker_last_name;?></td>
        <td><?php echo $jobseeker->jobseeker_user_name;?></td>
        <td><?php echo $jobseeker->jobseeker_contact_number;?></td>
        <td><?php echo $jobseeker->jobseeker_email;?> </td>
        <td><?php echo $jobseeker->jobseeker_address;?> </td>
        <td><?php echo $jobseeker->jobseeker_nationality;?> </td>
        <td><?php echo $jobseeker->jobseeker_dob;?> </td>
        <td><?php echo $jobseeker->jobseeker_marital_status;?> </td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobseeker/delete/".$jobseeker->jobseeker_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobseeker/edit/".$jobseeker->jobseeker_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
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