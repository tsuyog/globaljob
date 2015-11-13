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
    Services <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/services/addServices");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Servie Title</td>
        <td>Service Text</td>
        <td>Posted By</td>
        <td>Status</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php $a=0;foreach($services as $Services):$a++;?>
    <tr>
    	<td><?php echo $a;?></td>
        <td><?php echo $Services->services_title;?></td>
        <td><?php echo $Services->services_text;?></td>
        <td><?php echo $Services->services_posted_by;?></td>
        <td><?php echo $Services->status;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/services/delete/".$Services->services_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/services/edit/".$Services->services_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
    </tr>
	<?php endforeach;?>
    </tbody>
    </div>
</div>
</div>
</div>