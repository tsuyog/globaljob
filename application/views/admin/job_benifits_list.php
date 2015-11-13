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
    List of Benifits <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/jobbenifits/add");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Benifits Name</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php $sn=0; foreach($jobbenifits as $benifit): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $benifit->benifit_name;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobbenifits/delete/".$benifit->benifit_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/jobbenifits/edit/".$benifit->benifit_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
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