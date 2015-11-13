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
    Add Designation <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/designations");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" >
    <div class="form-group">
    <input type="text" class="form-control" name="designation_name" placeholder="Designation Name" >
    
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="designation_comments" placeholder="Designation comments" >
    
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-default">Save</button> 
    
    </div>
    </form>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>