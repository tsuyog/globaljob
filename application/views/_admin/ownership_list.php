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
    List of Ownership <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/ownership/add");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped">
	<tr>
    	<td>Sn</td>
        <td>Ownerships</td>
        <td width="120">Action</td>
    </tr>
    <?php $sn=0; foreach($owneships as $owneship): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $owneship->ownership_name;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/ownership/delete/".$owneship->ownership_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/ownership/edit/".$owneship->ownership_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
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