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
<div class="container">
<div class="col-lg-4" style="float:none; margin:0px auto;">
<div class="panel panel-default">
<div class="panel-heading">Login</div>
<div class="panel-body">
<form role="form" method="post" action="">
	<div class="form-group">
    	<label for="username" class="sr-only">Username</label><input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
    	<label for="username" class="sr-only">Username</label><input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-default" >Submit</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>