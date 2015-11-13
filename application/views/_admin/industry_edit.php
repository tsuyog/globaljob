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
    Add Industry <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/industry");?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    <div class="panel-body">
    <form role="form" action="" method="post" >
    <div class="form-group col-md-6">
          <input type="text" class="form-control" name="industry_name" placeholder="<?php echo $industries->industry_name;?>" >
          <!--<input type="hidden" name="industry_id" value="<?php echo $industries->industry_id; ?>" />-->
    </div>
    <div class="form-group col-md-2">
    <button type="submit" class="btn btn-default pull-right">Save</button> 
    
    </div>
    </form>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>