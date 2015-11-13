<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
<div class="row">
	<div class="container">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	Edit Country <a class="pull-right btn btn-primary btn-sm" href="<?php echo site_url("admin/address");?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </div>
                <div class="panel-body">
                	<form class="form-horizontal" role="form" method="post" action="">
                    <div class="form-group">
                    	<label for="function_name" class="col-sm-2 control-label">Name of Country</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="country" id="country_name" value="<?php echo $country->country;?>">
                        <input type="hidden" name="country_id" value="<?php echo $country->country_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-sm-offset-2 col-sm-10">
                        	<button type="submit" class="btn btn-default">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>